<?php
/**
 * Part of Windwalker project.
 *
 * @copyright  Copyright (C) 2014 - 2015 LYRASOFT. All rights reserved.
 * @license    GNU Lesser General Public License version 3 or later.
 */

namespace Windwalker\Web;

use Symfony\Component\Yaml\Yaml;
use Windwalker\Debugger\DebuggerPackage;
use Windwalker\DI\ServiceProviderInterface;
use Windwalker\Registry\Registry;
use Windwalker\Core\Provider;
use Windwalker\Windwalker;

/**
 * The DevApplication class.
 * 
 * @since  2.1.1
 */
class DevApplication extends Application
{
	/**
	 * Property mode.
	 *
	 * @var  string
	 */
	public $mode = 'dev';

	/**
	 * loadProviders
	 *
	 * @return  ServiceProviderInterface[]
	 */
	public static function loadProviders()
	{
		/*
		 * Get Global Providers
		 * -----------------------------------------
		 * If you want a provider can be used in every applications (for example: Web and Console),
		 * set it in Windwalker\Windwalker object.
		 */
		$providers = array_merge(parent::loadProviders(), Windwalker::loadProviders());

		// Custom Providers here...
		$providers['debug'] = new Provider\WhoopsProvider;

		return $providers;
	}

	/**
	 * getPackages
	 *
	 * @return  array
	 */
	public static function loadPackages()
	{
		/*
		 * Get Global Packages
		 * -----------------------------------------
		 * If you want a package can be used in every applications (for example: Web and Console),
		 * set it in Windwalker\Windwalker object.
		 */
		$packages = array_merge(parent::loadPackages(), Windwalker::loadPackages());

		/*
		 * Get Packages for This Application
		 * -----------------------------------------
		 * If you want a package only use in this application or want to override a global package,
		 * set it here. Example: $packages[] = new Flower\FlowerPackage;
		 */

		// Your packages here...
		$packages['_debugger'] = new DebuggerPackage;

		return $packages;
	}

	/**
	 * loadConfiguration
	 *
	 * @param Registry $config
	 *
	 * @return  void
	 */
	protected function loadConfiguration(Registry $config)
	{
		parent::loadConfiguration($config);

		$config->loadFile(WINDWALKER_ETC . '/dev/config.yml', 'yaml');
	}

	/**
	 * loadRoutingConfiguration
	 *
	 * @return  array
	 */
	protected function loadRoutingConfiguration()
	{
		$routes = parent::loadRoutingConfiguration();

		return array_merge($routes, Yaml::parse(file_get_contents(WINDWALKER_ETC . '/dev/routing.yml')));
	}
}
