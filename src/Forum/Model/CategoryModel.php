<?php
/**
 * Part of natika project.
 *
 * @copyright  Copyright (C) 2015 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

namespace Forum\Model;

use Admin\Table\Table;
use Lyrasoft\Luna\Table\LunaTable;
use Phoenix\Model\AdminModel;
use Phoenix\Model\CrudModel;
use Windwalker\Core\Authentication\User;
use Windwalker\Core\DateTime\DateTime;
use Windwalker\Data\Data;
use Windwalker\DataMapper\RelationDataMapper;
use Windwalker\Filter\OutputFilter;
use Windwalker\Record\NestedRecord;
use Windwalker\Record\Record;
use Windwalker\Warder\Table\WarderTable;

/**
 * The CategoryModel class.
 *
 * @since  {DEPLOY_VERSION}
 */
class CategoryModel extends AdminModel
{
	/**
	 * prepareRecord
	 *
	 * @param NestedRecord|Record $record
	 *
	 * @return  void
	 */
	protected function prepareRecord(Record $record)
	{
		$user = User::get();
		$date = DateTime::create();

		if (!$record->alias)
		{
			$record->alias = $record->title;
		}

		$record->alias = OutputFilter::stringURLUnicodeSlug($record->alias);

		if (!$record->alias)
		{
			$record->alias = OutputFilter::stringURLSafe($date->format('Y-m-d-H-i-s'));
		}

		// Created date
		if (!$record->created)
		{
			$record->created = $date->toSql();
		}

		// Modified date
		if ($record->id)
		{
			$record->modified = $date->toSql();
		}

		// Created user
		if (!$record->created_by)
		{
			$record->created_by = $user->id;
		}

		// Modified user
		if ($record->id)
		{
			$record->modified_by = $user->id;
		}

		// Set Ordering or Nested ordering
		if (!$record->id)
		{
			$record->setLocation($record->parent_id, $record::LOCATION_LAST_CHILD);
		}

		if (!$record->id)
		{
			$record->state = 1;
			$record->access = 1;
			$record->topics = 0;
			$record->posts = 0;
		}
	}

	/**
	 * postSaveHook
	 *
	 * @param NestedRecord|Record $record
	 *
	 * @return  void
	 */
	protected function postSaveHook(Record $record)
	{
		$record->rebuildPath();
	}

	/**
	 * getLastPost
	 *
	 * @param int $pk
	 *
	 * @return  Data
	 */
	public function getLastPost($pk)
	{
		$mapper = new RelationDataMapper('post', Table::POSTS);
		$mapper->addTable('topic', Table::TOPICS,     'topic.id = post.topic_id')
			->addTable('category', LunaTable::CATEGORIES, 'category.id = topic.category_id')
			->addTable('user', WarderTable::USERS,      'user.id = post.user_id');

		$post = $mapper->findOne(array('category.id' => $pk), 'post.created DESC');

		return $post;
	}
}
