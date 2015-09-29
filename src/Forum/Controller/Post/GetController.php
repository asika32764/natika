<?php
/**
 * Part of natika project.
 *
 * @copyright  Copyright (C) 2015 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

namespace Forum\Controller\Post;

use Admin\DataMapper\CategoryMapper;
use Phoenix\Controller\Display\EditGetController;

/**
 * The GetController class.
 *
 * @since  {DEPLOY_VERSION}
 */
class GetController extends EditGetController
{
	/**
	 * prepareExecute
	 *
	 * @return  void
	 */
	protected function prepareExecute()
	{
		parent::prepareExecute();

		$catId = $this->input->get('category');

		$this->view['category'] = (new CategoryMapper)->findOne($catId);
	}
}
