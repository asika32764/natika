<?php
/**
 * Part of Front project.
 *
 * @copyright  Copyright (C) 2016 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

namespace Forum\Controller\User\Registration;

use Lyrasoft\Luna\Field\Image\SingleImageDragField;
use Windwalker\Data\Data;
use Windwalker\Warder\Helper\AvatarUploadHelper;

/**
 * The SaveController class.
 * 
 * @since  1.0
 */
class RegistrationSaveController extends \Windwalker\Warder\Controller\User\Registration\RegistrationSaveController
{
	/**
	 * postSave
	 *
	 * @param Data $user
	 *
	 * @return  void
	 */
	protected function postSave(Data $user)
	{
		if (false !== SingleImageDragField::uploadFromController($this, 'avatar', $user, AvatarUploadHelper::getPath($user->id)))
		{
			$this->model->save($user);
		}

		parent::postSave($user);
	}
}
