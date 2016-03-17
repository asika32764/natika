<?php
/**
 * Part of natika project.
 *
 * @copyright  Copyright (C) 2016 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

namespace Admin\Record;

use Lyrasoft\Luna\Table\LunaTable;
use Windwalker\Event\Event;

/**
 * The CategoryRecord class.
 *
 * @since  {DEPLOY_VERSION}
 */
class CategoryRecord extends \Lyrasoft\Luna\Admin\Record\CategoryRecord
{
	/**
	 * onAfterLoad
	 *
	 * @param Event $event
	 *
	 * @return  void
	 */
	public function onAfterLoad(Event $event)
	{
		if ($this->params && is_string($this->params))
		{
			$this->params = json_decode($this->params);
		}
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
		if ($this->params && !is_string($this->params))
		{
			$this->params = json_encode($this->params);
		}
	}

	/**
	 * resetFieldsCache
	 *
	 * @return  void
	 */
	public static function resetFieldsCache()
	{
		static::$fieldsCache[LunaTable::CATEGORIES] = null;
	}
}
