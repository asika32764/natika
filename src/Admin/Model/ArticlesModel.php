<?php
/**
 * Part of natika project.
 *
 * @copyright  Copyright (C) 2016 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

namespace Admin\Model;

use Lyrasoft\Luna\Table\LunaTable;
use Windwalker\Warder\Table\WarderTable;

/**
 * The ArticlesModel class.
 *
 * @since  {DEPLOY_VERSION}
 */
class ArticlesModel extends \Lyrasoft\Luna\Admin\Model\ArticlesModel
{
	/**
	 * configureTables
	 *
	 * @return  void
	 */
	protected function configureTables()
	{
		$this->addTable('article', LunaTable::ARTICLES)
			->addTable('user', WarderTable::USERS, 'user.id = article.created_by');
	}
}
