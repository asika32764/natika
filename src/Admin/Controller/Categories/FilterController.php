<?php
/**
 * Part of phoenix project. 
 *
 * @copyright  Copyright (C) 2015 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

namespace Admin\Controller\Categories;

use Phoenix\Controller\Grid\FilterController as PhoenixFilterController;

/**
 * The FilterController class.
 * 
 * @since  {DEPLOY_VERSION}
 */
class FilterController extends PhoenixFilterController
{
	/**
	 * Property name.
	 *
	 * @var  string
	 */
	protected $name = 'categories';

	/**
	 * Property itemName.
	 *
	 * @var  string
	 */
	protected $itemName = 'category';

	/**
	 * Property listName.
	 *
	 * @var  string
	 */
	protected $listName = 'categories';
}
