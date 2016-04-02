<?php
/**
 * Part of phoenix project.
 *
 * @copyright  Copyright (C) 2016 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

namespace Forum\Form\Profile;

use Lyrasoft\Luna\Field\Image\SingleImageDragField;
use Windwalker\Form\Field;
use Windwalker\Form\Form;
use Windwalker\Warder\Helper\AvatarUploadHelper;

/**
 * The EditDefinition class.
 *
 * @since  {DEPLOY_VERSION}
 */
class EditDefinition extends \Windwalker\Warder\Form\Profile\EditDefinition
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

		$loginName = $this->package->getLoginName();

		$form->wrap('basic', null, function(Form $form) use ($loginName)
		{
			$form->add('avatar', new SingleImageDragField)
				->label('Avatar')
				->set('default_image', AvatarUploadHelper::getDefaultImage());
		});
	}
}
