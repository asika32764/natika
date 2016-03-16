<?php
/**
 * Part of Admin project.
 *
 * @copyright  Copyright (C) 2016 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

namespace Admin\Model;

use Phoenix\Model\AdminModel;
use Windwalker\Data\Data;
use Windwalker\Record\Record;

/**
 * The TopicModel class.
 * 
 * @since  1.0
 */
class TopicModel extends AdminModel
{
	/**
	 * Property name.
	 *
	 * @var  string
	 */
	protected $name = 'topic';

	/**
	 * Property reorderConditions.
	 *
	 * @var  array
	 */
	protected $reorderConditions = array();

	/**
	 * postGetItem
	 *
	 * @param Data $item
	 *
	 * @return  void
	 */
	protected function postGetItem(Data $item)
	{
		// Do some stuff
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
		parent::prepareRecord($record);
	}

	/**
	 * getReorderConditions
	 *
	 * @param Record $record
	 *
	 * @return  array  An array of conditions to add to ordering queries.
	 */
	public function getReorderConditions(Record $record)
	{
		return parent::getReorderConditions($record);
	}

	/**
	 * Method to set new item ordering as first or last.
	 *
	 * @param   Record $record   Item table to save.
	 * @param   string $position `first` or other are `last`.
	 *
	 * @return  void
	 */
	public function setOrderPosition(Record $record, $position = self::ORDER_POSITION_LAST)
	{
		parent::setOrderPosition($record, $position);
	}
}
