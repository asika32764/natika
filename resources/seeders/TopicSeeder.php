<?php
/**
 * Part of phoenix project. 
 *
 * @copyright  Copyright (C) 2015 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

use Admin\DataMapper\TopicMapper;
use Admin\Table\Table;
use Faker\Factory;
use Lyrasoft\Luna\Admin\DataMapper\CategoryMapper;
use Windwalker\Core\DateTime\DateTime;
use Windwalker\Core\Seeder\AbstractSeeder;
use Windwalker\Data\Data;
use Windwalker\Warder\Admin\DataMapper\UserMapper;

/**
 * The TopicSeeder class.
 * 
 * @since  {DEPLOY_VERSION}
 */
class TopicSeeder extends AbstractSeeder
{
	/**
	 * doExecute
	 *
	 * @return  void
	 */
	public function doExecute()
	{
		$faker = Factory::create();

		$users = (new UserMapper)->findColumn('id');
		$categories = (new CategoryMapper)->findColumn('id', array('id > 1'));
		$mapper = new TopicMapper;

		foreach (range(1, 300) as $i)
		{
			$data = new Data;

			$data['title']       = $faker->sentence(rand(3, 5));
			$data['category_id'] = $faker->randomElement($categories);
			$data['user_id']     = $faker->randomElement($users);
			$data['last_reply_user'] = $faker->randomElement($users);
			$data['last_reply_post'] = rand(1, 150);
			$data['last_reply_date'] = $faker->dateTime->format(DateTime::FORMAT_SQL);
//			$data['body']        = $faker->paragraph(5);
			$data['images']      = $faker->imageUrl();
			$data['version']     = rand(1, 50);
			$data['replies']     = rand(1, 50);
			$data['hits']        = rand(1, 600);
			$data['favorites']   = rand(1, 50);
			$data['rating']      = rand(1, 5);
			$data['created']     = $faker->dateTime->format(DateTime::FORMAT_SQL);
			$data['created_by']  = $faker->randomElement($users);
			$data['modified']    = $faker->dateTime->format(DateTime::FORMAT_SQL);
			$data['modified_by'] = $faker->randomElement($users);
			$data['ordering']    = $i;
			$data['state']       = $faker->randomElement(array(1, 1, 1, 1, 0, 0));
			$data['params']      = '';

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
		$this->db->getTable(Table::TOPICS)->truncate();
	}
}
