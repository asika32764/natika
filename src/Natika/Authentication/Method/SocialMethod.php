<?php
/**
 * Part of natika project.
 *
 * @copyright  Copyright (C) 2016 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

namespace Natika\Authentication\Method;

use Windwalker\Authentication\Credential;
use Windwalker\Core\Authentication\User;
use Windwalker\Data\Data;
use Windwalker\Warder\Admin\DataMapper\UserMapper;
use Windwalker\Warder\Data\UserData;
use Windwalker\Warder\WarderPackage;

/**
 * The SocialMethod class.
 *
 * @since  {DEPLOY_VERSION}
 */
class SocialMethod extends \Windwalker\Warder\Authentication\Method\SocialMethod
{
	/**
	 * postAuthenticate
	 *
	 * @param UserData                 $user
	 * @param Data                     $socialMapping
	 * @param Credential               $credential
	 * @param \Hybrid_Provider_Adapter $adapter
	 *
	 * @return  void
	 */
	protected function postAuthenticate(UserData $user, Data $socialMapping, Credential $credential,
		\Hybrid_Provider_Adapter $adapter)
	{
		unset($credential->username);

		$user->id = $socialMapping->user_id;

		$user->bind($credential);

		User::save($user);
	}
}
