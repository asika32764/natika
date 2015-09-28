<?php
/**
 * Part of phoenix project.
 *
 * @copyright  Copyright (C) 2015 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

namespace Admin\Field\Topic;

use Admin\Table\Table;
use Phoenix\Field\ItemListField;

/**
 * The TopicField class.
 *
 * @since  {DEPLOY_VERSION}
 */
class TopicListField extends ItemListField
{
	/**
	 * Property table.
	 *
	 * @var  string
	 */
	protected $table = Table::TOPICS;

	/**
	 * Property ordering.
	 *
	 * @var  string
	 */
	protected $ordering = 'ordering';
}
