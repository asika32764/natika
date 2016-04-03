<?php
/**
 * Part of phoenix project. 
 *
 * @copyright  Copyright (C) 2015 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

use Admin\Record\CategoryRecord;
use Admin\Table\Table;
use Faker\Factory;
use Lyrasoft\Luna\Table\LunaTable;
use Windwalker\Core\DateTime\DateTime;
use Windwalker\Core\Seeder\AbstractSeeder;
use Windwalker\Data\Data;
use Windwalker\Filter\OutputFilter;
use Windwalker\Warder\Admin\DataMapper\UserMapper;

/**
 * The CategorySeeder class.
 * 
 * @since  {DEPLOY_VERSION}
 */
class CategorySeeder extends AbstractSeeder
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
	 * Property colors.
	 *
	 * @var  array
	 */
	protected $colors = array(
		'#68A8D4',
		'#F0DB4F',
		'#6C7EB7',
		'#EB5745',
		'#FC7362',
		'#106EAD',
		'#FFAB37',
		'#AACA3C',
		'#358BC6',
		'#BCDB79',
		'#BFA3CF',
		'#333333',
		'#FF705E',
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

		CategoryRecord::resetFieldsCache();
		$record = new CategoryRecord;

		$ids = array();

		foreach (range(1, 30) as $i)
		{
			$record->reset();

			$data = new Data;

			$data['title']       = $faker->sentence(rand(1, 3));
			$data['alias']       = OutputFilter::stringURLSafe($data['title']);
			$data['type']        = 'topic';
			$data['description'] = $faker->sentence(5);
			$data['image']       = $faker->imageUrl();
			$data['version']     = rand(1, 50);
			$data['topics']      = rand(10, 100);
			$data['posts']       = rand(10, 100);
			$data['created']     = $faker->dateTime->format(DateTime::FORMAT_SQL);
			$data['created_by']  = $faker->randomElement($users);
			$data['modified']    = $faker->dateTime->format(DateTime::FORMAT_SQL);
			$data['modified_by'] = $faker->randomElement($users);
			$data['state']       = $faker->randomElement(array(1, 1, 1, 1, 0, 0));

			// Color Image
			$params = array(
				'bg_color' => $faker->randomElement($this->colors),
				'image_icon' => $faker->randomElement($this->icons)
			);

			$data['params'] = json_encode($params);

			$record->bind($data->dump());

			if ($i > 6)
			{
				$record->setLocation($faker->randomElement($ids), $record::LOCATION_LAST_CHILD);
			}
			else
			{
				$record->setLocation(1, $record::LOCATION_LAST_CHILD);
			}

			$record->store();
			$record->rebuildPath();

			$ids[] = $record->id;

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
		$this->db->getTable(LunaTable::CATEGORIES)->truncate();

		$record = new CategoryRecord;
		$record->createRoot();
	}
}
