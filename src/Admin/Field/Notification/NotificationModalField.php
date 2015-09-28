<?php
/**
 * Part of phoenix project.
 *
 * @copyright  Copyright (C) 2015 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

namespace Admin\Field\Notification;

use Admin\Table\Table;
use Phoenix\Field\ModalField;

/**
 * The NotificationModalField class.
 *
 * @since  {DEPLOY_VERSION}
 */
class NotificationModalField extends ModalField
{
	/**
	 * Property table.
	 *
	 * @var  string
	 */
	protected $table = Table::NOTIFICATIONS;

	/**
	 * Property view.
	 *
	 * @var  string
	 */
	protected $view = 'notifications';

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
