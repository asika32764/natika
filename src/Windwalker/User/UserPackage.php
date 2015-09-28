<?php
/**
 * Part of Windwalker project.
 *
 * @copyright  Copyright (C) 2014 - 2015 LYRASOFT. All rights reserved.
 * @license    GNU Lesser General Public License version 3 or later.
 */

namespace Windwalker\User;

use Windwalker\Core\Authentication\User;
use Windwalker\Core\Language\Translator;
use Windwalker\Core\Package\AbstractPackage;
use Windwalker\User\User\UserHandler;

/**
 * The UserPackage class.
 * 
 * @since  2.1.1
 */
class UserPackage extends AbstractPackage
{
	/**
	 * Property name.
	 *
	 * @var  string
	 */
	protected $name = 'user';

	/**
	 * initialise
	 *
	 * @return  void
	 */
	public function initialise()
	{
		parent::initialise();

		Translator::load('main', $this);

		User::setHandler(new UserHandler);
	}
}
 