<?php
/**
 * Part of phoenix project. 
 *
 * @copyright  Copyright (C) 2015 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

namespace Forum\View\Categories;

use Windwalker\Core\View\BladeHtmlView;
use Windwalker\Registry\Registry;

/**
 * The CategoriesHtmlView class.
 * 
 * @since  {DEPLOY_VERSION}
 */
class CategoriesHtmlView extends BladeHtmlView
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
		$state = $this->model->getState();
		$state['list.limit'] = 0;

		$state['list.filter'] = array(
			'category.level' => 1
		);

		$data->items = $this->model->getItems();

		foreach ($data->items as $item)
		{
			$item->params = new Registry($item->params);
			$item->last_post = $this->model['category']->getLastPost($item->id);
		}
	}
}
