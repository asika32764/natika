<?php
/**
 * Part of phoenix project. 
 *
 * @copyright  Copyright (C) 2015 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

namespace Admin\Controller\Categories;

use Phoenix\Controller\Display\ListDisplayController;

/**
 * The GetController class.
 * 
 * @since  {DEPLOY_VERSION}
 */
class GetController extends ListDisplayController
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
