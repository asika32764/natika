<?php
/**
 * Part of phoenix project. 
 *
 * @copyright  Copyright (C) 2015 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

namespace Forum\View\Topics;

use Windwalker\Core\View\BladeHtmlView;

/**
 * The TopicsHtmlView class.
 * 
 * @since  {DEPLOY_VERSION}
 */
class TopicsHtmlView extends BladeHtmlView
{
	/**
	 * prepareData
	 *
	 * @param \Windwalker\Data\Data $data
	 *
	 * @return  void
	 */
	protected function prepareData($data)
	{
		$data->items = $this->model->getSomething();
	}
}
