<?php
/**
 * Part of Windwalker project.
 *
 * @copyright  Copyright (C) 2014 - 2015 LYRASOFT. All rights reserved.
 * @license    GNU Lesser General Public License version 3 or later.
 */

namespace Windwalker\User\Controller\Logout;

use Windwalker\Core\Authentication\User;
use Windwalker\Core\Controller\Controller;
use Windwalker\Core\Router\Router;
use Windwalker\User\Model\LoginModel;

/**
 * The SaveController class.
 * 
 * @since  2.1.1
 */
class SaveController extends Controller
{
	/**
	 * Execute the controller.
	 *
	 * @return  mixed Return executed result.
	 *
	 * @throws  \LogicException
	 * @throws  \RuntimeException
	 */
	public function doExecute()
	{
		$model = new LoginModel;
		$router = $this->package->getRouter();

		$user = User::get();

		if ($user->isNull())
		{
			$this->setRedirect($router->http('login', array(), Router::TYPE_FULL), 'Already logout', 'success');
		}

		$model->logout($user->username);

		$this->setRedirect($router->http('login', array(), Router::TYPE_FULL), 'Logout success', 'success');

		return true;
	}
}
 