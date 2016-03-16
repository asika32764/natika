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
 * Migration class of TopicInit.
 */
class TopicInit extends AbstractMigration
{
	/**
	 * Migrate Up.
	 */
	public function up()
	{
		$this->db->getTable(Table::TOPICS, true)
			->addColumn(new Column\Primary('id'))
			->addColumn(new Column\Integer('category_id'))
			->addColumn(new Column\Integer('user_id'))
			->addColumn(new Column\Integer('last_reply_user'))
			->addColumn(new Column\Integer('last_reply_post'))
			->addColumn(new Column\Datetime('last_reply_date'))
			->addColumn(new Column\Varchar('title'))
			->addColumn(new Column\Text('images'))
			->addColumn(new Column\Integer('version'))
			->addColumn(new Column\Integer('replies'))
			->addColumn(new Column\Integer('hits'))
			->addColumn(new Column\Integer('favorites'))
			->addColumn(new Column\Integer('rating'))
			->addColumn(new Column\Datetime('created'))
			->addColumn(new Column\Integer('created_by'))
			->addColumn(new Column\Datetime('modified'))
			->addColumn(new Column\Integer('modified_by'))
			->addColumn(new Column\Integer('ordering'))
			->addColumn(new Column\Tinyint('state'))
			->addColumn(new Column\Text('params'))
			->addIndex(Key::TYPE_INDEX, 'idx_topics_user_id', 'user_id')
			->addIndex(Key::TYPE_INDEX, 'idx_topics_last_reply_user', 'last_reply_user')
			->addIndex(Key::TYPE_INDEX, 'idx_topics_last_reply_post', 'last_reply_post')
			->addIndex(Key::TYPE_INDEX, 'idx_topics_created_by', 'created_by')
			->create(true);
	}

	/**
	 * Migrate Down.
	 */
	public function down()
	{
		$this->db->getTable(Table::TOPICS, true)->drop(true);
	}
}
