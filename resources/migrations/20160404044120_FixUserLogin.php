<?php
/**
 * Part of Windwalker project.
 *
 * @copyright  Copyright (C) 2014 - 2016 LYRASOFT. All rights reserved.
 * @license    GNU General Public License version 2 or later;
 */

use Windwalker\Core\Migration\AbstractMigration;
use Windwalker\Core\Migration\Schema;
use Windwalker\Database\Schema\Column;
use Windwalker\Database\Schema\DataType;
use Windwalker\Database\Schema\Key;
use Windwalker\Warder\Table\WarderTable;

/**
 * Migration class, version: 20160404044120
 */
class FixUserLogin extends AbstractMigration
{
	/**
	 * Migrate Up.
	 */
	public function up()
	{
		$this->getTable(WarderTable::USERS, function (Schema $sc)
		{
			$sc->addColumn('blocked',    new Column\Tinyint)->comment('0: normal, 1: blocked');
			$sc->addColumn('last_login', new Column\Datetime)->comment('Last Login Time');
			$sc->addColumn('registered', new Column\Datetime)->comment('Register Time');
			$sc->addColumn('modified',   new Column\Datetime)->comment('Modified Time');
		})->update()
			->changeColumn('reset_last', 'last_reset', DataType::DATETIME, Column::SIGNED, Column::ALLOW_NULL, null, 'Reset Password Time');

		$this->getTable(WarderTable::USER_SOCIALS, function (Schema $sc)
		{
			$sc->addColumn('user_id',    new Column\Integer)->comment('User ID');
			$sc->addColumn('identifier', new Column\Varchar)->comment('User identifier name');
			$sc->addColumn('provider',   new Column\Char)->length(15)->comment('Social provider');

			$sc->addIndex(Key::TYPE_INDEX, 'user_socials_user_id', 'user_id');
			$sc->addIndex(Key::TYPE_INDEX, 'user_socials_identifier', 'identifier');
		})->create(true);
	}

	/**
	 * Migrate Down.
	 */
	public function down()
	{
		$this->getTable(WarderTable::USERS)
			->dropColumn('blocked')
			->dropColumn('reset_token')
			->dropColumn('last_login')
			->dropColumn('registered')
			->dropColumn('modified')
			->changeColumn('last_reset', 'reset_last', DataType::DATETIME, Column::SIGNED, Column::ALLOW_NULL, null, 'Reset Password Time');

		$this->drop(WarderTable::USER_SOCIALS);
	}
}
