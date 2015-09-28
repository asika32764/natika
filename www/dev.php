<?php
/**
 * Part of Windwalker project.
 *
 * @copyright  Copyright (C) 2011 - 2014 SMS Taiwan, Inc. All rights reserved.
 * @license    GNU Lesser General Public License version 3 or later. see LICENSE
 */

// Start composer
$autoload = __DIR__ . '/../vendor/autoload.php';

if (!is_file($autoload))
{
	exit();
}

include_once $autoload;

include_once __DIR__ . '/../etc/define.php';

// Get allow remote ips from config.
\Windwalker\Windwalker::loadConfiguration($config = new \Windwalker\Registry\Registry);

if (isset($_SERVER['HTTP_CLIENT_IP']) || isset($_SERVER['HTTP_X_FORWARDED_FOR'])
	|| !(in_array(@$_SERVER['REMOTE_ADDR'], (array) $config->get('dev.allow_ips'))))
{
	header('HTTP/1.1 403 Forbidden');

	exit('Forbidden');
}

// Start our application.
$app = new Windwalker\Web\DevApplication(\Windwalker\Ioc::factory());

define('WINDWALKER_DEBUG', $app->get('system.debug'));

$app->execute();
