<?php
/**
 * Part of Windwalker project.
 *
 * @copyright  Copyright (C) 2014 - 2015 LYRASOFT. All rights reserved.
 * @license    GNU Lesser General Public License version 3 or later.
 */

namespace Windwalker\User\Controller\Login;

use Windwalker\Core\Controller\Controller;
use Windwalker\User\Model\LoginModel;
use Windwalker\User\View\Login\LoginHtmlView;

/**
 * The GetController class.
 * 
 * @since  2.1.1
 */
class IndexController extends Controller
{
	/**
	 * Execute the controller.
	 *
	 * @return  mixed Return executed result.
	 *
	 * @throws  \LogicException
	 * @throws  \RuntimeException
	 */
	public function doExecute()
	{
		$model = new LoginModel;

		$view = $this->getView();

		$view['form'] = $model->getForm();

		return $view->render();
	}
}
