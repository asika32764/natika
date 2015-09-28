<?php
/**
 * Part of Windwalker project.
 *
 * @copyright  Copyright (C) 2014 - 2015 LYRASOFT. All rights reserved.
 * @license    GNU Lesser General Public License version 3 or later.
 */

namespace Windwalker\User\Listener;

use Windwalker\Core\Ioc;
use Windwalker\Event\Event;
use Windwalker\Filesystem\Folder;

/**
 * The UserListener class.
 * 
 * @since  2.1.1
 */
class UserListener
{
	/**
	 * onUserAfterLogin
	 *
	 * @param Event $event
	 *
	 * @return  void
	 */
	public function onUserAfterLogin(Event $event)
	{
		$options = $event['options'];

		$remember = $options['remember'];

		if ($remember)
		{
			$session = Ioc::getSession();

			$uri = Ioc::get('uri');

			setcookie(session_name(), $_COOKIE[session_name()], time() + 60 * 60 * 24 * 100, $session->getOption('cookie_path', $uri['base.path']), $session->getOption('cookie_domain'));
		}
	}

	/**
	 * onAfterInitialise
	 *
	 * @param Event $event
	 *
	 * @return  void
	 */
	public function onAfterInitialise(Event $event)
	{
	}
}
