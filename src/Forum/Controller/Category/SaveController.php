<?php
/**
 * Part of phoenix project. 
 *
 * @copyright  Copyright (C) 2015 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

namespace Forum\Controller\Category;

use Natika\User\UserHelper;
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

		if ($this->data['id'])
		{
			$this->data['parent_id'] = null;
		}
	}

	protected function validate(Data $data)
	{
		if (!$data->title)
		{
			throw new ValidFailException('Require Title');
		}

		if (!UserHelper::isAdmin())
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
		return $this->app->get('uri.full');
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
