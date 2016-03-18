<?php
/**
 * Part of natika project.
 *
 * @copyright  Copyright (C) 2015 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

namespace Forum\View\Post;

use Phoenix\Html\HtmlHeader;
use Phoenix\View\EditView;
use Windwalker\String\Utf8String;

/**
 * The PostHtmlView class.
 *
 * @since  {DEPLOY_VERSION}
 */
class PostHtmlView extends EditView
{
	/**
	 * prepareData
	 *
	 * @param \Windwalker\Data\Data $data
	 *
	 * @return  void
	 */
	protected function prepareData($data)
	{
		$data->topic = $this->model['topic']->getItem($data->item->topic_id);
		$data->category = $this->model['category']->getItem($data->topic->category_id);
	}

	/**
	 * setTitle
	 *
	 * @param string $title
	 *
	 * @return  static
	 */
	public function setTitle($title = 'Edit Post')
	{
		return parent::setTitle($title);
	}
}
