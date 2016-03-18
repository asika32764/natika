<?php
/**
 * Part of natika project.
 *
 * @copyright  Copyright (C) 2016 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

namespace Forum\View\Article;

use Phoenix\Html\HtmlHeader;
use Windwalker\String\Utf8String;

/**
 * The ArticleHtmlView class.
 *
 * @since  {DEPLOY_VERSION}
 */
class ArticleHtmlView extends \Lyrasoft\Luna\View\Article\ArticleHtmlView
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
		parent::prepareData($data);

		$desc = $data->item->body;
		$desc = Utf8String::substr(strip_tags($desc), 0, 150);

		HtmlHeader::addMetadata('description', $desc, true);
		HtmlHeader::addOpenGraph('og:title', HtmlHeader::getPageTitle(), true);
		HtmlHeader::addOpenGraph('og:description', $desc, true);
		HtmlHeader::addOpenGraph('og:image', $data->item->image, true);
	}
}
