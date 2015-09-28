<?php
/**
 * Part of phoenix project.
 *
 * @copyright  Copyright (C) 2015 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

namespace Admin\Field\Category;

use Admin\Table\Table;
use Phoenix\Field\ModalField;

/**
 * The CategoryModalField class.
 *
 * @since  {DEPLOY_VERSION}
 */
class CategoryModalField extends ModalField
{
	/**
	 * Property table.
	 *
	 * @var  string
	 */
	protected $table = Table::CATEGORIES;

	/**
	 * Property view.
	 *
	 * @var  string
	 */
	protected $view = 'categories';

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
