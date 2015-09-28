<?php
/**
 * Part of Windwalker project.
 *
 * @copyright  Copyright (C) 2014 - 2015 LYRASOFT. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

namespace Windwalker\User\Controller\Forgot;

use Windwalker\Core\Controller\Controller;

/**
 * The GetController class.
 * 
 * @since  2.1.1
 */
class GetController extends Controller
{
	/**
	 * doExecute
	 *
	 * @return  mixed
	 */
	protected function doExecute()
	{
		return $this->delegate($this->input->get('task', 'request'));
	}

	/**
	 * request
	 *
	 * @return  string
	 */
	protected function request()
	{
		$model = $this->getModel();

		$view = $this->getView();

		$view['form'] = $model->getForm();

		return $view->setLayout('request')->render();
	}

	/**
	 * confirm
	 *
	 * @return  string
	 */
	protected function confirm()
	{
		$token = $this->input->get('token');

		$view = $this->getView();
		$model = $this->getModel();

		$view['token'] = $token;
		$view['form'] = $model->getForm();
		$view['form']->bind(array('token' => $token));

		return $view->setLayout('confirm')->render();
	}
}
