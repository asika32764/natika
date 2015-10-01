<?php
/**
 * Part of natika project.
 *
 * @copyright  Copyright (C) 2015 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

namespace Forum\Model;

use Phoenix\Model\AdminModel;
use Windwalker\Core\Authentication\User;
use Windwalker\Core\DateTime\DateTime;
use Windwalker\Record\Record;

/**
 * The PostModel class.
 *
 * @since  {DEPLOY_VERSION}
 */
class PostModel extends AdminModel
{
	/**
	 * Property reorderConditions.
	 *
	 * @var  array
	 */
	protected $reorderConditions = array(
		'topic_id'
	);

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

		if (!$record->id)
		{
			$record->version = 1;
			$record->rating  = 0;
			$record->state   = 1;
			$record->user_id = $user->id;
			$record->created = $date->toSql();
			$record->created_by = $user->id;

			$this->setOrderPosition($record);
		}
		else
		{
			$record->modified = $date->toSql();
			$record->modified_by = $user->id;
		}
	}
}
