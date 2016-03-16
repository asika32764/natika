<?php
/**
 * Part of phoenix project. 
 *
 * @copyright  Copyright (C) 2015 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

namespace Forum\Controller\Category;

use Forum\Model\TopicsModel;
use Forum\View\Category\CategoryHtmlView;
use Phoenix\Controller\Display\ListDisplayController;
use Windwalker\Core\Model\Model;
use Windwalker\Registry\Registry;

/**
 * The GetController class.
 * 
 * @since  {DEPLOY_VERSION}
 */
class GetController extends ListDisplayController
{
	/**
	 * Property model.
	 *
	 * @var  TopicsModel
	 */
	protected $model;

	/**
	 * Property view.
	 *
	 * @var  CategoryHtmlView
	 */
	protected $view;

	/**
	 * Property path.
	 *
	 * @var  string
	 */
	protected $path;

	/**
	 * doExecute
	 *
	 * @return  mixed
	 */
	protected function doExecute()
	{
		// $this->app->set('list.limit', 5);
		$page = 1;
		$path = (array) $this->input->getVar('path');

		if (count($path) > 0 && is_numeric($path[count($path) - 1]))
		{
			$page = array_pop($path);

			$this->input->set('page', $page);
		}

		$path = $this->path = implode('/', (array) $path);

		$this->prepareUserState($this->model);

		// Category
		$categoryModel = $this->getModel('category');
		$catsModel = $this->getModel('Categories');

		$currentCategory = $categoryModel->getItem(array('path' => $path));

		$catsModel['list.limit']    = 0;
		$catsModel['list.ordering'] = 'category.lft';
		$catsModel['list.filter']   = array(
			'category.parent_id' => $currentCategory->id ? : '1'
		);
		$catsModel['query.where'] = array(
			'category.id != 1'
		);

		$categories = $catsModel->getItems();

		foreach ($categories as $category)
		{
			$category->params = new Registry($category->params);
			$category->last_post = $categoryModel->getLastPost($category->id);
		}

		// Topics
		$topicsModel = $this->model;

		$topicsModel->set('list.ordering',  'topic.last_reply_date');
		$topicsModel->set('list.direction', 'DESC');
		$topicsModel->set('list.filter', array(
			'topic.category_id' => $currentCategory->id
		));
		$topics = $topicsModel->getItems();
		$pagination = $topicsModel->getPagination();

		$this->view['page']            = $page;
		$this->view['categories']      = $categories;
		$this->view['currentCategory'] = $currentCategory;
		$this->view['topics']          = $topics;
		$this->view['pagination']      = $pagination;

		$this->view->setModel($this->model);

		$this->assignModels($this->view);

		return $this->view->render();
	}

	/**
	 * getContext
	 *
	 * @param   string $task
	 *
	 * @return  string
	 */
	public function getContext($task = null)
	{
		$task = str_replace('/', '.', $this->path) . '.' . $task;

		return parent::getContext($task);
	}

	/**
	 * getModel
	 *
	 * @param string $name
	 * @param bool   $forceNew
	 *
	 * @return  Model
	 */
	public function getModel($name = 'Topics', $forceNew = false)
	{
		return parent::getModel($name, $forceNew);
	}
}
