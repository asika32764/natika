<?php
/**
 * Part of Windwalker project.
 *
 * @copyright  Copyright (C) 2014 {ORGANIZATION}. All rights reserved.
 * @license    GNU Lesser General Public License version 3 or later.
 */

use Windwalker\Core\Seeder\AbstractSeeder;

/**
 * The DatabaseSeeder class.
 * 
 * @since  {DEPLOY_VERSION}
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
		// This is example seeder, you can delete it.
		with(new \Windwalker\DataMapper\DataMapper('acme_cover'))->createOne(array(
			'text' => 'Hello World',
			'state' => 1
		));
		// Example seeder end.

		$this->command->out('Seeder executed.')->out();
	}

	/**
	 * doClean
	 *
	 * @return  void
	 */
	public function doClean()
	{
		$this->command->out('Database clean.')->out();
	}
}
 