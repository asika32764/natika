/**
 * Part of earth project.
 *
 * @copyright  Copyright (C) 2016 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

;(function($) {
    "use strict";

    var defaultOptions = {
        image: {
            folder: null
        }
    };

    /**
     * Constructor.
     *
     * @param {string}      selector
     * @param {Object}      options  The options object.
     *
     * @constructor
     */
    var SummernoteLunaEditor = function(selector, options) {
        var editor =  $(selector).summernote(options);

        this.selector = selector;
        this.editor   = $(editor);
        this.options  = $.extend(true, {}, defaultOptions, options);

        Luna.Editor.editors[selector] = {
            insert: function(text) {
                return editor.summernote('insertNode', $(text)[0]);
            },
            getValue: function() {
                return editor.summernote('code');
            },
            setValue: function(text) {
                return editor.summernote('code', text);
            }
        };
    };

    // Static methods start
    // ---------------------------------------------------
    SummernoteLunaEditor.instances = {};

    /**
     * Get or create an instance.
     *
     * @param {string} selector
     * @param {Object} options
     *
     * @returns {SummernoteLunaEditor}
     */
    SummernoteLunaEditor.getInstance = function(selector, options) {
        if (!this.instances[selector]) {
            this.instances[selector] = new SummernoteLunaEditor(selector, options);
        }

        return this.instances[selector];
    };
    // ---------------------------------------------------
    // Static methods end

    SummernoteLunaEditor.prototype = {
        /**
         * Send file to server.
         *
         * @param {File} file
         */
        sendFile: function(file) {
            var data = new FormData;
            var folder = this.options.image.folder || '';
            data.append("file", file);
            data.append('folder', folder);

            var self = this;

            $.ajax({
                data: data,
                type: "POST",
                url: this.options.image_upload_url,
                cache: false,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.success) {
                        self.editor.summernote("insertImage", response.data.url);
                    } else {
                        alert('Image upload fail!!!');
                    }
                },
                error: function(error) {
                    console.log(error.responseJSON.message);
                }
            });
        }
    };

    // Push to window
    window.SummernoteLunaEditor = SummernoteLunaEditor;

})(jQuery);