<?php
/**
 * Part of phoenix project.
 *
 * @copyright  Copyright (C) 2015 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

namespace Admin\Field\Article;

use Admin\Table\Table;
use Phoenix\Field\ModalField;

/**
 * The ArticleModalField class.
 *
 * @since  {DEPLOY_VERSION}
 */
class ArticleModalField extends ModalField
{
	/**
	 * Property table.
	 *
	 * @var  string
	 */
	protected $table = Table::ARTICLES;

	/**
	 * Property view.
	 *
	 * @var  string
	 */
	protected $view = 'articles';

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
