<?php
/**
 * Part of Windwalker project.
 *
 * @copyright  Copyright (C) 2014 - 2015 LYRASOFT. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

namespace Windwalker\User\Form;

use Windwalker\Form\Field\HiddenField;
use Windwalker\Form\Field\PasswordField;
use Windwalker\Form\Field\TextField;
use Windwalker\Form\FieldDefinitionInterface;
use Windwalker\Form\Form;

/**
 * The ForgotFieldDefinition class.
 * 
 * @since  2.1.1
 */
class ForgotFieldDefinition implements FieldDefinitionInterface
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
		$form->wrap('forgot', null, function(Form $form)
		{
			$form->add('email', new TextField)
				->label('Email')
				->required();
		});

		$form->wrap('confirm', null, function(Form $form)
		{
			$form->add('username', new TextField)
				->label('Username')
				->required();

			$form->add('token', new TextField)
				->label('Token')
				->required();
		});
	}
}
