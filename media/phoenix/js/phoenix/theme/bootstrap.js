/**
 * Part of Phoenix project.
 *
 * @copyright  Copyright (C) 2015 LYRASOFT. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

var Phoenix;
(function(Phoenix, $)
{
    "use strict";

    /**
     * Bootstrap Theme
     */
    Phoenix.Theme = {
        /**
         * Show Validation response.
         *
         * @param {PhoenixValidation} validation
         * @param {string}            state
         * @param {jQuery}            $input
         * @param {string}            help
         */
        showValidateResponse: function(validation, state, $input, help)
        {
            var $control = $input.parents('.form-group').first();

            this.removeValidateResponse($control);

            if (state != validation.STATE_NONE)
            {
                var icon, color;

                switch (state)
                {
                    case validation.STATE_SUCCESS:
                        color = 'success';
                        icon  = 'ok fa fa-check';
                        break;

                    case validation.STATE_EMPTY:
                        color = 'error';
                        icon  = 'remove fa fa-remove';
                        break;

                    case validation.STATE_FAIL:
                        color = 'warning';
                        icon  = 'warning-sign fa fa-warning';
                        break;
                }

                $control.addClass('has-' + color + ' has-feedback');

                var feedback = $('<span class="glyphicon glyphicon-' + icon + ' form-control-feedback" aria-hidden="true"></span>');
                $control.prepend(feedback);

                if (help)
                {
                    var helpElement = $('<small class="help-block">' + help + '</small>');

                    var tagName = $input.prop('tagName').toLowerCase();

                    if (tagName == 'div')
                    {
                        $input.append(helpElement);
                    }
                    else
                    {
                        $input.parent().append(helpElement);
                    }
                }
            }
        },

        /**
         * Remove validation response.
         *
         * @param {jQuery} $element
         */
        removeValidateResponse: function($element)
        {
            $element.find('.form-control-feedback').remove();
            $element.removeClass('has-error')
                .removeClass('has-success')
                .removeClass('has-warning')
                .removeClass('has-feedback');
        },

        /**
         * Render message.
         *
         * @param {jQuery}       messageContainer
         * @param {string|Array} msg
         * @param {string}       type
         */
        renderMessage: function(messageContainer, msg, type)
        {
            type = type || 'info';

            var message = messageContainer.find('div.alert.alert-' + type),
                i;

            if (!message.length)
            {
                message = $('<div class="alert alert-' + type + '"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></div>');
                messageContainer.append(message);
            }

            if (typeof msg == 'string')
            {
                msg = [msg];
            }

            for (i in msg)
            {
                message.append('<p>' + msg[i] + '</p>');
            }
        },

        /**
         * Remove all messages.
         *
         * @param {jQuery} messageContainer
         */
        removeMessages: function(messageContainer)
        {
            var messages = messageContainer.children();

            messages.each(function()
            {
                this.remove();
            });
        },

        /**
         * Toggle filter bar.
         *
         * @param {jQuery} container
         * @param {jQuery} button
         */
        toggleFilter: function(container, button)
        {
            if (container.hasClass('shown'))
            {
                button.removeClass('btn-primary').addClass('btn-default');
                container.hide('fast');
                container.removeClass('shown');

                button.find('span.glyphicon').removeClass('glyphicon-menu-up fa fa-angle-up').addClass('glyphicon-menu-down fa fa-angle-down');
            }
            else
            {
                button.removeClass('btn-default').addClass('btn-primary');
                container.show('fast');
                container.addClass('shown');

                button.find('span.glyphicon').removeClass('glyphicon-menu-down fa fa-angle-down').addClass('glyphicon-menu-up fa fa-angle-up');
            }
        }
    };

})(Phoenix || (Phoenix = {}), jQuery);
