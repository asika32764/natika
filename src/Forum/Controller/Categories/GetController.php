<?php
/**
 * Part of phoenix project. 
 *
 * @copyright  Copyright (C) 2015 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

namespace Forum\Controller\Categories;

use Forum\Model\CategoriesModel;
use Forum\View\Categories\CategoriesHtmlView;
use Windwalker\Core\Controller\Controller;

/**
 * The GetController class.
 * 
 * @since  {DEPLOY_VERSION}
 */
class GetController extends Controller
{
	/**
	 * Property model.
	 *
	 * @var  CategoriesModel
	 */
	protected $model;

	/**
	 * Property view.
	 *
	 * @var  CategoriesHtmlView
	 */
	protected $view;

	/**
	 * prepareExecute
	 *
	 * @return  void
	 */
	protected function prepareExecute()
	{
		$this->model = $this->getModel();
		$this->view = $this->getView();
	}

	/**
	 * doExecute
	 *
	 * @return  mixed
	 */
	protected function doExecute()
	{
		$this->view->setModel($this->model);
		$this->view->setModel($this->getModel('Category'));

		return $this->view->render();
	}
}
