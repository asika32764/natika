<?php
/**
 * Part of natika project.
 *
 * @copyright  Copyright (C) 2015 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

namespace Forum\Model;

use Admin\Table\Table;
use Lyrasoft\Luna\Admin\DataMapper\CategoryMapper;
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

	/**
	 * prepareRecord
	 *
	 * @param Record $record
	 *
	 * @return  void
	 */
	protected function prepareRecord(Record $record)
	{
		$user = User::get();
		$date = DateTime::create();

		// New
		if (!$record->id)
		{
			$record->user_id = $user->id;
			$record->created_by = $user->id;
			$record->version = 1;
			$record->replies = 1;
			$record->hits = 0;
			$record->favorites = 0;
			$record->rating = 0;
			$record->created = $date->toSql();
			$record->state = 1;
		}

		$record->last_reply_user = $user->id;
		$record->last_reply_date = $date->toSql();
	}

	/**
	 * addHit
	 *
	 * @param int $pk
	 * @param int $num
	 *
	 * @return  bool
	 */
	public function addHit($pk = null, $num = 1)
	{
		$pk = $pk ? : $this['item.pk'];

		$query = $this->db->getQuery(true);

		$query->update(Table::TOPICS)
			->set('hits = hits + 1')
			->where('id = ' . $pk);

		$this->db->setQuery($query)->execute();

		return true;
	}
}
