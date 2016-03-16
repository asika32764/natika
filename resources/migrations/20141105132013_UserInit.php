<?php
/**
 * Part of Windwalker project.
 *
 * @copyright  Copyright (C) 2014 - 2015 LYRASOFT. All rights reserved.
 * @license    GNU Lesser General Public License version 3 or later.
 */

use Windwalker\Core\Migration\AbstractMigration;
use Windwalker\Core\Migration\Schema;
use Windwalker\Database\Schema\Column;
use Windwalker\Database\Schema\Key;
use Windwalker\Warder\Table\WarderTable;

/**
 * Migration class, version: 20141105132013
 */
class UserInit extends AbstractMigration
{
	/**
	 * Migrate Up.
	 */
	public function up()
	{
		$this->getTable(WarderTable::USERS, function (Schema $sc)
		{
			$sc->addColumn('id',         new Column\Primary)->comment('Primary Key');
			$sc->addColumn('name',       new Column\Varchar)->comment('Full Name');
			$sc->addColumn('username',   new Column\Varchar)->comment('Login name');
			$sc->addColumn('email',      new Column\Varchar)->comment('Email');
			$sc->addColumn('password',   new Column\Varchar)->comment('Password');
			$sc->addColumn('avatar',     new Column\Varchar)->comment('Avatar');
			$sc->addColumn('group',      new Column\Varchar)->comment('Group');
			$sc->addColumn('blocked',    new Column\Tinyint)->comment('0: normal, 1: blocked');
			$sc->addColumn('activation', new Column\Varchar)->comment('Activation code.');
			$sc->addColumn('reset_token', new Column\Varchar)->comment('Reset Token');
			$sc->addColumn('last_reset', new Column\Datetime)->comment('Last Reset Time');
			$sc->addColumn('last_login', new Column\Datetime)->comment('Last Login Time');
			$sc->addColumn('registered', new Column\Datetime)->comment('Register Time');
			$sc->addColumn('modified',   new Column\Datetime)->comment('Modified Time');
			$sc->addColumn('params',     new Column\Varchar)->comment('Params');

			$sc->addIndex(Key::TYPE_INDEX, 'idx_users_name', 'id');
			$sc->addIndex(Key::TYPE_INDEX, 'idx_users_username', 'username');
			$sc->addIndex(Key::TYPE_INDEX, 'idx_users_email', 'email');
		})->create(true);

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
		$this->db->getTable(WarderTable::USERS)->drop();
	}
}
