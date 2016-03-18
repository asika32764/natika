<?php
/**
 * Part of natika project.
 *
 * @copyright  Copyright (C) 2016 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

namespace Forum\Controller\Notification;

use Admin\View\Notification\NotificationHtmlView;
use Forum\Model\NotificationModel;
use Forum\Notification\Notification;
use Phoenix\Controller\AbstractSaveController;
use Windwalker\Core\Authentication\User;
use Windwalker\Core\Model\Exception\ValidFailException;
use Windwalker\Data\Data;

/**
 * The DeleteController class.
 *
 * @since  {DEPLOY_VERSION}
 */
class DeleteController extends AbstractSaveController
{
	/**
	 * Property name.
	 *
	 * @var  string
	 */
	protected $name = 'notification';

	/**
	 * Property itemName.
	 *
	 * @var  string
	 */
	protected $itemName = 'notification';

	/**
	 * Property listName.
	 *
	 * @var  string
	 */
	protected $listName = 'notifications';

	/**
	 * Property formControl.
	 *
	 * @var  string
	 */
	protected $formControl = null;

	/**
	 * Property model.
	 *
	 * @var  NotificationModel
	 */
	protected $model;

	/**
	 * Property view.
	 *
	 * @var  NotificationHtmlView
	 */
	protected $view;

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
	 * preSave
	 *
	 * @param Data $data
	 *
	 * @return void
	 */
	protected function preSave(Data $data)
	{
		parent::preSave($data);
	}

	/**
	 * doSave
	 *
	 * @param Data $data
	 *
	 * @return  void
	 *
	 * @throws ValidFailException
	 */
	protected function doSave(Data $data)
	{
		$user = User::get();

		if (!$user->isMember())
		{
			throw new ValidFailException('User not login');
		}

		Notification::removeNotification($data->type, $data->target_id, $user->id);
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
		parent::postSave($data);
	}

	/**
	 * postExecute
	 *
	 * @param mixed $result
	 *
	 * @return  mixed
	 */
	protected function postExecute($result = null)
	{
		return parent::postExecute($result);
	}

	/**
	 * getFailRedirect
	 *
	 * @param Data|null $data
	 *
	 * @return  string
	 */
	protected function getFailRedirect(Data $data = null)
	{
		if ($data->return)
		{
			return base64_decode($data->return);
		}

		return $this->router->html('home');
	}

	/**
	 * getSuccessRedirect
	 *
	 * @param Data|null $data
	 *
	 * @return  string
	 */
	protected function getSuccessRedirect(Data $data = null)
	{
		if ($data->return)
		{
			return base64_decode($data->return);
		}

		return $this->router->html('home');
	}

	/**
	 * checkToken
	 *
	 * @return  boolean
	 */
	protected function checkToken()
	{
		return true;
	}
}
