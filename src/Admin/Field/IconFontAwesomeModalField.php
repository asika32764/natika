<?php
/**
 * Part of natika project.
 *
 * @copyright  Copyright (C) 2016 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

namespace Admin\Field;

use Lyrasoft\Luna\Script\Select2Script;
use Phoenix\Asset\Asset;
use Phoenix\Field\ModalField;
use Phoenix\Script\JQueryScript;
use Windwalker\Core\Package\PackageHelper;
use Windwalker\Data\Data;
use Windwalker\Form\Field\ListField;
use Windwalker\Ioc;

/**
 * The FontAwesomeIconsField class.
 *
 * @since  {DEPLOY_VERSION}
 */
class IconFontAwesomeModalField extends ModalField
{
	/**
	 * Property route.
	 *
	 * @var  string
	 */
	protected $route = 'icon_modal';

	/**
	 * prepareAttributes
	 *
	 * @return  array
	 */
	public function prepareAttributes()
	{
		$this->appendAttribute('class', ' icon-input-field');

		return parent::prepareAttributes();
	}

	/**
	 * getTitle
	 *
	 * @return  Data
	 */
	protected function getTitle()
	{
		return $this->getValue() ? : 'None';
	}

	/**
	 * getUrl
	 *
	 * @return  string
	 */
	protected function getUrl()
	{
		$package = PackageHelper::getPackage($this->package);

		$package = $package ? : Ioc::get('current.package');

		$route = $this->get('route', $this->route) ? : $this->view;
		$query = $this->get('query', $this->query);

		return $package->router->html($route, array_merge(array(
			'layout'   => 'modal',
			'selector' => '#' . $this->getId() . '-wrap',
			'function' => 'Natika.Field.Modal.select'
		), $query));
	}

	/**
	 * prepareScript
	 *
	 * @return  void
	 */
	protected function prepareScript()
	{
		static $inited = false;

		if ($inited)
		{
			return;
		}

		JQueryScript::ui(array('effect'));

		$js = <<<JS
// Phoenix.Field.Modal
var Natika;
(function(Natika, $)
{
    (function()
    {
        Natika.Field.Modal = {
            select: function(selector, id, title)
            {
                var ele = $(selector);

                ele.find('.input-group input').attr('value', title).delay(250).effect('highlight');
                ele.find('input[data-value-store]').attr('value', id);

                ele.find('.icon-preview > span').attr('class', id);

                $('#phoenix-iframe-modal').modal('hide');
            }
        };
    })(Natika.Field || (Natika.Field = {}));
})(Natika || (Natika = {}), jQuery);

jQuery(document).ready(function($) {
    var inputs = $('.icon-input-field');

    inputs.each(function(i) {
        var \$this = $(this);

        var value = \$this.val();
        var icon = '<span class="' + value + '"></span>';

		\$this.parent('.input-group').prepend('<span class="input-group-addon icon-preview">' + icon + '</span>');
    });
});
JS;

		Asset::internalScript($js);

		$inited = true;
	}
}
