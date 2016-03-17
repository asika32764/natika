/**
 * Part of eng4tw project.
 *
 * @copyright  Copyright (C) 2016 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

;(function($)
{
    "use strict";

    var defaultOptions = {
        /**
         * URL to upload the attachment
         */
        url: 'upload.php',

        /**
         * Upload HTTP method used
         */
        method: 'POST',

        /**
         * Request field name where the attachment will be placed in the form data
         */
        field: 'file',

        /**
         * Add the file to the form data before adding the extra parameters
         * (alternative being to add the file after the extra parameters)
         */
        addFileBeforeExtraParameters: true,

        /**
         * Where is the filename placed in the response
         */
        downloadFieldName: 'filename',

        /**
         * Where is the name placed in the response
         */
        downloadLabelName: 'name',

        /**
         * Allowed types
         */
        allowedTypes: [
            'image/jpeg',
            'image/png',
            'image/jpg',
            'image/gif'
        ],

        /**
         * Will be inserted on a drop or paste event
         */
        progressText: '![Uploading... {name}]()',

        /**
         * When a file has successfully been uploaded the last inserted text
         * will be replaced by the urlText, the {filename} tag will be replaced
         * by the filename that has been returned by the server
         */
        urlText: "![{name}]({filename})",

        /**
         * Text for default error when uploading
         */
        errorText: "Error uploading file",

        /**
         * Extra parameters which will be send when uploading a file
         */
        extraParams: {},

        /**
         * Extra headers which will be send when uploading a file
         */
        headers: {},

        /**
         * When a file is received by drag-drop or paste
         */
        onFileReceived: null,

        /**
         * Custom upload handler
         *
         * @return {Boolean} when false is returned it will prevent default upload behavior
         */
        uploadHandler: null,

        /**
         * Custom error handler. Runs after removing the placeholder text and before the alert().
         * Return false from this function to prevent the alert dialog.
         *
         * @return {Boolean} when false is returned it will prevent default error behavior
         */
        errorHandler: null,

        /**
         * Custom response parser
         *
         * @return {Object} containing a parsed version of the response
         *                  or a false value will default back to parsing the response as JSON
         */
        responseParser: null,

        /**
         * When a file has succesfully been uploaded
         */
        onFileUploaded: null
    };

    /**
     * Constructor.
     *
     * @param {*}      adapter
     * @param {Object} options
     * @constructor
     */
    var InlineUploader = function(adapter, options)
    {
        this.options = $.extend(true, {}, defaultOptions, options);
        this.adapter = adapter;
        this.processingFiles = {};

        this.adapter.setUploader(this);

        this.adapter.registerEvents();
    };

    InlineUploader.prototype = {
        /**
         * Catches the paste event
         *
         * @param {Event} event
         * @returns {Boolean} If a file is handled
         */
        onPaste: function(event) {
            var result = false;
            var clipboardData = event.clipboardData;
            var items;

            if (typeof clipboardData === "object") {
                items = clipboardData.items || clipboardData.files || [];

                for (var i = 0; i < items.length; i++) {
                    /**
                     * @param {DataTransferItem}
                     */
                    var item = items[i];

                    if (this.isAllowedFile(item)) {
                        result = true;

                        var file = item.getAsFile();
                        var name = 'upload-' + Date.now() + '.png';

                        this.onFileReceived(file);

                        if (this.options.uploadHandler) {
                            this.options.uploadHandler.call(this, file, name);
                        } else {
                            this.uploadFile(file, name);
                        }
                    }
                }
            }

            return result;
        },

        /**
         * Catches onDrop event
         *
         * @param {Event} event
         * @returns {Boolean} If a file is handled
         */
        onDrop: function(event) {
            var result = false;

            for (var i = 0; i < event.dataTransfer.files.length; i++) {
                var file = event.dataTransfer.files[i];

                if (this.isAllowedFile(file)) {
                    result = true;

                    var name = this.onFileReceived(file, event);

                    if (this.options.uploadHandler) {
                        this.options.uploadHandler.call(this, file, name);
                    } else {
                        this.uploadFile(file, name);
                    }
                }
            }

            return result;
        },

        /**
         * Upload a given file blob
         *
         * @param {Blob}   file
         * @param {string} name
         */
        uploadFile: function(file, name) {
            var formData = new FormData,
                xhr = new XMLHttpRequest,
                extension = 'png',
                self = this;

            // Attach the file. If coming from clipboard, add a default filename (only works in Chrome for now)
            // http://stackoverflow.com/questions/6664967/how-to-give-a-blob-uploaded-as-formdata-a-file-name
            if (file.name) {
                var fileNameMatches = file.name.match(/\.(.+)$/);
                if (fileNameMatches) {
                    extension = fileNameMatches[1];
                }
            }

            if (this.options.addFileBeforeExtraParameters) {
                formData.append(this.options.field, file, "upload-" + Date.now() + "." + extension);
            }

            // Add any available extra parameters
            if (typeof this.options.extraParams === "object") {
                for (var key in this.options.extraParams) {
                    if (this.options.extraParams.hasOwnProperty(key)) {
                        formData.append(key, this.options.extraParams[key]);
                    }
                }
            }

            // Add the file after the extra parameters
            if (!this.options.addFileBeforeExtraParameters) {
                formData.append(this.options.field, file, "upload-" + Date.now() + "." + extension);
            }

            xhr.open(this.options.method, this.options.url);

            // Add any available extra headers
            if (typeof this.options.headers === "object") {
                for (var header in this.options.headers) {
                    if (this.options.headers.hasOwnProperty(header)) {
                        xhr.setRequestHeader(header, this.options.headers[header]);
                    }
                }
            }

            xhr.onload = function() {
                // If HTTP status is OK or Created
                if (xhr.status === 200 || xhr.status === 201) {
                    var data = self.parseResponse(xhr);

                    if (self.options.onFileUploaded) {
                        self.options.onFileUploaded.call(self, data, name);
                        return;
                    }

                    self.onFileUploaded(data, name);
                } else {
                    self.onErrorUploading();
                }
            };

            xhr.send(formData);
        },

        /**
         * Parse response.
         *
         * @param {XMLHttpRequest} xhr
         *
         * @returns {Object}
         */
        parseResponse: function(xhr) {
            if (this.options.responseParser) {
                return this.options.responseParser.call(this, xhr);
            }

            return JSON.parse(xhr.responseText);
        },

        /**
         * Check if the given file is allowed
         *
         * @param {File} file
         */
        isAllowedFile: function(file) {
            return this.options.allowedTypes.indexOf(file.type) >= 0;
        },

        /**
         * When a file has finished uploading
         *
         * @param {Object} data  The data from remote response.
         * @param {string} name  The file id name to replace progress text.
         */
        onFileUploaded: function(data, name) {

            var replace = this.options.urlText,
                filename;

            if (this.options.dataProcessor) {
                data = this.options.dataProcessor.call(this, data);
            }

            filename = data[this.options.downloadFieldName];

            var progressText = this.processingFiles[name];

            // Replace name with the return data
            name = data[this.options.downloadLabelName] || name;

            delete data[this.options.downloadLabelName];

            if (filename && progressText) {
                replace = replace.replace('{filename}', filename);
                replace = replace.replace('{name}', name);

                var text = this.adapter.getValue().replace(progressText, replace);
                this.adapter.setValue(text);
            }
        },

        /**
         * When a file didn't upload properly.
         * Override by passing your own onErrorUploading function with this.options.
         */
        onErrorUploading: function() {
            var text = this.adapter.getValue().replace(lastValue, "");
            this.adapter.setValue(text);

            if (this.options.errorHandler) {
                this.options.errorHandler.call(this);

                return;
            }

            window.alert(this.options.errorText);
        },

        /**
         * When a file has been received by a drop or paste event
         *
         * @param {Blob}  file
         * @param {Event} event
         *
         * @returns {string} The modified file name as id to replace upload progress text.
         */
        onFileReceived: function(file, event) {

            if (this.options.onFileReceived)
            {
                return this.options.onFileReceived.call(this, file, event);
            }

            var name = file.name;
            var text = this.options.progressText;

            while (this.processingFiles[name])
            {
                name = name + '-2';
            }

            text = text.replace('{name}', name);

            this.processingFiles[name] = text;

            this.adapter.insert(text + "\n\n");

            return name;
        }
    };

    /**
     * Create a inlineUpload instance.
     *
     * @param {*}      adapter
     * @param {Object} options
     * @returns {InlineUploader}
     */
    InlineUploader.init = function(adapter, options)
    {
        return new InlineUploader(adapter, options);
    };

    window.InlineUploader = window.InlineUploader ? $.extend(window.InlineUploader, InlineUploader) : InlineUploader;

    InlineUploader.AbstractAdapter = {
        prototype: {
            /**
             * Set InlineUploader.
             *
             * @param {InlineUploader} uploader
             */
            setUploader: function(uploader)
            {
                this.uploader = uploader;
            }
        }
    }

})(jQuery);
