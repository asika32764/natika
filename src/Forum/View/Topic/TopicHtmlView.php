<?php
/**
 * Part of phoenix project. 
 *
 * @copyright  Copyright (C) 2015 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

namespace Forum\View\Topic;

use Forum\Helper\BreadcrumbHelper;
use Forum\Notification\Notification;
use Natika\Markdown\Markdown;
use Phoenix\Html\HtmlHeader;
use Phoenix\View\ItemView;
use Windwalker\Core\Authentication\User;
use Windwalker\String\Utf8String;

/**
 * The TopicHtmlView class.
 * 
 * @since  {DEPLOY_VERSION}
 */
class TopicHtmlView extends ItemView
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
		if ($this->layout == 'default')
		{
			$paths = $this['topic']->category->path;

			$data->breadcrumbs = BreadcrumbHelper::getBreadcrumbs($paths);
			
			foreach ($data->posts as $post)
			{
				$post->raw_body = $post->body;
				$post->body = Markdown::render($post->body);
			}

			$user = User::get();

			$data->isWatch = Notification::getNotification('topic', $this['topic']->id, $user->id)->notNull();

			$this->setTitle($data->topic->title);
		}
		else
		{
			$this->setTitle('New Topic');
		}

		$desc = $data->topic->title;

		if ($data->posts[0])
		{
			$desc = $data->posts[0]->body;
			$desc = Utf8String::substr(strip_tags($desc), 0, 150);
		}

		HtmlHeader::addMetadata('description', $desc, true);
		HtmlHeader::addOpenGraph('og:title', HtmlHeader::getPageTitle(), true);
		HtmlHeader::addOpenGraph('og:description', $desc, true);
		HtmlHeader::getMetadata()->removeOpenGraph('og:image');
	}
}
