<?php
/**
 * Part of phoenix project. 
 *
 * @copyright  Copyright (C) 2015 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

namespace Forum\View\Category;

use Forum\Helper\BreadcrumbHelper;
use Phoenix\View\AbstractRadHtmView;

/**
 * The CategoryHtmlView class.
 * 
 * @since  {DEPLOY_VERSION}
 */
class CategoryHtmlView extends AbstractRadHtmView
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
		$paths = $data->currentCategory->path;

		$data->breadcrumbs = BreadcrumbHelper::getBreadcrumbs($paths);

		if ($data->currentCategory->id != 1)
		{
			$this->setTitle($data->currentCategory->title);
		}
	}
}
