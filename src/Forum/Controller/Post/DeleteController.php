<?php
/**
 * Part of natika project.
 *
 * @copyright  Copyright (C) 2015 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

namespace Forum\Controller\Post;

use Forum\Controller\Topic\DeleteController as TopicDeleteController;
use Natika\User\UserHelper;
use Windwalker\Core\Model\Exception\ValidFailException;
use Windwalker\Data\Data;
use Windwalker\Record\Record;

/**
 * The DeleteController class.
 *
 * @since  {DEPLOY_VERSION}
 */
class DeleteController extends \Phoenix\Controller\Batch\DeleteController
{
	/**
	 * Property topic.
	 *
	 * @var  Record
	 */
	protected $topic;

	/**
	 * Property primary.
	 *
	 * @var  bool
	 */
	protected $primary = false;

	/**
	 * prepareExecute
	 *
	 * @return  void
	 */
	protected function prepareExecute()
	{
		parent::prepareExecute();

		$pks = (array) $this->pks;

		$this->record->load(array_shift($pks));

		$this->primary = (bool) $this->record->primary;

		$this->topic = $this->model->getRecord('Topic');
		$this->topic->load($this->record->topic_id);
	}

	/**
	 * save
	 *
	 * @param int|string $pk
	 * @param Data       $data
	 *
	 * @return  void
	 *
	 * @throws ValidFailException
	 */
	protected function save($pk, Data $data)
	{
		// Pre save
		if (!UserHelper::canDeletePost($this->record))
		{
			throw new ValidFailException('Permission deny');
		}

		if ($this->primary)
		{
			$this->hmvc($controller = new TopicDeleteController, array(
				'cid' => $this->record->topic_id
			));
		}
		else
		{
			parent::save($pk, $data);
		}

		// Post save
		$this->topic->replies--;
		$this->topic->store();
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
		$category = $this->model->getRecord('Category');
		$category->load($this->topic->category_id);

		if ($this->primary)
		{
			return $this->router->http('category', array('path' => $category->path));
		}
		else
		{
			return $this->router->http('topic', array('path' => $category->path, 'id' => $this->topic->id));
		}
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
		$category = $this->model->getRecord('Category');
		$category->load($this->topic->category_id);

		return $this->router->http('topic', array('path' => $category->path, 'id' => $this->topic->id));
	}
}
