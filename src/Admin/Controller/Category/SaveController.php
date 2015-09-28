<?php
/**
 * Part of phoenix project. 
 *
 * @copyright  Copyright (C) 2015 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

namespace Admin\Controller\Category;

use Phoenix\Controller\SaveController as PhoenixSaveController;

/**
 * The SaveController class.
 * 
 * @since  {DEPLOY_VERSION}
 */
class SaveController extends PhoenixSaveController
{
	/**
	 * Property name.
	 *
	 * @var  string
	 */
	protected $name = 'category';

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
