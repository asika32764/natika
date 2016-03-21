<?php
/**
 * Part of Windwalker project.
 *
 * @copyright  Copyright (C) 2014 - 2016 LYRASOFT. All rights reserved.
 * @license    GNU General Public License version 2 or later;
 */

use Admin\Table\Table;
use Lyrasoft\Luna\Table\LunaTable;
use Windwalker\Core\Migration\AbstractMigration;
use Windwalker\Core\Migration\Schema;
use Windwalker\Database\Schema\Column;
use Windwalker\Database\Schema\DataType;
use Windwalker\Database\Schema\Key;

/**
 * Migration class, version: 20160317065405
 */
class LunaUpdate extends AbstractMigration
{
	/**
	 * Migrate Up.
	 */
	public function up()
	{
		$this->updateTable(LunaTable::CATEGORIES, function (Schema $schema)
		{
			$schema->varchar('type')->position('AFTER path');
		})->changeColumn('images', 'image');

		$this->updateTable(LunaTable::ARTICLES, function (Schema $schema)
		{
			$schema->varchar('short_title')->position('AFTER alias');
			$schema->varchar('url')->position('AFTER short_title');
			$schema->varchar('icon')->position('AFTER url');
		});

		$this->getTable(Table::NOTIFICATIONS)
			->dropIndex('idx_notifications_topic_id')
			->changeColumn('topic_id', 'target_id', DataType::INTEGER, false, false, 0)
			->addIndex(Key::TYPE_INDEX, 'idx_notifications_target_id', 'target_id')
			->update();

		$mapper = new \Lyrasoft\Luna\Admin\DataMapper\ArticleMapper;

		$data = array(
			'title' => 'Support',
			'url'   => 'http://natika.windwalker.io',
			'alias' => 'support',
			'state' => 1,
			'icon'  => 'fa fa-home'
		);

		$mapper->createOne($data);

		$data = array(
			'title' => 'Source Code',
			'url'   => 'https://github.com/asika32764/natika',
			'alias' => 'source-code',
			'state' => 1,
			'icon'  => 'fa fa-github'
		);

		$mapper->createOne($data);
	}

	/**
	 * Migrate Down.
	 */
	public function down()
	{
		$this->getTable(LunaTable::CATEGORIES)
			->dropColumn('type')
			->changeColumn('image', 'images');

		$this->getTable(LunaTable::ARTICLES)
			->dropColumn('short_title')
			->dropColumn('url')
			->dropColumn('icon');
	}
}
