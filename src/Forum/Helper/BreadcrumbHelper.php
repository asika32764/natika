<?php
/**
 * Part of natika project.
 *
 * @copyright  Copyright (C) 2015 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

namespace Forum\Helper;

use Admin\Record\CategoryRecord;
use Windwalker\Core\Router\Router;
use Windwalker\Data\Data;

/**
 * The BreadcrumbHelper class.
 *
 * @since  {DEPLOY_VERSION}
 */
class BreadcrumbHelper
{
	/**
	 * getBreadcrumbs
	 *
	 * @param string $paths
	 *
	 * @return  Data[]
	 */
	public static function getBreadcrumbs($paths)
	{
		if (!$paths)
		{
			return array();
		}

		$paths = explode('/', $paths);
		$record = new CategoryRecord;
		$breadcrumbs = array();

		foreach (range(1, count($paths)) as $i)
		{
			$item = new Data;

			$item->path = implode('/', $paths);
			$item->link = Router::html('forum:category', array('path' => $paths));

			$record->load(array('path' => $item->path));

			$item->title = $record->title;

			$breadcrumbs[] = $item;

			array_pop($paths);
		}

		$breadcrumbs[] = new Data(array(
			'title' => 'Home',
			'path' => '',
			'link' => Router::html('forum:home')
		));

		$breadcrumbs = array_reverse($breadcrumbs);

		return $breadcrumbs;
	}
}
