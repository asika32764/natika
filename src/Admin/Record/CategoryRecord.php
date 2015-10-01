<?php
/**
 * Part of phoenix project. 
 *
 * @copyright  Copyright (C) 2015 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

namespace Admin\Record;

use Admin\DataMapper\TopicMapper;
use Admin\Table\Table;
use Monolog\Registry;
use Windwalker\Event\Event;
use Windwalker\Record\NestedRecord;

/**
 * The CategoryRecord class.
 * 
 * @since  {DEPLOY_VERSION}
 */
class CategoryRecord extends NestedRecord
{
	/**
	 * Property table.
	 *
	 * @var  string
	 */
	protected $table = Table::CATEGORIES;

	/**
	 * onAfterLoad
	 *
	 * @param Event $event
	 *
	 * @return  void
	 */
	public function onAfterLoad(Event $event)
	{
		$event['record']->params = json_decode($event['record']->params);
	}

	/**
	 * onBeforeStore
	 *
	 * @param Event $event
	 *
	 * @return  void
	 */
	public function onBeforeStore(Event $event)
	{
		if ($event['record']->params instanceof Registry)
		{
			$event['record']->params = $event['record']->params->toString();
		}
		elseif (!is_string($event['record']->params))
		{
			$event['record']->params = json_encode($event['record']->params);
		}
	}

	/**
	 * onAfterStore
	 *
	 * @param Event $event
	 *
	 * @return  void
	 */
	public function onAfterStore(Event $event)
	{
		// Add your logic
	}

	/**
	 * onAfterDelete
	 *
	 * @param Event $event
	 *
	 * @return  void
	 */
	public function onAfterDelete(Event $event)
	{
		$record = $event['record'];

		$topicMapper = new TopicMapper;

		$topics = $topicMapper->findColumn('id', array('category_id' => $record->id));

		$topicRecord = new TopicRecord;

		foreach ($topics as $topicId)
		{
			$topicRecord->load($topicId)->delete();
		}
	}
}
