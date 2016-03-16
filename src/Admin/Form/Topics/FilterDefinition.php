<?php
/**
 * Part of Admin project.
 *
 * @copyright  Copyright (C) 2016 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later;
 */

namespace Admin\Form\Topics;

use Windwalker\Core\Language\Translator;
use Windwalker\Form\Field\ListField;
use Windwalker\Form\Field\TextField;
use Windwalker\Form\FieldDefinitionInterface;
use Windwalker\Form\Form;
use Windwalker\Html\Option;

/**
 * The TopicsFilterDefinition class.
 *
 * @since  1.0
 */
class FilterDefinition implements FieldDefinitionInterface
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
		 * Search Control
		 * -------------------------------------------------
		 * Add search fields as options, by default, model will search all columns.
		 * If you hop that user can choose a field to search, change "display" to true.
		 */
		$form->wrap(null, 'search', function (Form $form)
		{
			// Search Field
			$form->add('field', new ListField)
				->label(Translator::translate('phoenix.grid.search.field.label'))
				->set('display', false)
				->defaultValue('*')
				->addOption(new Option(Translator::translate('phoenix.core.all'), '*'))
				->addOption(new Option(Translator::translate('admin.topic.field.title'), 'topic.title'))
				->addOption(new Option(Translator::translate('admin.topic.field.alias'), 'topic.alias'));

			// Search Content
			$form->add('content', new TextField)
				->label(Translator::translate('phoenix.grid.search.label'))
				->set('placeholder', Translator::translate('phoenix.grid.search.label'));
		});

		/*
		 * Filter Control
		 * -------------------------------------------------
		 * Add filter fields to this section.
		 * Remember to add onchange event => this.form.submit(); or Phoenix.post();
		 *
		 * You can override filter actions in TopicsModel::configureFilters()
		 */
		$form->wrap(null, 'filter', function(Form $form)
		{
			// State
			$form->add('topic.state', new ListField)
				->label('State')
				// Add empty option to support single deselect button
				->addOption(new Option('', ''))
				->addOption(new Option(Translator::translate('admin.topic.filter.state.select'), ''))
				->addOption(new Option(Translator::translate('phoenix.grid.state.published'), '1'))
				->addOption(new Option(Translator::translate('phoenix.grid.state.unpublished'), '0'))
				->set('onchange', 'this.form.submit()');
		});
	}
}
