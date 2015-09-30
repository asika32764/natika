<?php
/**
 * Part of natika project.
 *
 * @copyright  Copyright (C) 2015 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

namespace Forum\Helper;

use Joomla\DateTime\DateInterval;
use Joomla\DateTime\DateTime;
use Joomla\DateTime\DateTimeRange;
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

		$compare = DateTime::now();
		$compare = $compare->subDays(30);

		if ($date->isBefore($compare))
		{
			return $date->format('l, d F Y');
		}

		return $now->since($date);
	}
}
