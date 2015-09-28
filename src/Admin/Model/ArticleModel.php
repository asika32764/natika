<?php
/**
 * Part of phoenix project. 
 *
 * @copyright  Copyright (C) 2015 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

namespace Admin\Model;

use Phoenix\Model\AdminModel;
use Windwalker\Record\Record;

/**
 * The ArticleModel class.
 * 
 * @since  {DEPLOY_VERSION}
 */
class ArticleModel extends AdminModel
{
	/**
	 * Property name.
	 *
	 * @var  string
	 */
	protected $name = 'article';

	/**
	 * Property reorderConditions.
	 *
	 * @var  array
	 */
	protected $reorderConditions = array();

	/**
	 * postGetItem
	 *
	 * @param Record $item
	 *
	 * @return  void
	 */
	protected function postGetItem(Record $item)
	{
		parent::postGetItem($item);
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
