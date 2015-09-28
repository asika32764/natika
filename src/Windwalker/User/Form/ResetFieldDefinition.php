<?php
/**
 * Part of Windwalker project.
 *
 * @copyright  Copyright (C) 2014 - 2015 LYRASOFT. All rights reserved.
 * @license    GNU General Public License version 2 or later;
 */

namespace Windwalker\User\Form;

use Windwalker\Form\Field\HiddenField;
use Windwalker\Form\Field\PasswordField;
use Windwalker\Form\FieldDefinitionInterface;
use Windwalker\Form\Form;

/**
 * The ResetFieldDefinition class.
 *
 * @since  2.1.1
 */
class ResetFieldDefinition implements FieldDefinitionInterface
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
		$form->add('password', new PasswordField)
			->label('Password')
			->required();

		$form->add('password2', new PasswordField)
			->label('Verify Password')
			->required();

		$form->add('username', new HiddenField);
		$form->add('token', new HiddenField);
	}
}
