<?php
/**
 * Part of Windwalker project.
 *
 * @copyright  Copyright (C) 2014 - 2015 LYRASOFT. All rights reserved.
 * @license    GNU Lesser General Public License version 3 or later.
 */

namespace Windwalker\User\Controller\Login;

use Windwalker\Core\Controller\Controller;
use Windwalker\Core\Language\Translator;
use Windwalker\Core\Router\RestfulRouter;
use Windwalker\Core\Router\Router;
use Windwalker\Core\View\BladeHtmlView;
use Windwalker\Data\Data;
use Windwalker\IO\Input;
use Windwalker\Ioc;
use Windwalker\Uri\Uri;
use Windwalker\User\Model\LoginModel;
use Windwalker\User\View\Login\LoginHtmlView;

/**
 * The GetController class.
 * 
 * @since  2.1.1
 */
class LoginController extends Controller
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

		$user = $this->input->getVar('user');

		$user = new Data($user);

		$result = $model->login($user['username'], $user['password'], $user['remember']);

		$package = $this->getPackage();

		if ($result)
		{
			$url = $package->get('redirect.login');

			$msg = Translator::translate('windwalker.user.login.success');
		}
		else
		{
			$router = $this->package->getRouter();

			$url = $router->http('login', array(), RestfulRouter::TYPE_FULL);

			$msg = Translator::translate('windwalker.user.login.fail');
		}

		$uri = new Uri($url);

		if (!$uri->getScheme())
		{
			$url = $this->app->get('uri.base.full') . $url;
		}

		$this->setRedirect($url, $msg);

		return true;
	}
}
 