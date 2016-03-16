<?php
/**
 * Part of Admin project.
 *
 * @copyright  Copyright (C) 2016 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

namespace Admin\Controller\Topics;

use Phoenix\Controller\Batch\AbstractDeleteController;

/**
 * The DeleteController class.
 *
 * @since  1.0
 */
class DeleteController extends AbstractDeleteController
{
	/**
	 * Property name.
	 *
	 * @var  string
	 */
	protected $name = 'topics';

	/**
	 * Property itemName.
	 *
	 * @var  string
	 */
	protected $itemName = 'topic';

	/**
	 * Property listName.
	 *
	 * @var  string
	 */
	protected $listName = 'topics';
}
