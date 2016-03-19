<?php
/**
 * Part of Windwalker project.
 *
 * @copyright  Copyright (C) 2014 - 2015 LYRASOFT. All rights reserved.
 * @license    GNU Lesser General Public License version 3 or later. see LICENSE
 */

namespace Windwalker\Web;

use Symfony\Component\Yaml\Yaml;
use Windwalker\Core\Application\WebApplication;
use Windwalker\Core\Provider;
use Windwalker\DI\ServiceProviderInterface;
use Windwalker\Filesystem\Folder;
use Windwalker\Ioc;
use Windwalker\Listener\SystemListener;
use Windwalker\Registry\Registry;
use Windwalker\User\UserPackage;
use Windwalker\Windwalker;

/**
 * Class Application
 *
 * @since 2.0
 */
class Application extends WebApplication
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

		// Prepare a system listener then you can add custom logic in it.
		$this->getDispatcher()->addListener(new SystemListener);

		// Start session
		$this->container->get('system.session')->start();
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
		$providers = array_merge($providers, (array) Ioc::getConfig()->get('providers'));

		/*
		 * Default Providers:
		 * -----------------------------------------
		 * This is some default service providers, we don't recommend to remove them,
		 * But you can replace with yours, Make sure all the needed container key has
		 * registered in your own providers.
		 */
		$providers['debug']    = new Provider\WhoopsProvider;
		$providers['datetime'] = new Provider\DateTimeProvider;
		// $providers['logger']   = new Provider\LoggerProvider;
		// $providers['event']    = new Provider\EventProvider;
		// $providers['database'] = new Provider\DatabaseProvider;
		// $providers['router']   = new Provider\RouterProvider;
		// $providers['lang']     = new Provider\LanguageProvider;
		// $providers['cache']    = new Provider\CacheProvider;
		// $providers['session']  = new Provider\SessionProvider;
		// $providers['auth']     = new Provider\AuthenticationProvider;
		// $providers['security'] = new Provider\SecurityProvider;
		// $providers['profiler'] = new Provider\ProfilerProvider;

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
		$packages = array_merge($packages, (array) Ioc::getConfig()->get('packages'));

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
	 * @return  mixed
	 */
	protected function postExecute()
	{
	}

	/**
	 * loadConfiguration
	 *
	 * @param Registry $config
	 *
	 * @throws  \RuntimeException
	 * @return  void
	 */
	protected function loadConfiguration(Registry $config)
	{
		Windwalker::loadConfiguration($config);
	}

	/**
	 * loadRoutingConfiguration
	 *
	 * @return  mixed
	 */
	protected function loadRoutingConfiguration()
	{
		$routes = Windwalker::loadRouting();

		$packages = (array) $this->get('package');

		foreach ($packages as $name => $class)
		{
			$routes[$name] = array(
				'pattern' => '/' . $name,
				'package' => $name
			);
		}

		return $routes;
	}
}
