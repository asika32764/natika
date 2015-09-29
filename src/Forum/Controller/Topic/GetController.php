<?php
/**
 * Part of phoenix project. 
 *
 * @copyright  Copyright (C) 2015 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

namespace Forum\Controller\Topic;

use Forum\Model\TopicModel;
use Forum\View\Topic\TopicHtmlView;
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
	 * @var  TopicModel
	 */
	protected $model;

	/**
	 * Property view.
	 *
	 * @var  TopicHtmlView
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

		return $this->view->render();
	}
}
