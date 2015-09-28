<?php
/**
 * Part of phoenix project.
 *
 * @copyright  Copyright (C) 2015 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

namespace Admin\Field\Category;

use Admin\Table\Table;
use Phoenix\Field\ItemListField;

/**
 * The CategoryField class.
 *
 * @since  {DEPLOY_VERSION}
 */
class CategoryListField extends ItemListField
{
	/**
	 * Property table.
	 *
	 * @var  string
	 */
	protected $table = Table::CATEGORIES;

	/**
	 * Property ordering.
	 *
	 * @var  string
	 */
	protected $ordering = 'ordering';
}
