<?php
/**
 * Part of natika project.
 *
 * @copyright  Copyright (C) 2015 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

namespace Natika\Markdown;

use Parsedown;

/**
 * The Markdown class.
 *
 * @since  {DEPLOY_VERSION}
 */
class Markdown
{
	/**
	 * Property markdown.
	 *
	 * @var  Parsedown
	 */
	protected static $markdown;

	/**
	 * render
	 *
	 * @param   string  $txt
	 *
	 * @return  string
	 */
	public static function render($txt)
	{
		return static::getMarkdown()->text($txt);
	}

	/**
	 * Method to get property Markdown
	 *
	 * @return  Parsedown
	 */
	public static function getMarkdown()
	{
		if (!static::$markdown)
		{
			static::$markdown = new Parsedown;
		}

		return static::$markdown;
	}

	/**
	 * Method to set property markdown
	 *
	 * @param   mixed $markdown
	 *
	 * @return  void
	 */
	public static function setMarkdown($markdown)
	{
		static::$markdown = $markdown;
	}
}
