<?php
/**
 * Part of natika project.
 *
 * @copyright  Copyright (C) 2015 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

namespace Forum\Controller\Post;

use Phoenix\Controller\Display\EditDisplayController;
use Windwalker\Core\View\PhpHtmlView;

/**
 * The EditController class.
 *
 * @since  {DEPLOY_VERSION}
 */
class EditController extends EditDisplayController
{
	/**
	 * assignModels
	 *
	 * @param PhpHtmlView $view
	 *
	 * @return  void
	 */
	protected function assignModels(PhpHtmlView $view)
	{
		$this->view->setModel($this->getModel('Topic'));
		$this->view->setModel($this->getModel('Category'));
	}
}
