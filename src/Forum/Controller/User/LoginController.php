<?php
/**
 * Part of natika project.
 *
 * @copyright  Copyright (C) 2015 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

namespace Forum\Controller\User;

use Phoenix\Controller\AbstractPhoenixController;
use Windwalker\Core\Authentication\User;
use Windwalker\Core\Router\Router;
use Windwalker\Crypt\CryptHelper;
use Windwalker\Data\Data;
use Windwalker\Http\HttpClient;
use Windwalker\Registry\Registry;

/**
 * The GetController class.
 *
 * @since  {DEPLOY_VERSION}
 */
class LoginController extends AbstractPhoenixController
{
	/**
	 * doExecute
	 *
	 * @return  mixed
	 */
	protected function doExecute()
	{
		return $this->delegate($this->input->get('task', 'login'));
	}

	/**
	 * doExecute
	 *
	 * @return  mixed
	 */
	protected function login()
	{
		$state = md5(CryptHelper::genRandomBytes());
		$this->setUserState('github.state', $state);
		$this->setUserState('github.access_token', null);

		if ($return = $this->input->getString('return'))
		{
			$this->setUserState('uri.return', base64_decode($return));
		}

		$params = array(
			'client_id' => $this->app->get('github.id'),
			'redirect_uri' => $this->router->http('login', array('task' => 'token'), Router::TYPE_FULL),
			'scope' => 'user',
			'state' => $state
		);

		$this->setRedirect('https://github.com/login/oauth/authorize?' . http_build_query($params));

		return true;
	}

	/**
	 * token
	 *
	 * @return  bool
	 */
	protected function token()
	{
		$state = $this->input->get('state');

		if (!$state || $this->getUserState('github.state') != $state)
		{
			$this->setRedirect($this->router->html('home'));

			return true;
		}

		$queries = array(
			'client_id'     => $this->app->get('github.id'),
			'client_secret' => $this->app->get('github.secret'),
			'redirect_uri'  => $this->router->http('login', array('task' => 'token'), Router::TYPE_FULL),
			'state'         => $this->getUserState('github.state'),
			'code'          => $this->input->get('code')
		);

		$response = $this->request('POST', 'https://github.com/login/oauth/access_token', $queries);

		$this->setUserState('github.access_token', $response['access_token']);

		$user = $this->request('GET', 'https://api.github.com/user');

		$user = $user->toArray();

		if (isset($user['login']))
		{
			$user['username'] = $user['login'];
		}

		$user = $this->saveUser($user);

		$user->bind(User::get(array('username' => $user->username)));

		User::makeUserLogin($user);

		$return = $this->getUserState('uri.return');

		if (!$return)
		{
			$return = $this->router->http('home');
		}

		$this->setRedirect($return, 'Login success');

		return true;
	}

	/**
	 * request
	 *
	 * @param        $method
	 * @param string $url
	 * @param array  $queries
	 * @param array  $headers
	 *
	 * @return Registry
	 */
	protected function request($method, $url, $queries = array(), $headers = array())
	{
		$http = new HttpClient;

		$token = $this->getUserState('github.access_token');

		if ($token)
		{
			$headers['Authorization'] = 'Bearer ' . $token;
		}

		$headers['Accept'] = 'application/json';
		$headers['User-Agent'] = 'Awesome-Octocat-App';

		$response = $http->request($method, $url, $queries, $headers)->getBody()->getContents();

		return new Registry($response);
	}

	/**
	 * saveUser
	 *
	 * @param array $user
	 *
	 * @return  array
	 */
	protected function saveUser($user)
	{
		$model = $this->getModel('User');

		$user = new Data($user);

		$data = $model->getItem(array('username' => $user['login']));

		$data['username'] = $user['login'];
		$data['name']     = $user['name'];
		$data['email']    = $user['email'];
		$data['avatar']   = $user['avatar_url'];
		$data['params']   = json_encode(array('raw_data' => $user));

		$model->save($data);

		$user['id'] = $model['item.pk'];

		return $user;
	}
}
