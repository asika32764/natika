<?php
/**
 * Part of Admin project.
 *
 * @copyright  Copyright (C) 2016 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

namespace Admin\View\Posts;

use Phoenix\Script\BootstrapScript;
use Phoenix\Script\PhoenixScript;
use Phoenix\View\GridView;

/**
 * The PostsHtmlView class.
 * 
 * @since  1.0
 */
class PostsHtmlView extends GridView
{
	/**
	 * Property name.
	 *
	 * @var  string
	 */
	protected $name = 'posts';

	/**
	 * The fields mapper.
	 *
	 * @var  array
	 */
	protected $fields = array(
		'pk'          => 'id',
		'title'       => 'title',
		'alias'       => 'alias',
		'state'       => 'state',
		'ordering'    => 'ordering',
		'author'      => 'created_by',
		'author_name' => 'user_name',
		'created'     => 'created',
		'language'    => 'language',
		'lang_title'  => 'lang_title'
	);

	/**
	 * The grid config.
	 *
	 * @var  array
	 */
	protected $gridConfig = array(
		'order_column' => 'post.ordering'
	);

	/**
	 * prepareData
	 *
	 * @param \Windwalker\Data\Data $data
	 *
	 * @return  void
	 */
	protected function prepareData($data)
	{
		$this->prepareScripts();
	}

	/**
	 * prepareDocument
	 *
	 * @return  void
	 */
	protected function prepareScripts()
	{
		PhoenixScript::core();
		PhoenixScript::grid();
		PhoenixScript::chosen();
		PhoenixScript::multiSelect('#admin-form table', array('duration' => 100));
		BootstrapScript::checkbox(BootstrapScript::GLYPHICONS);
		BootstrapScript::tooltip();
	}

	/**
	 * setTitle
	 *
	 * @param string $title
	 *
	 * @return  static
	 */
	public function setTitle($title = null)
	{
		return parent::setTitle($title);
	}
}
