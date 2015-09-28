<?php
/**
 * Part of Windwalker project.
 *
 * @copyright  Copyright (C) 2014 - 2015 LYRASOFT. All rights reserved.
 * @license    GNU General Public License version 2 or later;
 */

namespace Windwalker\Listener;

use Windwalker\Core\View\HtmlView;
use Windwalker\Event\Event;

/**
 * The SystemListener class.
 *
 * NOTE: This listener has been registered after onAfterInitialise event. So the first event is onAfterRouting.
 *
 * @since  2.1.1
 */
class SystemListener
{
	/**
	 * onBeforeRouting
	 *
	 * @param Event $event
	 *
	 * @return  void
	 */
	public function onRegisterRouting(Event $event)
	{
		$app = $event['app'];

		if ($app->get('system.offline', false))
		{
			$view = new HtmlView;

			$view->setLayout('windwalker.offline.offline');

			echo $view->render();

			die;
		}
	}
}
