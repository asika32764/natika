<?php
/**
 * Part of phoenix project. 
 *
 * @copyright  Copyright (C) 2015 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

namespace Forum\Controller\Topic;

use Admin\Model\PostsModel;
use Forum\View\Topic\TopicHtmlView;
use Phoenix\Controller\Display\ListDisplayController;

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
	 * @var  PostsModel
	 */
	protected $model;

	/**
	 * Property view.
	 *
	 * @var  TopicHtmlView
	 */
	protected $view;

	/**
	 * Property id.
	 *
	 * @var  int
	 */
	protected $id;

	/**
	 * Property layout.
	 *
	 * @var  string
	 */
	protected $format = 'html';

	/**
	 * prepareExecute
	 *
	 * @return  void
	 */
	protected function prepareExecute()
	{
		$this->model = $this->getModel('Posts');
		$this->view = $this->getView();
	}

	/**
	 * doExecute
	 *
	 * @return  mixed
	 */
	protected function doExecute()
	{
		$this->app->set('list.limit', 15);

		$id = $this->id = $this->input->get('id');

		$this->prepareUserState($this->model);

		$topicModel  = $this->getModel('Topic');
		$postsModel  = $this->model;

		// Topic
		$topic = $topicModel->getItem($id);

		if ($topic->isNull())
		{
			throw new \UnexpectedValueException('Topic not found', 404);
		}

		$postsModel['list.ordering'] = 'post.ordering';
		$postsModel['list.direction'] = 'ASC';
		$postsModel['list.filter'] = array(
			'post.topic_id' => $topic->id
		);

		$posts = $postsModel->getItems();

		$pagination = $postsModel->getPagination();

		$this->view['topic'] = $topic;
		$this->view['posts'] = $posts;
		$this->view['pagination'] = $pagination;

		// Add hits
		$topicModel->addHit($topic->id, 1);

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
		$task =  $task . '.' . $this->id;

		return parent::getContext($task);
	}
}
