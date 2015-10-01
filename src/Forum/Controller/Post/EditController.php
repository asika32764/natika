<?php
/**
 * Part of natika project.
 *
 * @copyright  Copyright (C) 2015 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

namespace Forum\Controller\Post;

use Phoenix\Controller\Display\EditGetController;
use Windwalker\Core\View\HtmlView;

/**
 * The EditController class.
 *
 * @since  {DEPLOY_VERSION}
 */
class EditController extends EditGetController
{
	/**
	 * assignModels
	 *
	 * @param HtmlView $view
	 *
	 * @return  void
	 */
	protected function assignModels(HtmlView $view)
	{
		$this->view->setModel($this->getModel('Topic'));
		$this->view->setModel($this->getModel('Category'));
	}
}
