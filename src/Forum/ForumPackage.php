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
use Phoenix\Html\Document;
use Windwalker\Core\Authentication\User;
use Windwalker\Core\Package\AbstractPackage;
use Windwalker\Event\Dispatcher;

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
}
