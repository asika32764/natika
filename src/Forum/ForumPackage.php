<?php
/**
 * Part of Windwalker project.
 *
 * @copyright  Copyright (C) 2015 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later;
 */

namespace Forum;

use Forum\Listener\ForumListener;
use Forum\User\UserHandler;
use Lyrasoft\Unidev\Listener\UnidevRoutingListener;
use Phoenix\Asset\Asset;
use Phoenix\Html\Document;
use Phoenix\Html\HtmlHeader;
use Phoenix\Script\BootstrapScript;
use Phoenix\Script\JQueryScript;
use Windwalker\Core\Authentication\User;
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

		HtmlHeader::setSiteName($config->get('natika.site_name'));
		HtmlHeader::addMetadata('description', $config->get('natika.metadata.description'));
//		HtmlHeader::addOpenGraph('og:title', HtmlHeader::getPageTitle());
		HtmlHeader::addOpenGraph('og:description', $config->get('natika.metadata.og:description'));
		HtmlHeader::addOpenGraph('og:image', $config->get('natika.metadata.og:image'));
		HtmlHeader::addOpenGraph('og:site_title', $config->get('natika.site_name'));

		if ($config->get('natika.theme'))
		{
			RendererHelper::addGlobalPath(WINDWALKER_TEMPLATES . '/theme/' . $config->get('natika.theme'), Priority::HIGH);
		}
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
