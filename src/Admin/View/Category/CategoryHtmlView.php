<?php
/**
 * Part of natika project.
 *
 * @copyright  Copyright (C) 2016 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

namespace Admin\View\Category;

use Phoenix\Script\JQueryScript;

/**
 * The CategoryHtmlView class.
 *
 * @since  {DEPLOY_VERSION}
 */
class CategoryHtmlView extends \Lyrasoft\Luna\Admin\View\Category\CategoryHtmlView
{
	/**
	 * prepareScripts
	 *
	 * @return  void
	 */
	protected function prepareScripts()
	{
		parent::prepareScripts();

		JQueryScript::colorPicker('#input-item-params-bg_color');
	}
}
