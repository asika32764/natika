<?php
/**
 * Part of Admin project.
 *
 * @copyright  Copyright (C) 2016 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

namespace Admin\Form\Article;

use Admin\Field\Article\ArticleListField;
use Admin\Field\Article\ArticleModalField;
use Admin\Field\IconFontAwesomeModalField;
use Lyrasoft\Luna\Field\Editor\SummernoteEditorField;
use Lyrasoft\Luna\Helper\LunaHelper;
use Phoenix;
use Windwalker\Core\Language\Translator;
use Windwalker\Filter\InputFilter;
use Windwalker\Form\Field;
use Windwalker\Form\FieldDefinitionInterface;
use Windwalker\Form\Form;
use Windwalker\Html\Option;
use Windwalker\Validator\Rule;
use Windwalker\Warder\Admin\Field\User\UserModalField;
use Windwalker\Warder\Helper\WarderHelper;

/**
 * The ArticleEditDefinition class.
 *
 * @since  1.0
 */
class EditDefinition extends \Lyrasoft\Luna\Admin\Form\Article\EditDefinition
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
		$langPrefix = LunaHelper::getLangPrefix();

		// Title
		$form->add('title', new Field\TextField)
			->label(Translator::translate($langPrefix . 'article.field.title'))
			->set('placeholder', Translator::translate($langPrefix . 'article.field.title'))
			->setFilter('trim')
			->required(true);

		// Alias
		$form->add('alias', new Field\TextField)
			->label(Translator::translate($langPrefix . 'article.field.alias'))
			->set('placeholder', Translator::translate($langPrefix . 'article.field.alias'));

		// Basic fieldset
		$form->wrap('basic', null, function(Form $form) use ($langPrefix)
		{

		});

		// Text Fieldset
		$form->wrap('text', null, function(Form $form) use ($langPrefix)
		{
			// Introtext
			$form->add('body', new SummernoteEditorField)
				->label(Translator::translate($langPrefix . 'article.field.introtext'))
				->set('options', array(
					'height' => 450
				))
//				->set('includes', 'readmore')
				->set('rows', 10);
		});

		// Created fieldset
		$form->wrap('created', null, function(Form $form) use ($langPrefix)
		{
			// Title
			$form->add('short_title', new Field\TextField)
				->label('Short Title')
				->set('placeholder', 'Short Title')
				->setFilter('trim');

			// URL
			$form->add('url', new Field\TextField)
				->label('URL')
				->set('placeholder', 'URL')
				->set('class', 'validation-url')
				->setFilter('trim');

			// State
			$form->add('state', new Field\RadioField)
				->label(Translator::translate($langPrefix . 'article.field.state'))
				->set('class', 'btn-group')
				->set('default', 1)
				->addOption(new Option(Translator::translate('phoenix.grid.state.published'), '1'))
				->addOption(new Option(Translator::translate('phoenix.grid.state.unpublished'), '0'));

			// ID
			$form->add('id', new Field\HiddenField);

			// Icon
			$form->add('icon', new IconFontAwesomeModalField)
				->label('Icon');

			// Created
			$form->add('created', new Phoenix\Field\CalendarField)
				->label(Translator::translate($langPrefix . 'article.field.created'));

			// Modified
			$form->add('modified', new Phoenix\Field\CalendarField)
				->label(Translator::translate($langPrefix . 'article.field.modified'))
				->disabled();

			if (WarderHelper::tableExists('users'))
			{
				// Author
				$form->add('created_by', new UserModalField)
					->label(Translator::translate($langPrefix . 'article.field.author'));

				// Modified User
				$form->add('modified_by', new UserModalField)
					->label(Translator::translate($langPrefix . 'article.field.modifiedby'))
					->readonly();
			}
		});
	}
}
