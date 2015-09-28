<?php
/**
 * Part of phoenix project.
 *
 * @copyright  Copyright (C) 2015 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

namespace Admin\Controller\Posts;

use Phoenix\Controller\Batch\CopyController as PhoenixCopyController;

/**
 * The CopyController class.
 *
 * @since  {DEPLOY_VERSION}
 */
class CopyController extends PhoenixCopyController
{
	/**
	 * Property name.
	 *
	 * @var  string
	 */
	protected $name = 'posts';

	/**
	 * Property itemName.
	 *
	 * @var  string
	 */
	protected $itemName = 'post';

	/**
	 * Property listName.
	 *
	 * @var  string
	 */
	protected $listName = 'posts';
}
