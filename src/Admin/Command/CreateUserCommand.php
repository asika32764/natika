<?php
/**
 * Part of natika project.
 *
 * @copyright  Copyright (C) 2016 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

namespace Admin\Command;

use Natika\User\UserHelper;
use Windwalker\Console\Command\Command;
use Windwalker\Console\Prompter\NotNullPrompter;
use Windwalker\Console\Prompter\PasswordPrompter;
use Windwalker\Console\Prompter\TextPrompter;
use Windwalker\Console\Prompter\ValidatePrompter;
use Windwalker\Validator\Rule\EmailValidator;
use Windwalker\Warder\Data\UserData;
use Windwalker\Warder\Model\UserModel;

/**
 * The InstallCommand class.
 *
 * @since  {DEPLOY_VERSION}
 */
class CreateUserCommand extends Command
{
	/**
	 * Property name.
	 *
	 * @var  string
	 */
	protected $name = 'create-user';

	/**
	 * Property description.
	 *
	 * @var  string
	 */
	protected $description = 'Create Admin User';

	/**
	 * doExecute
	 *
	 * @return  bool
	 */
	protected function doExecute()
	{
		$name = (new NotNullPrompter)->ask('Full Name: ');

		$username = (new NotNullPrompter)->ask('username: ');

		$email = (new ValidatePrompter)->setHandler(function ($value)
		{
			return (new EmailValidator)->validate($value);
		})->ask('Email: ');

		$password = (new PasswordPrompter)->ask('Password: ');

		$password2 = (new PasswordPrompter)->setHandler(function($value) use ($password)
		{
			return $password = $value;
		})->ask('Password Again: ');

		$data = new UserData(array(
			'name'     => $name,
			'username' => $username,
			'email'    => $email,
			'password' => $password,
			'password2' => $password2,
			'group' => UserHelper::GROUP_ADMIN
		));

		(new UserModel)->register($data);

		$this->out('Create Success')->out();

		return true;
	}
}
