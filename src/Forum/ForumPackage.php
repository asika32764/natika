<?php
/**
 * Part of Windwalker project.
 *
 * @copyright  Copyright (C) 2015 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later;
 */

namespace Forum;

use Forum\Listener\ForumListener;
use Lyrasoft\Unidev\Listener\UnidevRoutingListener;
use Phoenix\Html\HtmlHeader;
use Windwalker\Core\Package\AbstractPackage;
use Windwalker\Core\Renderer\RendererHelper;
use Windwalker\Event\Dispatcher;
use Windwalker\Utilities\Queue\Priority;
use Windwalker\Warder\Helper\WarderHelper;

/**
 * The ForumPackage class.
 * 
 * @since  {DEPLOY_VERSION}
 */
class ForumPackage extends AbstractPackage
{
	/**
	 * initialise
	 *
	 * @return  void
	 */
	public function initialise()
	{
		parent::initialise();
	}

	/**
	 * registerListeners
	 *
	 * @param Dispatcher $dispatcher
	 *
	 * @return  void
	 */
	public function registerListeners(Dispatcher $dispatcher)
	{
		parent::registerListeners($dispatcher);

		$dispatcher->addListener(new UnidevRoutingListener);
	}

	/**
	 * prepareExecute
	 *
	 * @return  void
	 */
	protected function prepareExecute()
	{
		$this->getDispatcher()->addListener(new ForumListener);

		$config = $this->container->get('config');

		HtmlHeader::setSiteName($config->get('site_name'));

		RendererHelper::addGlobalPath(WINDWALKER_TEMPLATES . '/theme/' . $config->get('theme'), Priority::HIGH);
	}

	/**
	 * loadRouting
	 *
	 * @return  array|mixed
	 */
	public function loadRouting()
	{
		$routes = parent::loadRouting();

		$routes = array_merge($routes, WarderHelper::getFrontendRouting());

		return $routes;
	}
}
