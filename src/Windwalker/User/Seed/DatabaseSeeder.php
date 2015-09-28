<?php
/**
 * Part of Windwalker project.
 *
 * @copyright  Copyright (C) 2014 - 2015 LYRASOFT. All rights reserved.
 * @license    GNU Lesser General Public License version 3 or later.
 */

namespace Windwalker\User\Seed;

use Windwalker\Core\Seeder\AbstractSeeder;
use Windwalker\Crypt\Password;
use Windwalker\DataMapper\DataMapper;

/**
 * The UserSeeder class.
 *
 * @since  2.1.1
 */
class DatabaseSeeder extends AbstractSeeder
{
	/**
	 * doExecute
	 *
	 * @return  void
	 */
	public function doExecute()
	{
		$faker = \Faker\Factory::create();

		$password = new Password;

		$userMapper = new DataMapper('users');

		foreach (range(1, 10) as $i)
		{
			$data = array(
				'username' => $faker->userName,
				'email' => $faker->email,
				'password' => $password->create('1234'),
			);

			$userMapper->createOne($data);
		}
	}
}
