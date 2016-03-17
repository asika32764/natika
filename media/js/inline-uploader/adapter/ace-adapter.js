/**
 * Part of eng4tw project.
 *
 * @copyright  Copyright (C) 2016 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

var InlineUploader;

;(function($, InlineUploader)
{
    "use strict";

    InlineUploader.AceAdapter = function(instance)
    {
        this.instance = instance;
        this.uploader = null;
    };

    InlineUploader.AceAdapter.prototype = {

        /**
         * Get value from editor.
         *
         * @returns {string}
         */
        getValue: function() {
            return this.instance.getValue();
        },

        /**
         * Set value to editor.
         *
         * @param value
         */
        setValue: function(value) {
            var position = this.instance.getCursorPosition();

            this.instance.setValue(value);

            this.instance.getSelection().clearSelection();
            this.instance.getSelection().moveCursorTo(position.row - 2, position.column);

            this.instance.focus();
        },

        /**
         * Insert value to editor.
         *
         * @param value
         */
        insert: function(value) {
            this.instance.insert(value);

            this.instance.focus();
        },

        /**
         * Register events.
         */
        registerEvents: function()
        {
            var self = this;

            function catchAndDoNothing(e)
            {
                e.stopPropagation();
                e.preventDefault();
            }

            this.instance.container.addEventListener("drop", function(event)
            {
                self.uploader.onDrop(event);
                event.stopPropagation();
                event.preventDefault();
            }, true);
            this.instance.container.addEventListener("dragenter", catchAndDoNothing, false);
            this.instance.container.addEventListener("dragover", catchAndDoNothing, false);
            this.instance.container.addEventListener("paste", function(event) {
                self.uploader.onPaste(event);
            }, true);
        }
    };

    $.extend(InlineUploader.AceAdapter.prototype, InlineUploader.AbstractAdapter.prototype);

})(jQuery, InlineUploader || (InlineUploader = {}));
