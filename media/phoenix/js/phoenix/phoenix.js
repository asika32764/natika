/**
 * Part of Phoenix project.
 *
 * @copyright  Copyright (C) 2015 LYRASOFT. All rights reserved.
 * @license    GNU General Public License version 2 or later;
 */

/**
 * PhoenixCore
 */
(function($)
{
    "use strict";

    /**
     * Plugin name.
     *
     * @type {string}
     */
    var plugin = 'phoenix';

    var defaultOptions = {
        selector: {
            message: '.message-wrap'
        }
    };

    /**
     * Class init.
     *
     * @param {Element} $form
     * @param {Object}  options
     *
     * @constructor
     */
    var PhoenixCore = function($form, options)
    {
        options = $.extend(true, {}, defaultOptions, options);

        this.form = $form;
        this.options = options;
    };

    PhoenixCore.prototype = {

        /**
         * Make a request.
         *
         * @param  {string} url
         * @param  {Object} queries
         * @param  {string} method
         * @param  {string} customMethod
         *
         * @returns {boolean}
         */
        submit: function(url, queries, method, customMethod)
        {
            var form = this.form;

            var methodInput = form.find('input[name="_method"]');

            if (!methodInput.length)
            {
                methodInput = $('<input name="_method" type="hidden">');

                form.append(methodInput);
            }

            methodInput.val(customMethod);

            // Set queries into form.
            if (queries)
            {
                var input;

                $.each(queries, function(key, value)
                {
                    input = form.find('input[name="' + key + '"]');

                    if (!input.length)
                    {
                        input = $('<input name="' + key + '" type="hidden">');

                        form.append(input);
                    }

                    input.val(value);
                });
            }

            if (url)
            {
                form.attr('action', url);
            }

            if (method)
            {
                form.attr('method', method);
            }

            form.submit();

            return true;
        },

        /**
         * Make a GET request.
         *
         * @param  {string} url
         * @param  {Object} queries
         * @param  {string} customMethod
         *
         * @returns {boolean}
         */
        get: function(url, queries, customMethod)
        {
            return this.submit(url, queries, 'GET', customMethod);
        },

        /**
         * Post form.
         *
         * @param  {string} url
         * @param  {Object} queries
         * @param  {string} customMethod
         *
         * @returns {boolean}
         */
        post: function(url, queries, customMethod)
        {
            return this.submit(url, queries, 'POST', customMethod);
        },

        /**
         * Make a PUT request.
         *
         * @param  {string} url
         * @param  {Object} queries
         *
         * @returns {boolean}
         */
        put: function(url, queries)
        {
            return this.post(url, queries, 'PUT');
        },

        /**
         * Make a PATCH request.
         *
         * @param  {string} url
         * @param  {Object} queries
         *
         * @returns {boolean}
         */
        patch: function(url, queries)
        {
            return this.post(url, queries, 'PATCH');
        },

        /**
         * Make a DELETE request.
         *
         * @param  {string} url
         * @param  {Object} queries
         *
         * @returns {boolean}
         */
        sendDelete: function(url, queries)
        {
            return this.post(url, queries, 'DELETE');
        },

        addMessage: function(msg, type)
        {
            var messageContainer = $(this.options.selector.message);

            Phoenix.Theme.renderMessage(messageContainer, msg, type);

            return this;
        },

        removeMessages: function()
        {
            var messageContainer = $(this.options.selector.message);

            Phoenix.Theme.removeMessages(messageContainer);

            return this;
        },

        keepAlive: function(url, time)
        {
            window.setInterval(function()
            {
                var r;

                try
                {
                    r = window.XMLHttpRequest ? new XMLHttpRequest : new ActiveXObject('Microsoft.XMLHTTP');
                }
                catch (e) {}

                if (r)
                {
                    r.open('GET', url, true);
                    r.send(null);
                }
            }, time);
        }
    };

    $.fn[plugin] = function(options)
    {
        if (!this.data('phoenix.' + plugin))
        {
            this.data('phoenix.' + plugin, new PhoenixCore(this, options));
        }

        return this.data('phoenix.' + plugin);
    };

})(jQuery);
