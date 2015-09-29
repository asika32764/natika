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
use Windwalker\Registry\Registry;

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

		// Prepare format
		foreach ($data->categories as $category)
		{
			$category->last_post->user_params = new Registry($category->last_post->user_params);
		}

		foreach ($data->topics as $topic)
		{
			$topic->last_user_params = new Registry($topic->last_user_params);
		}

	}
}
