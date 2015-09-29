<?php
/**
 * Part of phoenix project. 
 *
 * @copyright  Copyright (C) 2015 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

namespace Forum\View\Topic;

use Forum\Helper\BreadcrumbHelper;
use Phoenix\View\ItemView;

/**
 * The TopicHtmlView class.
 * 
 * @since  {DEPLOY_VERSION}
 */
class TopicHtmlView extends ItemView
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
		$paths = $this['topic']->category->path;

		$data->breadcrumbs = BreadcrumbHelper::getBreadcrumbs($paths);

		$this->setTitle($data->topic->title);
	}
}
