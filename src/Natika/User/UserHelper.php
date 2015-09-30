<?php
/**
 * Part of natika project.
 *
 * @copyright  Copyright (C) 2015 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

namespace Natika\User;

use Windwalker\Core\Authentication\User;
use Windwalker\Core\Authentication\UserDataInterface;
use Windwalker\Data\Data;
use Windwalker\Ioc;

/**
 * The UserHelper class.
 *
 * @since  {DEPLOY_VERSION}
 */
class UserHelper
{
	/**
	 * isLogin
	 *
	 * @return  boolean
	 */
	public static function isLogin()
	{
		return User::get()->isMember();
	}

	/**
	 * isGuest
	 *
	 * @return  boolean
	 */
	public static function isGuest()
	{
		return User::get()->isGuest();
	}

	/**
	 * canDeletePost
	 *
	 * @param   Data $post
	 *
	 * @return  bool
	 */
	public static function canDeletePost($post)
	{
		$user = User::get();

		if (static::isGuest())
		{
			return false;
		}

		return $post->user_id == $user->id || static::isAdmin($user);
	}

	/**
	 * isAdmin
	 *
	 * @param   mixed|UserDataInterface $user
	 *
	 * @return  boolean
	 */
	public static function isAdmin($user = null)
	{
		if (!$user instanceof UserDataInterface)
		{
			$user = User::get($user);
		}

		$config = Ioc::getConfig();

		return $user->group >= 2 || $config->get('user.root') == $user->username;
	}
}
