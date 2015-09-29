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
use Windwalker\Data\Data;

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
}
