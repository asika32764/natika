<?php
/**
 * Part of Windwalker project.
 *
 * @copyright  Copyright (C) 2014 - 2015 LYRASOFT. All rights reserved.
 * @license    GNU Lesser General Public License version 3 or later.
 */

namespace Windwalker\Composer;

use Composer\IO\IOInterface;
use Composer\Script\Event;
use Symfony\Component\Yaml\Yaml;

/**
 * The StarterInstaller class.
 * 
 * @since  0.2.0
 */
class NatikaInstaller
{
	/**
	 * Do install.
	 *
	 * @param Event $event The command event.
	 *
	 * @return  void
	 */
	public static function rootInstall(Event $event)
	{
		system('php ' . __DIR__ . '/../../../bin/console create-user');
	}
}
