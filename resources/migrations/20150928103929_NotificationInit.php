<?php
/**
 * Part of Windwalker project.
 *
 * @copyright  Copyright (C) 2014 - 2015 LYRASOFT. All rights reserved.
 * @license    GNU General Public License version 2 or later;
 */

use Admin\Table\Table;
use Windwalker\Core\Migration\AbstractMigration;
use Windwalker\Database\Schema\Column;
use Windwalker\Database\Schema\DataType;
use Windwalker\Database\Schema\Key;

/**
 * Migration class of NotificationInit.
 */
class NotificationInit extends AbstractMigration
{
	/**
	 * Migrate Up.
	 */
	public function up()
	{
		$this->db->getTable(Table::NOTIFICATIONS, true)
			->addColumn(new Column\Primary('id'))
			->addColumn(new Column\Integer('user_id'))
			->addColumn(new Column\Integer('topic_id'))
			->addColumn(new Column\Varchar('type'))
			->addColumn(new Column\Text('params'))
			->addIndex(Key::TYPE_INDEX, 'idx_notifications_user_id', 'user_id')
			->addIndex(Key::TYPE_INDEX, 'idx_notifications_topic_id', 'topic_id')
			->addIndex(Key::TYPE_INDEX, 'idx_notifications_type', 'type')
			->create(true);
	}

	/**
	 * Migrate Down.
	 */
	public function down()
	{
		$this->db->getTable(Table::NOTIFICATIONS, true)->drop(true);
	}
}
