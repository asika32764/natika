<?php
/**
 * Part of Admin project.
 *
 * @copyright  Copyright (C) 2016 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

namespace Admin\Controller\Dashboard;

use Admin\Model\DashboardModel;
use Admin\Model\UsersModel;
use Admin\View\Dashboard\DashboardHtmlView;
use Forum\Model\TopicsModel;
use Phoenix\Controller\Display\EditDisplayController;
use Windwalker\Core\Model\Model;

/**
 * The GetController class.
 * 
 * @since  1.0
 */
class GetController extends EditDisplayController
{
	/**
	 * Property name.
	 *
	 * @var  string
	 */
	protected $name = 'dashboard';

	/**
	 * Property itemName.
	 *
	 * @var  string
	 */
	protected $itemName = 'dashboard';

	/**
	 * Property listName.
	 *
	 * @var  string
	 */
	protected $listName = 'dashboards';

	/**
	 * Property model.
	 *
	 * @var  DashboardModel
	 */
	protected $model;

	/**
	 * Property view.
	 *
	 * @var  DashboardHtmlView
	 */
	protected $view;

	/**
	 * prepareExecute
	 *
	 * @return  void
	 */
	protected function prepareExecute()
	{
		parent::prepareExecute();

		$topicsModel = new TopicsModel;
		$topicsModel->addFilter('topic.state', 1);
		$topicsModel->setOrdering('topic.last_reply_date', 'DESC');
		$topicsModel->set('list.limit', 10);

		$usersModel = new UsersModel;
		$usersModel->setOrdering('user.registererd', 'DESC');
		$usersModel->set('list.limit', 10);

		$this->subModels['topics'] = $topicsModel;
		$this->subModels['users'] = $usersModel;
	}

	/**
	 * prepareExecute
	 *
	 * @param Model $model
	 *
	 * @return void
	 */
	protected function prepareUserState(Model $model)
	{
		parent::prepareUserState($model);
	}

	/**
	 * postExecute
	 *
	 * @param mixed $result
	 *
	 * @return  mixed
	 */
	protected function postExecute($result = null)
	{
		return parent::postExecute($result);
	}
}
