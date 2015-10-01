<?php
/**
 * Part of natika project.
 *
 * @copyright  Copyright (C) 2015 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

namespace Forum\Controller\Topic;

use Natika\User\UserHelper;
use Phoenix\Controller\SaveController;
use Windwalker\Core\Model\Exception\ValidFailException;
use Windwalker\Data\Data;
use Windwalker\Record\NestedRecord;

/**
 * The UpdateController class.
 *
 * @since  {DEPLOY_VERSION}
 */
class UpdateController extends SaveController
{
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

		$this->record->load($this->data['id']);

		$this->category = $this->model->getRecord('Category');
		$this->category->load($this->record->category_id);
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
		if (!$data->title)
		{
			throw new ValidFailException('Require Title');
		}

		if (!UserHelper::canEditTopic($this->record))
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
		$pk = $data['id'];

		return $this->router->http($this->getName(), array($this->pkName => $pk, 'path' => $this->category->path));
	}
}
