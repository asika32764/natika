<?php
/**
 * Part of Windwalker project.
 *
 * @copyright  Copyright (C) 2014 - 2015 LYRASOFT. All rights reserved.
 * @license    GNU Lesser General Public License version 3 or later.
 */

namespace Windwalker\User\Controller\Registration;

use Windwalker\Core\Controller\Controller;
use Windwalker\Core\Router\Router;
use Windwalker\User\Model\RegistrationModel;

/**
 * The GetController class.
 * 
 * @since  2.1.1
 */
class SaveController extends Controller
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
		$model = new RegistrationModel;

		$user = $this->input->getVar('registration');

		$form = $model->getForm();

		$form->bind($user);

		if (!$form->validate())
		{
			$results = $form->getErrors();

			foreach ($results as $result)
			{
				$this->addFlash($result->getMessage(), 'danger');
			}

			$this->setRedirect($this->package->router->http('login'));

			return false;
		}

		try
		{
			$model->register($user);
		}
		catch (\Exception $e)
		{
			if (WINDWALKER_DEBUG)
			{
				$this->addFlash($e->getMessage(), 'danger');
			}

			$this->setRedirect($this->package->router->http('registration'), 'Save fail.');

			return false;
		}

		$this->setRedirect('login', 'Register success', 'success');

		return true;
	}
}
 