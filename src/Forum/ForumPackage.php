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
use Phoenix\Asset\Asset;
use Phoenix\Html\Document;
use Phoenix\Script\BootstrapScript;
use Phoenix\Script\JQueryScript;
use Windwalker\Core\Authentication\User;
use Windwalker\Core\Package\AbstractPackage;
use Windwalker\Core\Renderer\RendererHelper;
use Windwalker\Event\Dispatcher;
use Windwalker\Utilities\Queue\Priority;

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

		User::setHandler(new UserHandler);

		$config = $this->container->get('config');

		Document::setSiteName($config->get('site_name'));

		RendererHelper::addGlobalPath(WINDWALKER_TEMPLATES . '/theme/' . $config->get('theme'), Priority::HIGH);
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

		$dispatcher->addListener(new ForumListener);
	}

	/**
	 * prepareExecute
	 *
	 * @return  void
	 */
	protected function prepareExecute()
	{

	}
}
