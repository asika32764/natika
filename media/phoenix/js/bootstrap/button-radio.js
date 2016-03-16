/**
 * Part of Phoenix project.
 *
 * @copyright  Copyright (C) 2016 LYRASOFT. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

(function($)
{
    $(document).ready(function()
    {
        // Turn radios into btn-group
        var $radios = $('.btn-group .radio');

        $radios.addClass('btn btn-default');

        $radios.click(function()
        {
            var btn = $(this);
            var group = btn.parent().find('.btn');
            var input = btn.find('input[type=radio]');

            if (input.prop('disabled') || input.prop('readonly'))
            {
                return;
            }

            if (!input.prop('checked'))
            {
                group.removeClass('active btn-success btn-danger btn-primary');

                if (input.val() == '')
                {
                    btn.addClass('active btn-primary');
                }
                else if (input.val() == 0)
                {
                    btn.addClass('active btn-danger');
                }
                else
                {
                    btn.addClass('active btn-success');
                }

                input.prop('checked', true);
                input.trigger('change');
            }
        });

        $radios.each(function()
        {
            var $radio = $(this);
            var $input = $radio.find('input');
            var $label = $radio.find('label');
            var $text  = $('<span>' + $label.text() + '</span>');

            $label.hide();
            $input.hide();
            $radio.prepend($text);
            $radio.removeClass('radio');

            if ($input.prop('checked'))
            {
                if ($input.val() == '')
                {
                    $radio.addClass('active btn-primary');
                }
                else if ($input.val() == 0)
                {
                    $radio.addClass('active btn-danger');
                }
                else
                {
                    $radio.addClass('active btn-success');
                }
            }

            if ($input.prop('disabled'))
            {
                $radio.addClass('disabled');
            }

            if ($input.prop('readonly'))
            {
                $radio.addClass('readonly');
            }
        });

        // add color classes to chosen field based on value
        $('select[class^="chzn-color"], select[class*=" chzn-color"]').on('liszt:ready', function()
        {
            var select = $(this);
            var cls = this.className.replace(/^.(chzn-color[a-z0-9-_]*)$.*/, '\1');
            var container = select.next('.chzn-container').find('.chzn-single');
            container.addClass(cls).attr('rel', 'value_' + select.val());
            select.on('change click', function()
            {
                container.attr('rel', 'value_' + select.val());
            });

        });
    });
})(jQuery);
