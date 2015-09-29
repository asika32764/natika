<?php
/**
 * Part of natika project.
 *
 * @copyright  Copyright (C) 2015 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

namespace Forum\Controller\User;

use Phoenix\Controller\AbstractPhoenixController;
use Windwalker\Core\Authentication\User;

/**
 * The LogoutController class.
 *
 * @since  {DEPLOY_VERSION}
 */
class LogoutController extends AbstractPhoenixController
{
	/**
	 * doExecute
	 *
	 * @return  mixed
	 */
	protected function doExecute()
	{
		User::logout(array());

		$this->setRedirect($this->router->http('home'), 'Logout success');

		return true;
	}
}
