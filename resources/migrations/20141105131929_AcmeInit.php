<?php
/**
 * Part of Windwalker project.
 *
 * @copyright  Copyright (C) 2014 {ORGANIZATION}. All rights reserved.
 * @license    GNU Lesser General Public License version 3 or later.
 */

use Windwalker\Core\Migration\AbstractMigration;
use Windwalker\Database\Schema\Column\Integer;
use Windwalker\Database\Schema\Column\Primary;
use Windwalker\Database\Schema\Column\Text;

/**
 * Migration class, version: 20141105131929
 */
class AcmeInit extends AbstractMigration
{
	/**
	 * Migrate Up.
	 */
	public function up()
	{
		$this->db->getTable('acme_cover', true)
			->addColumn(new Primary('id'))
			->addColumn(new Text('text'))
			->addColumn(new Integer('state'))
			->create();
	}

	/**
	 * Migrate Down.
	 */
	public function down()
	{
		$this->db->getTable('acme_cover')
			->drop();
	}
}
