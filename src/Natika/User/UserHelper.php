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
use Windwalker\Record\Record;

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
	 * canEditPost
	 *
	 * @param   Data|Record  $topic
	 *
	 * @return  boolean
	 */
	public static function canEditTopic($topic)
	{
		$user = User::get();

		if (static::isGuest())
		{
			return false;
		}

		return $topic->user_id == $user->id || static::isAdmin($user);
	}

	/**
	 * canEditPost
	 *
	 * @param   Data|Record  $topic
	 *
	 * @return  boolean
	 */
	public static function canEditOwnTopic($topic)
	{
		$user = User::get();

		if (static::isGuest())
		{
			return false;
		}

		return $topic->user_id == $user->id;
	}

	/**
	 * canEditPost
	 *
	 * @param   Data|Record  $post
	 *
	 * @return  boolean
	 */
	public static function canEditPost($post)
	{
		$user = User::get();

		if (static::isGuest())
		{
			return false;
		}

		return $post->user_id == $user->id || static::isAdmin($user);
	}

	/**
	 * canEditPost
	 *
	 * @param   Data|Record  $post
	 *
	 * @return  boolean
	 */
	public static function canEditOwnPost($post)
	{
		$user = User::get();

		if (static::isGuest())
		{
			return false;
		}

		return $post->user_id == $user->id;
	}

	/**
	 * canDeletePost
	 *
	 * @param   Data|Record $post
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

		$roots = (array) $config->get('user.root');

		foreach ($roots as $root)
		{
			if ($root == $user->username || $root == $user->email)
			{
				return true;
			}
		}

		return $user->group >= 2;
	}
}
