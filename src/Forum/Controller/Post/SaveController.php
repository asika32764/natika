<?php
/**
 * Part of natika project.
 *
 * @copyright  Copyright (C) 2015 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

namespace Forum\Controller\Post;

use Natika\User\UserHelper;
use Windwalker\Core\Authentication\User;
use Windwalker\Core\DateTime\DateTime;
use Windwalker\Core\Model\Exception\ValidFailException;
use Windwalker\Data\Data;
use Windwalker\Record\NestedRecord;
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
	 * Property category.
	 *
	 * @var  NestedRecord
	 */
	protected $category;

	/**
	 * prepareExecute
	 *
	 * @return  void
	 */
	protected function prepareExecute()
	{
		parent::prepareExecute();

		if (isset($this->data['id']))
		{
			$this->record->load($this->data['id']);
		}
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

		$this->category = $this->model->getRecord('Category');
		$this->category->load($topic->category_id);

		if ($this->isNew)
		{
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
			else
			{
				$this->category->topics++;
			}

			$this->category->posts++;

			$this->category->store();
		}
	}

	/**
	 * validate
	 *
	 * @param Data $data
	 *
	 * @return  void
	 *
	 * @throws ValidFailException
	 */
	protected function validate(Data $data)
	{
		if (!$data->body)
		{
			throw new ValidFailException('Require Content');
		}

		if ($this->record->id && !UserHelper::canEditOwnPost($this->record))
		{
			throw new ValidFailException('Permission deny');
		}
		elseif (UserHelper::isGuest())
		{
			throw new ValidFailException('Permission deny');
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

		$page = floor(($post->ordering / $limit) + 1);

		return $this->router->http('topic', array($this->pkName => $data->topic_id, 'path' => $this->category->path, 'page' => $page)) . '#reply-' . $post->id;
	}

	/**
	 * getFailRedirect
	 *
	 * @param   Data $data
	 *
	 * @return  string
	 */
	protected function getFailRedirect(Data $data = null)
	{
		if ($this->input->get('hmvc'))
		{
			return '';
		}

		// Count last pages
		$this->topic = $topic = $this->model->getRecord('Topic');
		$topic->load($data->topic_id);

		$page = $this->getUserState('forum.topic.list.page.' . $topic->id, 1);

		$category = $this->model->getRecord('Category');
		$category->load($topic->category_id);

		return $this->router->http('topic', array($this->pkName => $data->topic_id, 'path' => $category->path, 'page' => $page)) . '#editor';
	}
}
