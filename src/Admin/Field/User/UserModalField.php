<?php
/**
 * Part of phoenix project.
 *
 * @copyright  Copyright (C) 2015 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

namespace Admin\Field\User;

use Admin\Table\Table;
use Phoenix\Field\ModalField;

/**
 * The UserModalField class.
 *
 * @since  {DEPLOY_VERSION}
 */
class UserModalField extends ModalField
{
	/**
	 * Property table.
	 *
	 * @var  string
	 */
	protected $table = Table::USERS;

	/**
	 * Property view.
	 *
	 * @var  string
	 */
	protected $view = 'users';

	/**
	 * Property package.
	 *
	 * @var  string
	 */
	protected $package = 'admin';

	/**
	 * Property titleField.
	 *
	 * @var  string
	 */
	protected $titleField = 'title';

	/**
	 * Property keyField.
	 *
	 * @var  string
	 */
	protected $keyField = 'id';
}
