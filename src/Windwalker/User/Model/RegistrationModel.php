<?php
/**
 * Part of Windwalker project.
 *
 * @copyright  Copyright (C) 2014 - 2015 LYRASOFT. All rights reserved.
 * @license    GNU Lesser General Public License version 3 or later.
 */

namespace Windwalker\User\Model;

use Windwalker\Core\Authentication\User;
use Windwalker\Core\Model\Exception\ValidFailException;
use Windwalker\Core\Model\Model;
use Windwalker\Crypt\Password;
use Windwalker\Data\Data;
use Windwalker\Form\Field\AbstractField;
use Windwalker\Form\Form;
use Windwalker\User\Form\RegistrationFieldDefinition;

/**
 * The RegistrationModel class.
 * 
 * @since  2.1.1
 */
class RegistrationModel extends Model
{
	/**
	 * getForm
	 *
	 * @return  Form
	 */
	public function getForm()
	{
		return $this->fetch('login.form', function()
		{
			$form = new Form('registration');

			$form->defineFormFields(new RegistrationFieldDefinition);

			return $form;
		});
	}

	/**
	 * register
	 *
	 * @param array $user
	 *
	 * @throws \Exception
	 * @return  bool
	 */
	public function register($user)
	{
		$user = new Data($user);

		if ($user->password != $user->password2)
		{
			throw new \Exception('Password not match.');
		}

		$password = new Password;

		$user->password = $password->create($user->password);

		unset($user->password2);

		User::save($user);

		return true;
	}
}
 