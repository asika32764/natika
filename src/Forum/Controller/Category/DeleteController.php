<?php
/**
 * Part of natika project.
 *
 * @copyright  Copyright (C) 2015 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

namespace Forum\Controller\Category;

use Natika\User\UserHelper;
use Windwalker\Core\Model\Exception\ValidFailException;
use Windwalker\Data\Data;
use Windwalker\Record\Record;

/**
 * The DeleteCategory class.
 *
 * @since  {DEPLOY_VERSION}
 */
class DeleteController extends \Phoenix\Controller\Batch\DeleteController
{
	/**
	 * Property parent.
	 *
	 * @var  Record
	 */
	protected $parent;

	/**
	 * Property id.
	 *
	 * @var  int
	 */
	protected $id;

	/**
	 * prepareExecute
	 *
	 * @return  void
	 */
	protected function prepareExecute()
	{
		parent::prepareExecute();

		if (isset($this->pks))
		{
			$this->id = $this->pks;
		}

		$this->parent = $this->model->getRecord('Category');
		$this->record->load($this->id);
		$this->parent->load($this->record->parent_id);
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
		// Validate
		if (!UserHelper::isAdmin())
		{
			throw new ValidFailException('Permission deny');
		}

		parent::save($pk, $data);
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
		return $this->router->http('category', array('path' => $this->parent->path));
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
		return $this->app->get('uri.full');
	}
}
