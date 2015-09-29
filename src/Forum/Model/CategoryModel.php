<?php
/**
 * Part of natika project.
 *
 * @copyright  Copyright (C) 2015 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

namespace Forum\Model;

use Admin\Table\Table;
use Phoenix\Model\CrudModel;
use Windwalker\Data\Data;
use Windwalker\DataMapper\RelationDataMapper;

/**
 * The CategoryModel class.
 *
 * @since  {DEPLOY_VERSION}
 */
class CategoryModel extends CrudModel
{
	/**
	 * getLastPost
	 *
	 * @param int $pk
	 *
	 * @return  Data
	 */
	public function getLastPost($pk)
	{
		$mapper = new RelationDataMapper('post', Table::POSTS);
		$mapper->addTable('topic', Table::TOPICS,     'topic.id = post.topic_id')
			->addTable('category', Table::CATEGORIES, 'category.id = topic.category_id')
			->addTable('user',     Table::USERS,      'user.id = post.user_id');

		$post = $mapper->findOne(array('category.id' => $pk), 'post.created DESC');

		return $post;
	}
}
