<?php
/**
 * Part of Windwalker project.
 *
 * @copyright  Copyright (C) 2014 - 2015 LYRASOFT. All rights reserved.
 * @license    GNU Lesser General Public License version 3 or later.
 */

namespace Windwalker;

use Admin\AdminPackage;
use Forum\ForumPackage;
use Lyrasoft\Luna\LunaPackage;
use Lyrasoft\Unidev\UnidevPackage;
use Phoenix\PhoenixPackage;
use Symfony\Component\Yaml\Yaml;
use Windwalker\Core\Package\AbstractPackage;
use Windwalker\DI\ServiceProviderInterface;
use Windwalker\Registry\Registry;
use Windwalker\SystemPackage\SystemPackage;
use Windwalker\User\UserPackage;
use Windwalker\Warder\WarderPackage;

/**
 * The main Windwalker instantiate class.
 *
 * This class will load in both Web and Console. Write some configuration if you want to use in all environment.
 * 
 * @since  2.0
 */
class Windwalker extends \Windwalker\Core\Windwalker
{
	/**
	 * Load packages.
	 *
	 * If you want some packages run in both Web and Console, register them here.
	 *
	 * @return  AbstractPackage[]
	 */
	public static function loadPackages()
	{
		return array(
			'system'  => new SystemPackage,
			'phoenix' => new PhoenixPackage,
			'warder'  => new WarderPackage,
			'unidev'  => new UnidevPackage,
			'luna'    => new LunaPackage,
			'admin'   => new AdminPackage,
			'forum'   => new ForumPackage
		);
	}

	/**
	 * Load providers.
	 *
	 * If you want seom 3rd libraries tun in both Web and Console, register them here.
	 *
	 * @return  ServiceProviderInterface[]
	 */
	public static function loadProviders()
	{
		return array();
	}

	/**
	 * Load configuration files.
	 *
	 * @param   Registry  $config  The config registry object.
	 *
	 * @throws  \RuntimeException
	 *
	 * @return  void
	 */
	public static function loadConfiguration(Registry $config)
	{
		$config->loadFile($file = WINDWALKER_ETC . '/config.yml', 'yaml');

		$secret = WINDWALKER_ETC . '/secret.yml';

		if (is_file($secret))
		{
			$config->loadFile($secret, 'yaml');
		}
	}

	/**
	 * Load routing profiles as an array.
	 *
	 * @return  array
	 */
	public static function loadRouting()
	{
		return Yaml::parse(file_get_contents(WINDWALKER_ETC . '/routing.yml'));
	}

	/**
	 * Prepare system path.
	 *
	 * Write your custom path to $config['path.xxx'].
	 *
	 * @param   Registry  $config  The config registry object.
	 *
	 * @return  void
	 */
	public static function prepareSystemPath(Registry $config)
	{
		$config['path.root']       = WINDWALKER_ROOT;
		$config['path.bin']        = WINDWALKER_BIN;
		$config['path.cache']      = WINDWALKER_CACHE;
		$config['path.etc']        = WINDWALKER_ETC;
		$config['path.logs']       = WINDWALKER_LOGS;
		$config['path.resources']  = WINDWALKER_RESOURCES;
		$config['path.source']     = WINDWALKER_SOURCE;
		$config['path.temp']       = WINDWALKER_TEMP;
		$config['path.templates']  = WINDWALKER_TEMPLATES;
		$config['path.vendor']     = WINDWALKER_VENDOR;
		$config['path.public']     = WINDWALKER_PUBLIC;
		$config['path.migrations'] = WINDWALKER_MIGRATIONS;
		$config['path.seeders']    = WINDWALKER_SEEDERS;
		$config['path.languages']  = WINDWALKER_LANGUAGES;
	}
}
