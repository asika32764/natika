<?php
/**
 * Part of natika project.
 *
 * @copyright  Copyright (C) 2016 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

namespace Admin\View\Icon;

use Phoenix\View\AbstractPhoenixHtmView;
use Windwalker\Ioc;

/**
 * The IconHtmlView class.
 *
 * @since  {DEPLOY_VERSION}
 */
class IconHtmlView extends AbstractPhoenixHtmView
{
	protected function prepareData($data)
	{
		parent::prepareData($data);

		$input = Ioc::getInput();

		$data->function = $input->getString('function');
		$data->selector = $input->getString('selector');
	}
}
