<?php
/**
 * Part of phoenix project. 
 *
 * @copyright  Copyright (C) 2015 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

namespace Forum\View\Topic;

use Admin\Record\CategoryRecord;
use Windwalker\Core\View\BladeHtmlView;
use Windwalker\Data\Data;

/**
 * The TopicHtmlView class.
 * 
 * @since  {DEPLOY_VERSION}
 */
class TopicHtmlView extends BladeHtmlView
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
		$paths = explode('/', $paths);
		$record = new CategoryRecord;
		$breadcrumbs = array();

		$breadcrumbs[] = new Data(array(
			'title' => 'Home',
			'path' => '',
			'link' => $this->getRouter()->html('home')
		));

		foreach (range(1, count($paths)) as $i)
		{
			$item = new Data;

			$item->path = implode('/', $paths);
			$item->link = $this->getRouter()->html('category', array('path' => $paths));

			$record->load(array('path' => $item->path));

			$item->title = $record->title;

			$breadcrumbs[] = $item;

			array_pop($paths);
		}

		$data->breadcrumbs = $breadcrumbs;
	}
}
