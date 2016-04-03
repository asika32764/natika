<?php
/**
 * Part of Windwalker project.
 *
 * @copyright  Copyright (C) 2014 - 2015 LYRASOFT. All rights reserved.
 * @license    GNU Lesser General Public License version 3 or later.
 */

namespace Windwalker\Console;

use Windwalker\Core\Console\WindwalkerConsole;
use Windwalker\Core\Provider;
use Windwalker\DI\ServiceProviderInterface;
use Windwalker\Ioc;
use Windwalker\Registry\Registry;
use Windwalker\User\UserPackage;
use Windwalker\Windwalker;

/**
 * The WindwalkerConsole class.
 * 
 * @since  2.1.1
 */
class Application extends WindwalkerConsole
{
	/**
	 * initialise
	 *
	 * @return  void
	 */
	protected function initialise()
	{
		// Prepare system paths, we'll write all path constants into config.
		Windwalker::prepareSystemPath($this->config);

		parent::initialise();
	}

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

		/*
		 * Default Providers:
		 * -----------------------------------------
		 * This is some default service providers, we don't recommend to remove them,
		 * But you can replace with yours, Make sure all the needed container key has
		 * registered in your own providers.
		 */
		$providers['event']    = new Provider\EventProvider;
		$providers['database'] = new Provider\DatabaseProvider;
		$providers['lang']     = new Provider\LanguageProvider;
		$providers['cache']    = new Provider\CacheProvider;

		/*
		 * Custom Providers:
		 * -----------------------------------------
		 * You can add your own providers here. If you installed a 3rd party packages from composer,
		 * but this package need some init logic, create a service provider to do it and register them here.
		 */

		// Custom Providers here...

		return $providers;
	}

	/**
	 * registerCommands
	 *
	 * @return  void
	 */
	public function registerCommands()
	{
		parent::registerCommands();

		/*
		 * Register Commands
		 * --------------------------------------------
		 * Register your own commands here, make sure you have call the parent, some important
		 * system command has registered at parent::registerCommands().
		 */

		// Your commands here.
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
		 * If you want a package can be use in every applications (for example: Web and Console),
		 * set it in Windwalker\Windwalker object.
		 */
		$packages = Windwalker::loadPackages();

		/*
		 * Get Packages for This Application
		 * -----------------------------------------
		 * If you want a package only use in this application or want to override a global package,
		 * set it here. Example: $packages[] = new Flower\FlowerPackage;
		 */

		// Your packages here...

		return $packages;
	}

	/**
	 * Prepare execute hook.
	 *
	 * @return  void
	 */
	protected function prepareExecute()
	{
	}

	/**
	 * Pose execute hook.
	 *
	 * @param   mixed  $result  Executed return value.
	 *
	 * @return  mixed
	 */
	protected function postExecute($result = null)
	{
		return $result;
	}

	/**
	 * loadConfiguration
	 *
	 * @param Registry $config
	 *
	 * @throws  \RuntimeException
	 * @return  void
	 */
	protected function loadConfiguration($config)
	{
		Windwalker::loadConfiguration($this->config);
	}
}
