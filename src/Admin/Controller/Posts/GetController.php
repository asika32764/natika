<?php
/**
 * Part of Admin project.
 *
 * @copyright  Copyright (C) 2016 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

namespace Admin\Controller\Posts;

use Admin\Model\PostsModel;
use Admin\View\Posts\PostsHtmlView;
use Phoenix\Controller\Display\ListDisplayController;
use Windwalker\Core\Model\Model;

/**
 * The GetController class.
 * 
 * @since  1.0
 */
class GetController extends ListDisplayController
{
	/**
	 * Property name.
	 *
	 * @var  string
	 */
	protected $name = 'posts';

	/**
	 * Property itemName.
	 *
	 * @var  string
	 */
	protected $itemName = 'post';

	/**
	 * Property listName.
	 *
	 * @var  string
	 */
	protected $listName = 'posts';

	/**
	 * Property model.
	 *
	 * @var  PostsModel
	 */
	protected $model;

	/**
	 * Property view.
	 *
	 * @var  PostsHtmlView
	 */
	protected $view;

	/**
	 * Property ordering.
	 *
	 * @var  string
	 */
	protected $defaultOrdering = null;

	/**
	 * Property direction.
	 *
	 * @var  string
	 */
	protected $defaultDirection = null;

	/**
	 * prepareExecute
	 *
	 * @return  void
	 */
	protected function prepareExecute()
	{
		$this->layout = $this->input->get('layout');

		parent::prepareExecute();
	}

	/**
	 * prepareUserState
	 *
	 * @param   Model $model
	 *
	 * @return  void
	 */
	protected function prepareUserState(Model $model)
	{
		parent::prepareUserState($model);
	}
}
