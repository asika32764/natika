<?php
/**
 * Part of natika project.
 *
 * @copyright  Copyright (C) 2015 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

namespace Forum\Controller\Topic;

use Natika\User\UserHelper;
use Windwalker\Core\Model\Exception\ValidFailException;
use Windwalker\Data\Data;

/**
 * The DeleteController class.
 *
 * @since  {DEPLOY_VERSION}
 */
class DeleteController extends \Phoenix\Controller\Batch\DeleteController
{
	/**
	 * prepareExecute
	 *
	 * @return  void
	 */
	protected function prepareExecute()
	{
		parent::prepareExecute();

		$this->record->load($this->pks);
	}

	/**
	 * save
	 *
	 * @param int|string $pk
	 * @param Data       $data
	 *
	 * @return mixed|void
	 *
	 * @throws ValidFailException
	 */
	protected function save($pk, Data $data)
	{
		if (!UserHelper::canEditTopic($this->record))
		{
			throw new ValidFailException('Permission deny');
		}

		parent::save($pk, $data);
	}
}
