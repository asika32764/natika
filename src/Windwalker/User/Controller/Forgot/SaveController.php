<?php
/**
 * Part of Windwalker project.
 *
 * @copyright  Copyright (C) 2014 - 2015 LYRASOFT. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

namespace Windwalker\User\Controller\Forgot;

use Windwalker\Core\Authentication\User;
use Windwalker\Core\Controller\Controller;
use Windwalker\Core\DateTime\DateTime;
use Windwalker\Core\Language\Translator;
use Windwalker\Core\Router\Router;
use Windwalker\Crypt\CryptHelper;
use Windwalker\Crypt\Password;

/**
 * The SaveController class.
 * 
 * @since  2.1.1
 */
class SaveController extends Controller
{
	/**
	 * doExecute
	 *
	 * @return mixed
	 * @throws \Exception
	 */
	protected function doExecute()
	{
		return $this->delegate($this->input->get('task', 'request'));
	}

	/**
	 * request
	 *
	 * @return  bool
	 *
	 * @throws \Exception
	 */
	protected function request()
	{
		$email = $this->input->getEmail('email');

		if (!$email)
		{
			$this->setRedirect($this->router->http('forgot'), Translator::translate('windwalker.user.no.email'));

			return false;
		}

		$view = $this->getView();

		$token = md5($this->app->get('secret') . uniqid() . CryptHelper::genRandomBytes());
		$link  = $this->router->http('forgot', array('task' => 'confirm', 'token' => $token), Router::TYPE_FULL);

		$user = User::get(array('email' => $email));

		if ($user->notNull())
		{
			$password = new Password;

			$user->reset_token = $password->create($token);
			$user->reset_last = DateTime::create('now', DateTime::TZ_LOCALE)->toSql(true);

			User::save($user);
		}

		$view['user']  = $user;
		$view['token'] = $token;
		$view['link']  = $link;

		$body = $view->setLayout('email')->render();

		// Please send email here.
		// ----------------------------------------------------

		// ----------------------------------------------------

		$this->setRedirect($this->router->http('forgot', array('task' => 'confirm')), array('This is test message.', $body));

		return true;
	}

	/**
	 * confirm
	 *
	 * @return  boolean
	 */
	protected function confirm()
	{
		$token    = $this->input->get('token');
		$username = $this->input->getUsername('username');

		$user = User::get(array('username' => $username));

		if ($user->isNull())
		{
			$this->setRedirect($this->router->http('forgot', array('task' => 'confirm', 'token' => $token)), Translator::translate('windwalker.user.no.user.found'));

			return false;
		}

		// Check token
		$password = new Password;

		if (!$password->verify($token, $user->reset_token))
		{
			$this->setRedirect($this->router->http('forgot', array('task' => 'confirm')), Translator::translate('windwalker.user.invalid.token'));

			return false;
		}

		$this->setRedirect($this->router->http('reset', array('username' => $username, 'token' => $token)));

		return true;
	}
}
