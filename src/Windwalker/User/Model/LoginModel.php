<?php
/**
 * Part of Windwalker project.
 *
 * @copyright  Copyright (C) 2014 - 2015 LYRASOFT. All rights reserved.
 * @license    GNU Lesser General Public License version 3 or later.
 */

namespace Windwalker\User\Model;

use Windwalker\Authentication\Credential;
use Windwalker\Core\Authentication\User;
use Windwalker\Core\Model\Model;
use Windwalker\Form\Form;
use Windwalker\User\Form\LoginFieldDefinition;

/**
 * The LoginModel class.
 * 
 * @since  2.1.1
 */
class LoginModel extends Model
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
			$form = new Form('user');

			$form->defineFormFields(new LoginFieldDefinition);

			return $form;
		});
	}

	/**
	 * login
	 *
	 * @param   string  $username
	 * @param   string  $password
	 * @param   bool    $remember
	 *
	 * @return  boolean
	 */
	public function login($username, $password, $remember = false)
	{
		$credential = new Credential(array('username' => $username, 'password' => $password));

		if (!User::login($credential, $remember))
		{
			$this['errors'] = User::getResults();

			return false;
		}

		return true;
	}

	/**
	 * logout
	 *
	 * @param   string  $username
	 *
	 * @return  boolean
	 */
	public function logout($username)
	{
		$credential = new Credential(array('username' => $username));

		if (User::logout($credential))
		{
			return false;
		}

		return true;
	}
}
 