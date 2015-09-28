<?php
/**
 * Part of phoenix project. 
 *
 * @copyright  Copyright (C) 2015 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

namespace Admin\Seed;

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
		$this->execute(new UserSeeder);

		$this->execute(new CategorySeeder);

		$this->execute(new TopicSeeder);

		$this->execute(new PostSeeder);

		$this->execute(new ArticleSeeder);

		// @muse-placeholder  seeder-execute  Do not remove this.
	}

	/**
	 * doClean
	 *
	 * @return  void
	 */
	public function doClean()
	{
		$this->clean(new CategorySeeder);

		$this->clean(new TopicSeeder);

		$this->clean(new PostSeeder);

		$this->clean(new ArticleSeeder);

		$this->clean(new UserSeeder);

		// @muse-placeholder  seeder-clean  Do not remove this.
	}
}
