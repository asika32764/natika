<?php
/**
 * Part of Admin project.
 *
 * @copyright  Copyright (C) 2016 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

namespace Admin\Form\Category;

use Phoenix;
use Windwalker\Form\Field;
use Windwalker\Form\Form;
use Windwalker\Validator\Rule;

/**
 * The CategoryEditDefinition class.
 *
 * @since  1.0
 */
class EditDefinition extends \Lyrasoft\Luna\Admin\Form\Category\EditDefinition
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
		parent::define($form);

		$form->wrap('basic', 'params', function (Form $form)
		{
			$form->add('bg_color', new Field\TextField)
				->label('Color');

			$form->add('image_icon', new Field\TextField)
				->label('Icon');
		});

		$form->wrap('text', null, function (Form $form)
		{
			$form->add('description', new Field\TextareaField)
				->label('Description')
				->set('rows', 10)
				->set('class', 'form-control');
		});
	}
}
