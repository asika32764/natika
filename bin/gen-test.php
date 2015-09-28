<?php
/**
 * Part of Windwalker project.
 *
 * @copyright  Copyright (C) 2014 - 2015 LYRASOFT. All rights reserved.
 * @license    GNU Lesser General Public License version 3 or later.
 */

use Windwalker\Application\AbstractCliApplication;
use Windwalker\Filesystem\Path;
use Windwalker\String\StringNormalise;
use Windwalker\Utilities\Reflection\ReflectionHelper;

include_once __DIR__ . '/../vendor/autoload.php';

define('WINDWALKER_ROOT', realpath(__DIR__ . '/..'));
define('WINDWALKER_CORE_ROOT', realpath(__DIR__ . '/../vendor/windwalker/core'));

/**
 * Class GenTest
 *
 * @since 1.0
 */
class GenTest extends AbstractCliApplication
{
	/**
	 * Property lastOutput.
	 *
	 * @var  mixed
	 */
	protected $lastOutput = null;

	/**
	 * Property lastReturn.
	 *
	 * @var  mixed
	 */
	protected $lastReturn = null;

	/**
	 * Method to run the application routines.  Most likely you will want to instantiate a controller
	 * and execute it, or perform some sort of task directly.
	 *
	 * @return  void
	 *
	 * @since   1.0
	 */
	protected function doExecute()
	{
		// $package = $this->io->getArgument(0);
		$class   = $this->io->getArgument(0);
		$class   = StringNormalise::toClassNamespace($class);
		$core    = $this->io->getOption('core');

		if (!class_exists($class))
		{
			$this->stop('Class not exists: ' . $class);
		}

		$root = $core ? WINDWALKER_CORE_ROOT : WINDWALKER_ROOT;

		$classPath     = ReflectionHelper::getPath($class);
		$testPath      = $root . DIRECTORY_SEPARATOR . 'src/Test';
		$testClass     = $this->io->getArgument(1, ReflectionHelper::getShortName($class) . 'Test');
		$testClass     = StringNormalise::toClassNamespace($testClass);
		$testFile      = $testPath . DIRECTORY_SEPARATOR . Path::clean($testClass) . '.php';
		$realTestClass = $testClass;
		$autoload      = WINDWALKER_ROOT . '/vendor/autoload.php';

		echo $command = sprintf(
			'vendor/phpunit/phpunit-skeleton-generator/phpunit-skelgen generate-test --bootstrap="%s" %s %s %s %s',
			$autoload,
			$class,
			$classPath,
			$realTestClass,
			$testFile
		);
// die;
		$command = 'php ' . WINDWALKER_ROOT . '/' . $command;

		if (!defined('PHP_WINDOWS_VERSION_MAJOR'))
		{
			// Replace '\' to '\\' in MAC
			$command = str_replace('\\', '\\\\', $command);
		}

		\Windwalker\Filesystem\Folder::create(dirname($testFile));

		$this->exec($command);
	}

	/**
	 * getPackagePath
	 *
	 * @param string $class
	 * @param string $classPath
	 *
	 * @return  void
	 */
	protected function getPackagePath($class, $classPath)
	{
		$classFile = Path::clean($class) . '.php';
		$classFile = substr($classFile, 11);
		$this->out($classFile);
		$this->out($classPath);
		$packagePath = str_replace($classFile, '', $classPath);
		$this->out($packagePath);
		print_r($classFile);
	}

	/**
	 * Exec a command.
	 *
	 * @param string $command
	 * @param array  $arguments
	 * @param array  $options
	 *
	 * @return  string
	 */
	protected function exec($command, $arguments = array(), $options = array())
	{
		$arguments = implode(' ', (array) $arguments);
		$options   = implode(' ', (array) $options);
		$command   = sprintf('%s %s %s', $command, $arguments, $options);

		$this->out('>> ' . $command);

		$return = exec(trim($command), $this->lastOutput, $this->lastReturn);

		$this->out($return);
	}

	/**
	 * stop
	 *
	 * @param string $msg
	 *
	 * @return  void
	 */
	protected function stop($msg = null)
	{
		if ($msg)
		{
			$this->out($msg);
		}

		$this->close();
	}
}

$app = new GenTest;
$app->execute();