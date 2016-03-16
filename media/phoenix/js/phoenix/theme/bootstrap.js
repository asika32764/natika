/**
 * Part of Phoenix project.
 *
 * @copyright  Copyright (C) 2016 LYRASOFT. All rights reserved.
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

                this.addValidateResponse($control, $input, icon, color, help)
            }
        },

        /**
         * Add validate effect to input, just override this method to fit other templates.
         *
         * @param {jQuery} $control
         * @param {jQuery} $input
         * @param {string} icon
         * @param {string} color
         * @param {string} help
         */
        addValidateResponse: function($control, $input, icon, color, help)
        {
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
            var showClass = button.attr('data-class-show') || 'btn-primary';
            var hideClass = button.attr('data-class-hide') || 'btn-default';

            var icon = button.find('span.filter-button-icon');
            var iconShowClass = icon.attr('data-class-show') || 'glyphicon-menu-up fa fa-angle-up';
            var iconHideClass = icon.attr('data-class-hide') || 'glyphicon-menu-down fa fa-angle-down';

            if (container.hasClass('shown'))
            {
                button.removeClass(showClass).addClass(hideClass);
                container.hide('fast');
                container.removeClass('shown');

                icon.removeClass(iconShowClass).addClass(iconHideClass);
            }
            else
            {
                button.removeClass(hideClass).addClass(showClass);
                container.show('fast');
                container.addClass('shown');

                icon.removeClass(iconHideClass).addClass(iconShowClass);
            }
        }
    };

})(Phoenix || (Phoenix = {}), jQuery);
