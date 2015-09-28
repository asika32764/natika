<?php
/**
 * Part of Windwalker project.
 *
 * @copyright  Copyright (C) 2014 - 2015 LYRASOFT. All rights reserved.
 * @license    GNU General Public License version 2 or later;
 */

namespace Windwalker\User\Controller\Reset;

use Windwalker\Core\Authentication\User;
use Windwalker\Core\Controller\Controller;
use Windwalker\Core\Frontend\Bootstrap;
use Windwalker\Core\Language\Translator;
use Windwalker\Core\Model\Exception\ValidFailException;
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
		$username  = $this->input->getUsername('username');
		$token     = $this->input->getUsername('token');
		$password  = $this->input->getString('password');
		$password2 = $this->input->getString('password2');

		try
		{
			if (!trim($password))
			{
				throw new ValidFailException(Translator::translate('windwalker.user.password.not.entered'));
			}

			if ($password != $password2)
			{
				throw new ValidFailException(Translator::translate('windwalker.user.password.not.match'));
			}

			$user = User::get(array('username' => $username));

			if ($user->isNull())
			{
				throw new ValidFailException(Translator::translate('windwalker.user.not.found'));
			}

			$passwordObject = new Password;

			if (!$passwordObject->verify($token, $user->reset_token))
			{
				throw new ValidFailException(Translator::translate('windwalker.user.invalid.token'));
			}

			$user->password    = $passwordObject->create($password);
			$user->reset_token = '';
			$user->last_reset  = '';

			User::save($user);
		}
		catch (ValidFailException $e)
		{
			$this->setRedirect(
				$this->router->http('reset', array(
					'task' => 'reset',
					'username' => $username,
					'token' => $token
				)),
				$e->getMessage(),
				Bootstrap::MSG_DANGER
			);

			return false;
		}

		$this->setRedirect($this->router->http('reset', array('task' => 'complete')));

		return true;
	}
}
