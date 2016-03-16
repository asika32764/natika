/**
 * Part of Phoenix project.
 *
 * @copyright  Copyright (C) 2016 LYRASOFT. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

/**
 * PhoenixMultiSelect
 */
;(function($)
{
    /**
     * Plugin name.
     *
     * @type {string}
     */
    var plugin = 'multiselect';

    var defaultOptions = {
        duration: 100
    };

    /**
     * Multi Select.
     *
     * @param {jQuery} $element
     * @param {Object} options
     *
     * @constructor
     */
    var PhoenixMultiSelect = function($element, options)
    {
        var self = this;
        this.form = $element;
        this.boxes = $element.find('input.grid-checkbox[type=checkbox]');
        this.last = false;
        this.options = $.extend({}, defaultOptions, options);

        this.boxes.click(function(event)
        {
            self.select(this, event);
        })
    };

    PhoenixMultiSelect.prototype = {
        /**
         * Do select.
         *
         * @param {Element} element
         * @param {Event}   event
         */
        select: function(element, event)
        {
            if (!this.last)
            {
                this.last = element;

                return;
            }

            if (event.shiftKey)
            {
                var self = this;
                var start = this.boxes.index(element);
                var end = this.boxes.index(this.last);

                var chs = this.boxes.slice(Math.min(start, end), Math.max(start, end) + 1);

                $.each(chs, function(i, e)
                {
                    if (self.options.duration)
                    {
                        setTimeout(function()
                        {
                            e.checked = self.last.checked;
                        }, (self.options.duration / chs.length) * i);
                    }
                    else
                    {
                        e.checked = self.last.checked;
                    }
                })
            }

            this.last = element;
        }
    };

    $.fn[plugin] = function(options)
    {
        if (!this.data('phoenix.' + plugin))
        {
            this.data('phoenix.' + plugin, new PhoenixMultiSelect(this, options));
        }

        return this.data('phoenix.' + plugin);
    };

})(jQuery);
