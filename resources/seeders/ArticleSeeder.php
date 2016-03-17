<?php
/**
 * Part of phoenix project. 
 *
 * @copyright  Copyright (C) 2015 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

use Admin\Table\Table;
use Faker\Factory;
use Lyrasoft\Luna\Admin\DataMapper\ArticleMapper;
use Lyrasoft\Luna\Table\LunaTable;
use Windwalker\Core\DateTime\DateTime;
use Windwalker\Core\Seeder\AbstractSeeder;
use Windwalker\Data\Data;
use Windwalker\Filter\OutputFilter;
use Windwalker\Warder\Admin\DataMapper\UserMapper;

/**
 * The ArticleSeeder class.
 * 
 * @since  {DEPLOY_VERSION}
 */
class ArticleSeeder extends AbstractSeeder
{
	/**
	 * Property icons.
	 *
	 * @var  array
	 */
	protected $icons = array(
		'fa fa-fw fa-bullhorn',
		'fa fa-fw fa-comment',
		'fa fa-fw fa-github',
		'fa fa-fw fa-wrench',
		'fa fa-fw fa-magic',
		'fa fa-fw fa-fire',
		'fa fa-fw fa-warning'
	);

	/**
	 * doExecute
	 *
	 * @return  void
	 */
	public function doExecute()
	{
		$faker = Factory::create();

		$users = (new UserMapper)->findColumn('id');
		$mapper = new ArticleMapper;

		foreach (range(1, 5) as $i)
		{
			$data = new Data;

			$data['title']       = $faker->sentence(rand(3, 5));
			$data['alias']       = OutputFilter::stringURLSafe($data['title']);
			$data['short_title'] = trim(\Windwalker\String\Utf8String::substr($data['title'], 0, rand(5, 7)));
			$data['icon']        = $faker->randomElement($this->icons);
			$data['url']         = rand(0, 2) ? 'http://windwalker.io' : null;
			$data['body']        = $faker->paragraph(5);
			$data['images']      = $faker->imageUrl();
			$data['version']     = rand(1, 50);
			$data['created']     = $faker->dateTime->format(DateTime::FORMAT_SQL);
			$data['created_by']  = $faker->randomElement($users);
			$data['modified']    = $faker->dateTime->format(DateTime::FORMAT_SQL);
			$data['modified_by'] = $faker->randomElement($users);
			$data['ordering']    = $i;
			$data['state']       = 1; //$faker->randomElement(array(1, 1, 1, 1, 0, 0));
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
		$this->db->getTable(LunaTable::ARTICLES)->truncate();
	}
}
