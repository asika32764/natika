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
 * @since  2.1.1
 */
class StarterInstaller
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
		$io = $event->getIO();

		static::genSecretCode($io);

		static::genSecretConfig($io);

		// Complete
		$io->write('Install complete.');
	}

	/**
	 * Generate secret code.
	 *
	 * @param IOInterface $io
	 *
	 * @return  void
	 */
	protected static function genSecretCode(IOInterface $io)
	{
		$file = __DIR__ . '/../../../etc/config.yml';

		$config = file_get_contents($file);

		$hash = 'Natika-' . uniqid();

		$salt = $io->ask("\nSalt to generate secret [{$hash}]: ", $hash);

		$config = str_replace("'This-token-is-not-safe'", md5(uniqid() . $salt), $config);

		file_put_contents($file, $config);

		$io->write('Auto created secret key.');
	}

	/**
	 * Generate database config. will store in: etc/secret.yml.
	 *
	 * @param IOInterface $io
	 *
	 * @return  void
	 */
	protected static function genSecretConfig(IOInterface $io)
	{
		$etc = __DIR__ . '/../../../etc';
		$secret = Yaml::parse(file_get_contents($etc . '/secret.dist.yml'));

		$driver = 'mysql';
		$host   = $io->ask("Database host [localhost]: ", 'localhost');
		$name   = $io->ask("Database name [natika]: ", 'natika');
		$user   = $io->ask("Database user [root]: ", 'root');
		$pass   = $io->askAndHideAnswer("Database password: ");
		$prefix = '';

		$secret['database'] = array(
			'driver'   => $driver,
			'host'     => $host,
			'user'     => $user,
			'password' => $pass,
			'name'     => $name,
			'prefix'   => $prefix
		);

		file_put_contents($etc . '/secret.yml', Yaml::dump($secret, 4));

		$io->write('');
		$io->write('Database config setting complete.');
		$io->write('');
	}
}
