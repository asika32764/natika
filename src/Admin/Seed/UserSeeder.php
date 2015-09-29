<?php
/**
 * Part of phoenix project. 
 *
 * @copyright  Copyright (C) 2015 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

namespace Admin\Seed;

use Admin\DataMapper\UserMapper;
use Admin\Table\Table;
use Faker\Factory;
use Windwalker\Core\DateTime\DateTime;
use Windwalker\Core\Seeder\AbstractSeeder;
use Windwalker\Crypt\Password;
use Windwalker\Data\Data;
use Windwalker\Filter\OutputFilter;

/**
 * The UserSeeder class.
 * 
 * @since  {DEPLOY_VERSION}
 */
class UserSeeder extends AbstractSeeder
{
	/**
	 * doExecute
	 *
	 * @return  void
	 */
	public function doExecute()
	{
		$faker = Factory::create();

		$mapper = new UserMapper;

		foreach (range(1, 50) as $i)
		{
			$password = new Password;

			$data = array(
				'name'     => $faker->name,
				'username' => $faker->userName,
				'email'    => $faker->email,
				'password' => $password->create('1234'),
				'avatar'   => 'https://avatars.githubusercontent.com/u/' . rand(1000, 500000),
			);

			$mapper->createOne($data);

			$this->command->out('.', false);
		}

		$this->command->out();
	}

	/**
	 * doClean
	 *
	 * @return  void
	 */
	public function doClean()
	{
		$this->db->getTable(Table::USERS)->truncate();
	}
}
