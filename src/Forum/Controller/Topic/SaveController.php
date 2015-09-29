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

		$this->data['category_id'] = $this->category;
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
		$input = array(
			'item' => array(
				'topic_id' => $data->id,
				'primary'  => 1,
				'body'     => $data->body
			)
		);

		$this->hmvc($controller = new \Forum\Controller\Post\SaveController, $input);

		$post = $controller->getPost();

		$data->last_reply_post = $post->id;
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
	 * getSuccessRedirect
	 *
	 * @param Data $data
	 *
	 * @return  string
	 */
	protected function getSuccessRedirect(Data $data = null)
	{
		$pk = $this->model['item.pk'];

		$category = new CategoryRecord;
		$category->load($this->category);

		return $this->router->http($this->getName(), array($this->pkName => $pk, 'path' => $category->path));
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

		return $this->router->http($this->getName(), array($this->pkName => $pk, 'category' => $this->category));
	}
}
