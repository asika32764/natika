<?php
/**
 * Part of Windwalker project.
 *
 * @copyright  Copyright (C) 2014 - 2015 LYRASOFT. All rights reserved.
 * @license    GNU Lesser General Public License version 3 or later.
 */

use Windwalker\Core\Migration\AbstractMigration;
use Windwalker\Database\Schema\Column;
use Windwalker\Database\Schema\DataType;

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
		$db = $this->db;

		$db->getTable('users', true)
			->addColumn('id',          DataType::INTEGER,  Column::UNSIGNED, Column::NOT_NULL, null, 'Primary Key', ['primary' => true])
			->addColumn('username',    DataType::VARCHAR,  Column::SIGNED,   Column::NOT_NULL, null, 'Username')
			->addColumn('email',       DataType::VARCHAR,  Column::SIGNED,   Column::NOT_NULL, null, 'Email')
			->addColumn('password',    DataType::VARCHAR,  Column::SIGNED,   Column::NOT_NULL, null, 'Password')
			->addColumn('group',       DataType::INTEGER,  Column::UNSIGNED, Column::NOT_NULL, null, 'Group')
			->addColumn('activation',  DataType::VARCHAR,  Column::SIGNED,   Column::NOT_NULL, null, 'Activated')
			->addColumn('reset_token', DataType::VARCHAR,  Column::SIGNED,   Column::NOT_NULL, null, 'Reset Password Token')
			->addColumn('reset_last',  DataType::DATETIME, Column::SIGNED,   Column::ALLOW_NULL, null, 'Reset Password Time')
			->addColumn('params',      DataType::TEXT,     Column::SIGNED,   Column::ALLOW_NULL, null, 'Params')
			->create();

		$db->getTable('products', true)
			->addColumn('id',          DataType::INTEGER, Column::UNSIGNED, Column::NOT_NULL, null, 'Primary Key', ['primary' => true])
			->addColumn('title',       DataType::VARCHAR, Column::SIGNED,   Column::NOT_NULL, null, 'Title')
			->addColumn('description', DataType::VARCHAR, Column::SIGNED,   Column::NOT_NULL, null, 'Description')
			->addColumn('author',      DataType::INTEGER, Column::UNSIGNED, Column::NOT_NULL, null, 'Author')
			->addColumn('views',       DataType::INTEGER, Column::UNSIGNED, Column::NOT_NULL, 0, 'View')
			->addColumn('downloads',   DataType::INTEGER, Column::UNSIGNED, Column::NOT_NULL, 0, 'Downloads')
			->create();
	}

	/**
	 * Migrate Down.
	 */
	public function down()
	{
		$this->db->getTable('users')->drop();
		$this->db->getTable('products')->drop();
	}
}
