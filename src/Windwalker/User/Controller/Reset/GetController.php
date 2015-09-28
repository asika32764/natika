<?php
/**
 * Part of Windwalker project.
 *
 * @copyright  Copyright (C) 2014 - 2015 LYRASOFT. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

namespace Windwalker\User\Controller\Reset;

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
		return $this->delegate($this->input->get('task', 'reset'));
	}

	/**
	 * reset
	 *
	 * @return  string
	 */
	protected function reset()
	{
		$view = $this->getView();
		$model = $this->getModel();

		$view['form'] = $model->getForm();
		$view['form']->bind(array(
			'username' => $this->input->getUsername('username'),
			'token' => $this->input->get('token')
		));

		return $view->setLayout('reset')->render();
	}

	/**
	 * complete
	 *
	 * @return  string
	 */
	protected function complete()
	{
		$view = $this->getView();

		return $view->setLayout('complete')->render();
	}
}
