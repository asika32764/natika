<?php
/**
 * Part of natika project.
 *
 * @copyright  Copyright (C) 2015 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

namespace Forum\Controller\Post;

use Windwalker\Core\Authentication\User;
use Windwalker\Core\DateTime\DateTime;
use Windwalker\Data\Data;
use Windwalker\Record\Record;

/**
 * The SaveController class.
 *
 * @since  {DEPLOY_VERSION}
 */
class SaveController extends \Phoenix\Controller\SaveController
{
	/**
	 * Property name.
	 *
	 * @var  string
	 */
	protected $name = 'post';

	/**
	 * Property post.
	 *
	 * @var  Data
	 */
	protected $post;

	/**
	 * Property topic.
	 *
	 * @var  Record
	 */
	protected $topic;

	/**
	 * prepareExecute
	 *
	 * @return  void
	 */
	protected function prepareExecute()
	{
		parent::prepareExecute();
	}

	/**
	 * postSave
	 *
	 * @param Data $data
	 *
	 * @return  void
	 */
	protected function postSave(Data $data)
	{
		$this->post = $data;

		$this->topic = $topic = $this->model->getRecord('Topic');
		$topic->load($data->topic_id);

		if (!$data->primary)
		{
			$user = User::get();
			$date = DateTime::create();

			$topic->last_reply_user = $user->id;
			$topic->last_reply_post = $data->id;
			$topic->last_reply_date = $date->toSql();
			$topic->replies++;

			$topic->store();
		}
	}

	/**
	 * Method to get property Post
	 *
	 * @return  Data
	 */
	public function getPost()
	{
		return $this->post;
	}

	/**
	 * getSuccessRedirect
	 *
	 * @param Data $data
	 *
	 * @return  string
	 */
	protected function getSuccessRedirect(Data $data = null)
	{
		if ($this->input->get('hmvc'))
		{
			return '';
		}

		// Count last pages
		$post = $this->model->getItem($data->id);

		$limit = $this->app->get('post.limit', 15);

		$page = ceil($post->ordering / $limit) + 1;

		$topic = $this->topic;

		$category = $this->model->getRecord('Category');
		$category->load($topic->category_id);

		return $this->router->http('topic', array($this->pkName => $data->topic_id, 'path' => $category->path, 'page' => $page)) . '#reply-' . $post->ordering;
	}
}
