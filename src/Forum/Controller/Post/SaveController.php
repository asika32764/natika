<?php
/**
 * Part of natika project.
 *
 * @copyright  Copyright (C) 2015 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

namespace Forum\Controller\Post;

use Forum\Model\PostModel;
use Windwalker\Core\Model\Exception\ValidFailException;
use Windwalker\Data\Data;

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

		$this->category = $this->input->get('category');
		$this->postModel = $this->getModel('Post');

		$this->data['category_id'] = $this->category;
	}

	protected function postSave(Data $data)
	{
		$post = new Data;

		$post->topic_id = $data->id;
		$post->body = $data->body;

		die;
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

		return $this->router->http($this->getName(), array($this->pkName => $pk, 'category' => $this->input->get('category')));
	}
}
