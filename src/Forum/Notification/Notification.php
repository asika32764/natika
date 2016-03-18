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
	 * @param int    $topicId
	 * @param int    $userId
	 *
	 * @return mixed|\Windwalker\Data\Data
	 */
	public static function addNotification($type = 'topic', $topicId, $userId)
	{
		$mapper = new NotificationMapper;

		$notify = $mapper->findOne(['user_id' => $userId, 'topic_id' => $topicId, 'type' => $type]);

		if ($notify->isNull())
		{
			$notify = $mapper->createOne(array(
				'topic_id' => $topicId,
				'user_id' => $userId,
				'type' => $type
			));
		}

		return $notify;
	}

	/**
	 * getNotifications
	 *
	 * @param   string  $type
	 * @param   int     $topicId
	 *
	 * @return  mixed|\Windwalker\Data\DataSet
	 */
	public static function getNotifications($type, $topicId)
	{
		return RelationDataMapper::getInstance('user', WarderTable::USERS)
			->addTable('notification', Table::NOTIFICATIONS, 'notification.user_id = user.id')
			->find(['notification.topic_id' => $topicId, 'type' => $type]);
	}
}
