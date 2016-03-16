/**
 * Part of Phoenix project.
 *
 * @copyright  Copyright (C) 2016 LYRASOFT. All rights reserved.
 * @license    GNU General Public License version 2 or later;
 */

/**
 * JavaScript behavior to allow selected tab to be remained after save or page reload
 * keeping state in localstorage
 *
 * @see  https://github.com/joomla/joomla-cms/blob/staging/media/system/js/tabs-state.js
 */
;(function($)
{
    "use strict";

    /**
     * Class init.
     *
     * @param {jQuery} $element
     * @param {Number} time
     *
     * @constructor
     */
    var LoadTab = function($element, time)
    {
        var self = this;
        time = time || 100;

        this.$element = $element;
        this.tabButtons = $element.find('a[data-toggle="tab"]');
        this.storageKey = 'tab-href-' + self.hashCode(location.href);

        this.bindEvents();

        setTimeout(function()
        {
            self.switchTab();
        }, time);
    };

    LoadTab.prototype = {
        /**
         * Bind events.
         */
        bindEvents: function()
        {
            var self = this;

            this.tabButtons.on('click', function(e)
            {
                // Store the selected tab href in localstorage
                window.localStorage.setItem(self.storageKey, $(e.target).attr('href'));
            });
        },

        /**
         * Active tab.
         *
         * @param {string} href
         */
        activateTab: function(href)
        {
            var $el = this.$element.find('a[data-toggle="tab"]a[href*=' + href + ']');
            $el.tab('show');
        },

        /**
         * Has tab.
         *
         * @param {string} href
         *
         * @returns {*}
         */
        hasTab: function(href)
        {
            return this.$element.find('a[data-toggle="tab"]a[href*=' + href + ']').length;
        },

        /**
         * Switch tab.
         *
         * @returns {boolean}
         */
        switchTab: function()
        {
            if (localStorage.getItem('tab-href'))
            {
                // When moving from tab area to a different view
                if (!this.hasTab(localStorage.getItem(this.storageKey)))
                {
                    localStorage.removeItem(this.storageKey);
                    return true;
                }

                // Clean default tabs
                this.$element.find('a[data-toggle="tab"]').parent().removeClass('active');

                var tabhref = localStorage.getItem(this.storageKey);

                // Add active attribute for selected tab indicated by url
                this.activateTab(tabhref);

                // Check whether internal tab is selected (in format <tabname>-<id>)
                var seperatorIndex = tabhref.indexOf('-');

                if (seperatorIndex !== -1)
                {
                    var singular = tabhref.substring(0, seperatorIndex);
                    var plural = singular + "s";

                    this.activateTab(plural);
                }
            }
        },
        /**
         * Hash code.
         *
         * @param {String} text
         *
         * @returns {number}
         */
        hashCode: function(text) {
            var hash = 0;
            var word;

            if (text.length == 0) {
                return hash;
            }

            for (var i = 0; i < text.length; i++) {
                word = text.charCodeAt(i);
                hash = ((hash << 5) - hash) + word;
                hash = hash & hash; // Convert to 32bit integer
            }

            return hash;
        }
    };

    window.LoadTab = LoadTab;
})(jQuery);
