<?php
/**
 * Part of natika project.
 *
 * @copyright  Copyright (C) 2015 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

namespace Forum\Controller\Post;

/**
 * The DeleteController class.
 *
 * @since  {DEPLOY_VERSION}
 */
class DeleteController extends \Phoenix\Controller\Batch\DeleteController
{
	protected function prepareExecute()
	{
		parent::prepareExecute();

		$this->pks = (array) $this->input->get('id');
	}
}
