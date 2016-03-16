<?php
/**
 * Part of phoenix project. 
 *
 * @copyright  Copyright (C) 2015 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

use Admin\DataMapper\PostMapper;
use Admin\DataMapper\TopicMapper;
use Admin\Table\Table;
use Faker\Factory;
use Windwalker\Core\DateTime\DateTime;
use Windwalker\Core\Seeder\AbstractSeeder;
use Windwalker\Data\Data;
use Windwalker\Warder\Admin\DataMapper\UserMapper;

/**
 * The PostSeeder class.
 * 
 * @since  {DEPLOY_VERSION}
 */
class PostSeeder extends AbstractSeeder
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
		$topics = (new TopicMapper)->findAll();
		$mapper = new PostMapper;

		foreach ($topics as $topic)
		{
			foreach (range(1, 10) as $i)
			{
				$data = new Data;

				$data['topic_id']    = $topic->id;
				$data['user_id']     = $i == 1 ? $topic->user_id : $faker->randomElement($users);
				$data['primary']     = $i == 1 ? 1 : 0;
				$data['body']        = $faker->paragraph(5);
				$data['version']     = rand(1, 50);
				$data['rating']      = rand(1, 5);
				$data['created']     = $faker->dateTime->format(DateTime::FORMAT_SQL);
				$data['created_by']  = rand(20, 100);
				$data['modified']    = $faker->dateTime->format(DateTime::FORMAT_SQL);
				$data['modified_by'] = rand(20, 100);
				$data['ordering']    = $i;
				$data['state']       = $faker->randomElement(array(1, 1, 1, 1, 0, 0));
				$data['params']      = '';

				$mapper->createOne($data);

				$this->command->out('.', false);
			}
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
		$this->db->getTable(Table::POSTS)->truncate();
	}
}
