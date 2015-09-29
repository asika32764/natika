<?php
/**
 * Part of natika project.
 *
 * @copyright  Copyright (C) 2015 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

namespace Forum\Model;

use Admin\DataMapper\CategoryMapper;
use Phoenix\Model\CrudModel;
use Windwalker\Core\Authentication\User;
use Windwalker\Core\DateTime\DateTime;
use Windwalker\Data\Data;
use Windwalker\Record\Record;

/**
 * The TopicModel class.
 *
 * @since  {DEPLOY_VERSION}
 */
class TopicModel extends CrudModel
{
	/**
	 * getItem
	 *
	 * @param int $pk
	 *
	 * @return  Data
	 */
	public function getItem($pk = null)
	{
		$item = parent::getItem($pk);

		if ($item->notNull())
		{
			$mapper = new CategoryMapper;

			$item->category = $mapper->findOne($item->category_id);
		}

		return $item;
	}

	protected function prepareRecord(Record $record)
	{
		$user = User::get();
		$date = DateTime::create();

		$record->user_id = $user->id;
		$record->created_by = $user->id;
		$record->last_reply_user = $user->id;
		$record->last_reply_date = $date->toSql();

		$record->version = $record->version++;
		$record->replies = 1;
		$record->hits = 0;
		$record->favorites = 0;
		$record->rating = 0;

		$record->created = $date->toSql();
		$record->state = 1;
	}
}
