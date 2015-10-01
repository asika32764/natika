/**
 * Part of natika project.
 *
 * @copyright  Copyright (C) 2015 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

;(function($)
{
    "use strict";

    window.NatikaCategory = window.NatikaCategory || {
        create: function(parentId)
        {
            var modal = $('#categoryModal');

            modal.find('input, textarea, select').val('');

            modal.find('#input-parent').val(parentId);
        },
        edit: function(data)
        {
            var modal = $('#categoryModal');
            
            console.log(data.params.bg_color);

            modal.find('#category-title').val(data.title);
            modal.find('#category-desc').val(data.description);
            modal.find('#input-color').val(data.params.bg_color).change();
            modal.find('#input-icon').val(data.params.image_icon);
            modal.find('#input-id').val(data.id);
            modal.find('#input-id').val(data.id);
        }
    };

})(jQuery);
