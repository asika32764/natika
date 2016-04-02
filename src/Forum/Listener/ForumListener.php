<?php
/**
 * Part of natika project.
 *
 * @copyright  Copyright (C) 2015 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

namespace Forum\Listener;

use Lyrasoft\Luna\Admin\DataMapper\ArticleMapper;
use Windwalker\Core\Authentication\User;
use Windwalker\Core\Renderer\RendererHelper;
use Windwalker\Core\Router\Router;
use Windwalker\Event\Event;
use Windwalker\Ioc;
use Windwalker\Utilities\Queue\Priority;

/**
 * The ForumListener class.
 *
 * @since  {DEPLOY_VERSION}
 */
class ForumListener
{
	/**
	 * onViewBeforeRender
	 *
	 * @param Event $event
	 *
	 * @return  void
	 */
	public function onViewBeforeRender(Event $event)
	{
		$data = $event['data'];

		$data->user = $data->user ? : User::get();

		$articleMapper = new ArticleMapper;
		$data->articles = $data->articles ? : $articleMapper->find(['state' => 1], 'ordering');

		foreach ($data->articles as $article)
		{
			$article->link = $article->url ? : Router::html('forum@article', ['id' => $article->id, 'alias' => $article->alias]);
		}

		// Template
		$config = Ioc::getConfig();

		if ($config['natika.theme'])
		{
			$event['view']->getRenderer()->addPath(WINDWALKER_TEMPLATES . '/theme/' . $config['natika.theme'] . '/' . $event['view']->getName(), Priority::HIGH);
		}
	}
}
