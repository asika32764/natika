<?php
/**
 * Part of phoenix project.
 *
 * @copyright  Copyright (C) 2015 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

namespace Admin\Field\User;

use Admin\Table\Table;
use Phoenix\Field\ItemListField;

/**
 * The UserField class.
 *
 * @since  {DEPLOY_VERSION}
 */
class UserListField extends ItemListField
{
	/**
	 * Property table.
	 *
	 * @var  string
	 */
	protected $table = Table::USERS;

	/**
	 * Property ordering.
	 *
	 * @var  string
	 */
	protected $ordering = 'ordering';
}
