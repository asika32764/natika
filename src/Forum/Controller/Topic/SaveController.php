<?php
/**
 * Part of natika project.
 *
 * @copyright  Copyright (C) 2015 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

namespace Forum\Controller\Topic;

use Admin\Record\CategoryRecord;
use Forum\Model\PostModel;
use Forum\Notification\Notification;
use Natika\User\UserHelper;
use Windwalker\Core\Model\Exception\ValidFailException;
use Windwalker\Data\Data;
use Windwalker\Record\NestedRecord;

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
	protected $name = 'topic';

	/**
	 * Property postModel.
	 *
	 * @var  PostModel
	 */
	protected $postModel;

	/**
	 * Property category.
	 *
	 * @var  int
	 */
	protected $catid;

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

		$this->useTransaction(true);

		if (isset($this->data['id']))
		{
			$this->record->load($this->data['id']);
		}

		$this->catid = $this->input->get('category');

		$this->category = new CategoryRecord;
		$this->category->load($this->catid);

		$this->data['category_id'] = $this->catid;
	}

	/**
	 * postSave
	 *
	 * @param Data $data
	 *
	 * @throws ValidFailException
	 */
	protected function postSave(Data $data)
	{
		$input = array(
			'item' => array(
				'topic_id' => $data->id,
				'primary'  => 1,
				'body'     => $data->body
			)
		);

		if (!$this->hmvc($controller = new \Forum\Controller\Post\SaveController, $input))
		{
			list($url, $msg, $type) = $controller->getRedirect(true);

			throw new ValidFailException($msg);
		}

		$post = $controller->getPost();

		$data->last_reply_post = $post->id;

		// Add Notification
		Notification::addNotification('topic', $data->id, $data->user_id);
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
		if (!trim($data->title))
		{
			throw new ValidFailException('Require Title');
		}

		if (!trim($data->body))
		{
			throw new ValidFailException('Require Content');
		}

		if ($this->record->id && !UserHelper::canEditTopic($this->record))
		{
			throw new ValidFailException('Permission deny');
		}
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
		$pk = $this->model['item.pk'];

		return $this->router->http($this->getName(), array($this->pkName => $pk, 'path' => $this->category->path));
	}

	/**
	 * getFailRedirect
	 *
	 * @param Data $data
	 *
	 * @return  string
	 */
	protected function getFailRedirect(Data $data = null)
	{
		$pk = $this->model['item.pk'];

		return $this->router->http('topic_new', array($this->pkName => $pk, 'category' => $this->catid));
	}
}
