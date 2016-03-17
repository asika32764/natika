<?php
/**
 * Part of natika project.
 *
 * @copyright  Copyright (C) 2016 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

namespace Admin\View\Categories;

use Windwalker\Registry\Registry;

/**
 * The CategoriesHtmlView class.
 *
 * @since  {DEPLOY_VERSION}
 */
class CategoriesHtmlView extends \Lyrasoft\Luna\Admin\View\Categories\CategoriesHtmlView
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
		parent::prepareData($data);

		foreach ($data->items as $item)
		{
			if ($item->params && is_string($item->params))
			{
				$item->params = new Registry(json_decode($item->params));
			}
		}
	}
}
