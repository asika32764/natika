<?php
/**
 * Part of natika project.
 *
 * @copyright  Copyright (C) 2016 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

namespace Forum\Notification;

use Admin\DataMapper\NotificationMapper;
use Admin\Table\Table;
use Windwalker\DataMapper\RelationDataMapper;
use Windwalker\Warder\Table\WarderTable;

/**
 * The Notification class.
 *
 * @since  {DEPLOY_VERSION}
 */
class Notification
{
	/**
	 * addNotification
	 *
	 * @param string $type
	 * @param int    $targetId
	 * @param int    $userId
	 *
	 * @return mixed|\Windwalker\Data\Data
	 */
	public static function addNotification($type = 'topic', $targetId, $userId)
	{
		$mapper = new NotificationMapper;

		$notify = $mapper->findOne(['user_id' => $userId, 'target_id' => $targetId, 'type' => $type]);

		if ($notify->isNull())
		{
			$notify = $mapper->createOne(array(
				'target_id' => $targetId,
				'user_id' => $userId,
				'type' => $type
			));
		}

		return $notify;
	}

	/**
	 * getNotifications
	 *
	 * @param   string $type
	 * @param   int    $targetId
	 *
	 * @return  mixed|\Windwalker\Data\DataSet
	 */
	public static function getNotifications($type, $targetId)
	{
		return RelationDataMapper::getInstance('user', WarderTable::USERS)
			->addTable('notification', Table::NOTIFICATIONS, 'notification.user_id = user.id')
			->find(['notification.target_id' => $targetId, 'type' => $type]);
	}

	/**
	 * getNotification
	 *
	 * @param   string  $type
	 * @param   int     $targetId
	 * @param   int     $userId
	 *
	 * @return  mixed|\Windwalker\Data\Data
	 */
	public static function getNotification($type, $targetId, $userId)
	{
		$mapper = new NotificationMapper;

		return $mapper->findOne(['user_id' => $userId, 'target_id' => $targetId, 'type' => $type]);
	}

	/**
	 * removeNotification
	 *
	 * @param   string  $type
	 * @param   int     $targetId
	 * @param   int     $userId
	 *
	 * @return  bool
	 */
	public static function removeNotification($type, $targetId, $userId)
	{
		$mapper = new NotificationMapper;

		return $mapper->delete(['type' => $type, 'target_id' => $targetId, 'user_id' => $userId]);
	}
}
