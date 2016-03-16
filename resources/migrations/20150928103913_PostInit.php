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
 * Migration class of PostInit.
 */
class PostInit extends AbstractMigration
{
	/**
	 * Migrate Up.
	 */
	public function up()
	{
		$this->db->getTable(Table::POSTS, true)
			->addColumn(new Column\Primary('id'))
			->addColumn(new Column\Integer('topic_id'))
			->addColumn(new Column\Integer('user_id'))
			->addColumn(new Column\Tinyint('primary'))
			->addColumn(new Column\Text('body'))
			->addColumn(new Column\Integer('version'))
			->addColumn(new Column\Integer('rating'))
			->addColumn(new Column\Datetime('created'))
			->addColumn(new Column\Integer('created_by'))
			->addColumn(new Column\Datetime('modified'))
			->addColumn(new Column\Integer('modified_by'))
			->addColumn(new Column\Integer('ordering'))
			->addColumn(new Column\Tinyint('state'))
			->addColumn(new Column\Text('params'))
			->addIndex(Key::TYPE_INDEX, 'idx_posts_topic_id', 'topic_id')
			->addIndex(Key::TYPE_INDEX, 'idx_posts_user_id', 'user_id')
			->addIndex(Key::TYPE_INDEX, 'idx_posts_created_by', 'created_by')
			->create(true);
	}

	/**
	 * Migrate Down.
	 */
	public function down()
	{
		$this->db->getTable(Table::POSTS, true)->drop(true);
	}
}
