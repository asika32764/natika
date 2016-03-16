<?php
/**
 * Part of Admin project.
 *
 * @copyright  Copyright (C) 2016 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

namespace Admin\Controller\Articles;

use Phoenix\Controller\Grid\AbstractFilterController;

/**
 * The FilterController class.
 * 
 * @since  1.0
 */
class FilterController extends AbstractFilterController
{
	/**
	 * Property name.
	 *
	 * @var  string
	 */
	protected $name = 'articles';

	/**
	 * Property itemName.
	 *
	 * @var  string
	 */
	protected $itemName = 'article';

	/**
	 * Property listName.
	 *
	 * @var  string
	 */
	protected $listName = 'articles';
}
