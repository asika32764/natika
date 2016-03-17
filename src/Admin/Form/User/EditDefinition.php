<?php
/**
 * Part of natika project.
 *
 * @copyright  Copyright (C) 2016 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

namespace Admin\Form\User;

use Windwalker\Core\Language\Translator;
use Windwalker\Form\Field\RadioField;
use Windwalker\Form\Form;
use Windwalker\Html\Option;

/**
 * The EditDefinition class.
 *
 * @since  {DEPLOY_VERSION}
 */
class EditDefinition extends \Windwalker\Warder\Admin\Form\User\EditDefinition
{
	/**
	 * define
	 *
	 * @param Form $form
	 *
	 * @return  void
	 */
	public function define(Form $form)
	{
		parent::define($form);

		$form->wrap('created', null, function (Form $form)
		{
			$form->add('group', new RadioField)
				->label(Translator::translate('natika.user.field.group'))
				->set('class', 'btn-group')
				->addOption(new Option('Admin', 2))
				->addOption(new Option('Member', 1));
		});
	}
}
