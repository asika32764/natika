<?php
/**
 * Part of phoenix project. 
 *
 * @copyright  Copyright (C) 2015 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

namespace Forum\View\Topic;

use Forum\Helper\BreadcrumbHelper;
use Natika\Markdown\Markdown;
use Phoenix\View\ItemView;

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

			$this->setTitle($data->topic->title);
		}
		else
		{
			$this->setTitle('New Topic');
		}
	}
}
