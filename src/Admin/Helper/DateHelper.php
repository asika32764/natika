<?php
/**
 * Part of natika project.
 *
 * @copyright  Copyright (C) 2015 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

namespace Admin\Helper;

use Joomla\DateTime\DateTime;
use Windwalker\Core\View\Helper\AbstractHelper;

/**
 * The DateHelper class.
 *
 * @since  {DEPLOY_VERSION}
 */
class DateHelper extends AbstractHelper
{
	/**
	 * since
	 *
	 * @param   string|DateTime $date
	 *
	 * @return  string
	 */
	public function since($date)
	{
		if (!$date instanceof DateTime)
		{
			$date = new DateTime($date);
		}

		$now = DateTime::now();

		return $now->since($date);
	}
}
