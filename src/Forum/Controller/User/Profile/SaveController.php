<?php
/**
 * Part of Front project.
 *
 * @copyright  Copyright (C) 2016 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

namespace Forum\Controller\User\Profile;

use Lyrasoft\Luna\Field\Image\SingleImageDragField;
use Windwalker\Data\Data;
use Windwalker\Warder\Helper\AvatarUploadHelper;

/**
 * The SaveController class.
 *
 * @since  1.0
 */
class SaveController extends \Windwalker\Warder\Controller\User\Profile\SaveController
{
	/**
	 * postSave
	 *
	 * @param Data $data
	 *
	 * @return  void
	 */
	protected function postSave(Data $data)
	{
		if (false !== SingleImageDragField::uploadFromController($this, 'avatar', $data, AvatarUploadHelper::getPath($data->id)))
		{
			$this->model->save($data);
		}

		parent::postSave($data);
	}
}
