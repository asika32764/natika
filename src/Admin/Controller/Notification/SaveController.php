<?php
/**
 * Part of Admin project.
 *
 * @copyright  Copyright (C) 2016 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

namespace Admin\Controller\Notification;

use Admin\Model\NotificationModel;
use Admin\View\Notification\NotificationHtmlView;
use Phoenix\Controller\AbstractSaveController;
use Windwalker\Data\Data;

/**
 * The SaveController class.
 * 
 * @since  1.0
 */
class SaveController extends AbstractSaveController
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
	protected $formControl = 'item';

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
}
