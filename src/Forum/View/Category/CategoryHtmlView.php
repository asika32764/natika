<?php
/**
 * Part of phoenix project.
 *
 * @copyright  Copyright (C) 2015 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

namespace Forum\View\Category;

use Forum\Helper\BreadcrumbHelper;
use Forum\Notification\Notification;
use Phoenix\Html\HtmlHeader;
use Phoenix\View\AbstractPhoenixHtmView;
use Windwalker\Core\Authentication\User;
use Windwalker\Registry\Registry;
use Windwalker\String\Utf8String;

/**
 * The CategoryHtmlView class.
 *
 * @since  {DEPLOY_VERSION}
 */
class CategoryHtmlView extends AbstractPhoenixHtmView
{
	/**
	 * prepareData
	 *
	 * @param \Windwalker\Data\Data $data
	 *
	 * @return  void
	 */
	protected function prepareData($data)
	{
		$paths = $data->currentCategory->path;

		$data->breadcrumbs = BreadcrumbHelper::getBreadcrumbs($paths);

		if ($data->currentCategory->id != 1)
		{
			$this->setTitle($data->currentCategory->title);
		}

		// Prepare format
		foreach ($data->categories as $category)
		{
			$category->last_post->user_params = new Registry($category->last_post->user_params);
		}

		foreach ($data->topics as $topic)
		{
			$topic->last_user_params = new Registry($topic->last_user_params);
		}

		$user = User::get();
		$data->isWatch = Notification::getNotification('category', $data->currentCategory->id, $user->id)->notNull();

		if ($data->currentCategory->id != 1)
		{
			$desc = $data->currentCategory->description;
			$desc = Utf8String::substr(strip_tags($desc), 0, 150);

			HtmlHeader::addMetadata('description', $desc, true);
			HtmlHeader::addOpenGraph('og:title', HtmlHeader::getPageTitle(), true);
			HtmlHeader::addOpenGraph('og:description', $desc, true);
			HtmlHeader::addOpenGraph('og:image', $data->currentCategory->image, true);
		}
	}
}
