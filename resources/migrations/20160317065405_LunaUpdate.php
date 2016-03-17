<?php
/**
 * Part of Windwalker project.
 *
 * @copyright  Copyright (C) 2014 - 2016 LYRASOFT. All rights reserved.
 * @license    GNU General Public License version 2 or later;
 */

use Lyrasoft\Luna\Table\LunaTable;
use Windwalker\Core\Migration\AbstractMigration;
use Windwalker\Core\Migration\Schema;
use Windwalker\Database\Schema\Column;
use Windwalker\Database\Schema\DataType;

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
		$this->getTable(LunaTable::CATEGORIES, function (Schema $sc)
		{
			$sc->addColumn('type', new Column\Varchar)->position('AFTER path');
		})->update();

		$this->db->getTable(LunaTable::CATEGORIES)->changeColumn('images', 'image');

		$this->getTable(LunaTable::ARTICLES, function (Schema $sc)
		{
			$sc->addColumn('short_title', new Column\Varchar)->position('AFTER alias');
			$sc->addColumn('url', new Column\Varchar)->position('AFTER short_title');
			$sc->addColumn('icon', new Column\Varchar)->position('AFTER url');
		})->update();
	}

	/**
	 * Migrate Down.
	 */
	public function down()
	{
		$this->getTable(LunaTable::CATEGORIES)->dropColumn('type')
			->changeColumn('image', 'images');

		$this->getTable(LunaTable::ARTICLES)->dropColumn('url')->dropColumn('icon');
	}
}
