<?php
/**
 * Part of Windwalker project.
 *
 * @copyright  Copyright (C) 2014 - 2015 LYRASOFT. All rights reserved.
 * @license    GNU General Public License version 2 or later;
 */

use Admin\Table\Table;
use Lyrasoft\Luna\Table\LunaTable;
use Windwalker\Core\Migration\AbstractMigration;
use Windwalker\Database\Schema\Column;
use Windwalker\Database\Schema\DataType;
use Windwalker\Database\Schema\Key;

/**
 * Migration class of ArticleInit.
 */
class ArticleInit extends AbstractMigration
{
	/**
	 * Migrate Up.
	 */
	public function up()
	{
		$this->db->getTable(LunaTable::ARTICLES, true)
			->addColumn(new Column\Primary('id'))
			->addColumn(new Column\Varchar('title'))
			->addColumn(new Column\Varchar('alias'))
			->addColumn(new Column\Text('body'))
			->addColumn(new Column\Text('images'))
			->addColumn(new Column\Integer('version'))
			->addColumn(new Column\Datetime('created'))
			->addColumn(new Column\Integer('created_by'))
			->addColumn(new Column\Datetime('modified'))
			->addColumn(new Column\Integer('modified_by'))
			->addColumn(new Column\Integer('ordering'))
			->addColumn(new Column\Tinyint('state'))
			->addColumn(new Column\Text('params'))
			->addIndex(Key::TYPE_INDEX, 'idx_articles_alias', 'alias')
			->addIndex(Key::TYPE_INDEX, 'idx_articles_created_by', 'created_by')
			->create(true);
	}

	/**
	 * Migrate Down.
	 */
	public function down()
	{
		$this->db->getTable(LunaTable::ARTICLES, true)->drop(true);
	}
}
