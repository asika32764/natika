<?php
/**
 * Part of Admin project.
 *
 * @copyright  Copyright (C) 2016 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later;
 */

namespace Admin\Form\Posts;

use Windwalker\Form\Field\ListField;
use Windwalker\Form\Field\TextField;
use Windwalker\Form\FieldDefinitionInterface;
use Windwalker\Form\Form;
use Windwalker\Html\Option;

/**
 * The PostsFilterDefinition class.
 *
 * @since  1.0
 */
class BatchDefinition implements FieldDefinitionInterface
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
		/*
		 * This is batch form definition.
		 * -----------------------------------------------
		 * Every field is a table column.
		 * For example, you can add a 'category_id' field to update item category.
		 */
		$form->wrap(null, 'batch', function (Form $form)
		{
			// Language
			$form->add('language', new ListField)
				->label('Language')
				->set('class', 'col-md-12')
				->addOption(new Option('-- Select Language --', ''))
				->addOption(new Option('English', 'en-GB'))
				->addOption(new Option('Chinese Traditional', 'zh-TW'));

			// Author
			$form->add('created_by', new TextField)
				->label('Author');
		});
	}
}
