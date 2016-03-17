<?php
/**
 * Part of Windwalker project.
 *
 * @copyright  Copyright (C) 2014 - 2015 LYRASOFT. All rights reserved.
 * @license    GNU General Public License version 2 or later;
 */

use Admin\Table\Table;
use Lyrasoft\Luna\Admin\Record\CategoryRecord;
use Lyrasoft\Luna\Table\LunaTable;
use Windwalker\Core\Migration\AbstractMigration;
use Windwalker\Database\Schema\Column;
use Windwalker\Database\Schema\DataType;
use Windwalker\Database\Schema\Key;

/**
 * Migration class of CategoryInit.
 */
class CategoryInit extends AbstractMigration
{
	/**
	 * Migrate Up.
	 */
	public function up()
	{
		$this->db->getTable(LunaTable::CATEGORIES, true)
			->addColumn(new Column\Primary('id'))
			->addColumn(new Column\Integer('parent_id'))
			->addColumn(new Column\Integer('level'))
			->addColumn(new Column\Integer('lft'))
			->addColumn(new Column\Integer('rgt'))
			->addColumn(new Column\Varchar('path'))
			->addColumn(new Column\Varchar('title'))
			->addColumn(new Column\Varchar('alias'))
			->addColumn(new Column\Text('description'))
			->addColumn(new Column\Text('images'))
			->addColumn(new Column\Integer('version'))
			->addColumn(new Column\Integer('topics'))
			->addColumn(new Column\Integer('posts'))
			->addColumn(new Column\Datetime('created'))
			->addColumn(new Column\Integer('created_by'))
			->addColumn(new Column\Datetime('modified'))
			->addColumn(new Column\Integer('modified_by'))
			->addColumn(new Column\Tinyint('state'))
			->addColumn(new Column\Integer('access'))
			->addColumn(new Column\Text('params'))
			->addIndex(Key::TYPE_INDEX, 'idx_categories_parent_id', 'parent_id')
			->addIndex(Key::TYPE_INDEX, 'idx_categories_level', 'level')
			->addIndex(Key::TYPE_INDEX, 'idx_categories_lft_rgt', array('lft', 'rgt'))
			->addIndex(Key::TYPE_INDEX, 'idx_categories_alias', 'alias')
			->addIndex(Key::TYPE_INDEX, 'idx_categories_created_by', 'created_by')
			->create(true);

		$record = new CategoryRecord;
		$record->createRoot();
	}

	/**
	 * Migrate Down.
	 */
	public function down()
	{
		$this->db->getTable(LunaTable::CATEGORIES, true)->drop(true);
	}
}
