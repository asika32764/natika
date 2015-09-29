<?php
/**
 * Part of natika project.
 *
 * @copyright  Copyright (C) 2015 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

namespace Forum\View\Post;

use Phoenix\View\EditView;

/**
 * The PostHtmlView class.
 *
 * @since  {DEPLOY_VERSION}
 */
class PostHtmlView extends EditView
{
	public function setTitle($title = 'Post')
	{
		return parent::setTitle($title);
	}
}
