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

		$return = $this->input->getString('return');

		if (!$return)
		{
			$return = $this->router->http('home');
		}
		else
		{
			$return = base64_decode($return);
		}

		$this->setRedirect($return, 'Logout success');

		return true;
	}
}
