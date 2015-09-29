<?php
/**
 * Part of phoenix project. 
 *
 * @copyright  Copyright (C) 2015 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

namespace Forum\Controller\Topic;

use Forum\Record\TopicRecord;
use Phoenix\Controller\AbstractSaveController;
use Windwalker\Data\Data;

/**
 * The SaveController class.
 * 
 * @since  {DEPLOY_VERSION}
 */
class SaveController extends AbstractSaveController
{
	/**
	 * doSave
	 *
	 * @param Data $data
	 *
	 * @return void
	 */
	protected function doSave(Data $data)
	{
		$record = new TopicRecord;

		$record->bind($data->dump())
			->check()
			->store($record::UPDATE_NULLS);
	}
}
