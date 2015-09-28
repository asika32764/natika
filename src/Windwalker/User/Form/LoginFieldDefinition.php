<?php
/**
 * Part of Windwalker project.
 *
 * @copyright  Copyright (C) 2014 - 2015 LYRASOFT. All rights reserved.
 * @license    GNU Lesser General Public License version 3 or later.
 */

namespace Windwalker\User\Form;

use Windwalker\Filter\InputFilter;
use Windwalker\Form\Field\AbstractField;
use Windwalker\Form\Field\CheckboxField;
use Windwalker\Form\Field\PasswordField;
use Windwalker\Form\Field\TextField;
use Windwalker\Form\FieldDefinitionInterface;
use Windwalker\Form\Form;
use Windwalker\Validator\Rule\EmailValidator;

/**
 * The LoginFormDefinition class.
 * 
 * @since  2.1.1
 */
class LoginFieldDefinition implements FieldDefinitionInterface
{
	/**
	 * Define the form fields.
	 *
	 * @param Form $form The Windwalker form object.
	 *
	 * @return  void
	 */
	public function define(Form $form)
	{
		$form->add('username', new TextField)
			->label('Username')
			->required();

		$form->add('password', new PasswordField)
			->label('Password')
			->required();

		$form->add('remember', new CheckboxField)
			->label('Remember me')
			->set('value', 1);
	}
}
 