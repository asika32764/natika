<?php
/**
 * Part of natika project.
 *
 * @copyright  Copyright (C) 2015 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

namespace Forum\Controller\Topic;

use Lyrasoft\Luna\Admin\DataMapper\CategoryMapper;
use Phoenix\Controller\Display\EditDisplayController;
use Windwalker\Data\Data;

/**
 * The NewController class.
 *
 * @since  {DEPLOY_VERSION}
 */
class NewController extends EditDisplayController
{
	/**
	 * Property layout.
	 *
	 * @var  string
	 */
	protected $layout = 'edit';

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
		$this->view['post'] = new Data($this->getUserState($this->getContext('edit.data')));
	}
}
