<?php
/**
 * Part of phoenix project.
 *
 * @copyright  Copyright (C) 2016 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

namespace Forum\Form\User;

use Lyrasoft\Luna\Field\Image\SingleImageDragField;
use Windwalker\Core\Language\Translator;
use Windwalker\Core\Package\AbstractPackage;
use Windwalker\Form\Field;
use Windwalker\Form\FieldDefinitionInterface;
use Windwalker\Form\Form;
use Windwalker\Warder\Validator\UserExistsValidator;
use Windwalker\Warder\WarderPackage;

/**
 * The RegistrationDefinition class.
 *
 * @since  {DEPLOY_VERSION}
 */
class RegistrationDefinition implements FieldDefinitionInterface
{
	/**
	 * Property package.
	 *
	 * @var  AbstractPackage
	 */
	protected $warder;

	/**
	 * WarderMethod constructor.
	 *
	 * @param WarderPackage $warder
	 */
	public function __construct(WarderPackage $warder)
	{
		$this->warder = $warder;
	}

	/**
	 * Define the form fields.
	 *
	 * @param Form $form The Windwalker form object.
	 *
	 * @return  void
	 */
	public function define(Form $form)
	{
		$loginName = $this->warder->getLoginName();
		$langPrefix = $this->warder->get('frontend.language.prefix', 'warder.');

		$form->wrap('basic', null, function(Form $form) use ($loginName, $langPrefix)
		{
			$form->add('name', new Field\TextField)
				->label(Translator::translate($langPrefix . 'user.field.name'))
				->required();

			if (strtolower($loginName) != 'email')
			{
				$form->add($loginName, new Field\TextField)
					->label(Translator::translate($langPrefix . 'user.field.' . $loginName))
					->setValidator(new UserExistsValidator($loginName))
					->required();
			}

			$form->add('email', new Field\EmailField)
				->label(Translator::translate($langPrefix . 'user.field.email'))
				->setValidator(new UserExistsValidator('email'))
				->required();

			$form->add('password', new Field\PasswordField)
				->label(Translator::translate($langPrefix . 'user.field.password'))
				->set('autocomplete', 'off');

			$form->add('password2', new Field\PasswordField)
				->label(Translator::translate($langPrefix . 'user.field.password.confirm'))
				->set('autocomplete', 'off');

			$form->add('avatar', new SingleImageDragField)
				->label('Avatar');
		});
	}
}
