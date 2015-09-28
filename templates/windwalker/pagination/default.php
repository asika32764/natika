<?php
/**
 * Part of Windwalker project.
 *
 * @copyright  Copyright (C) 2014 - 2015 LYRASOFT. All rights reserved.
 * @license    GNU Lesser General Public License version 3 or later.
 */

use Windwalker\Core\Pagination\PaginationResult;
use Windwalker\Core\Router\Router;
use Windwalker\Data\Data;

/**
 * @var Data             $data
 * @var PaginationResult $pagination
 * @var string           $route
 */
$pagination = $data->pagination;
$route = $data->route;
?>
<style>
	.pagination .glyphicon {
		line-height: inherit;
	}
</style>
<ul class="pagination windwalker-pagination">
	<?php if ($pagination->getFirst()): ?>
		<li>
			<a href="<?php echo $route(array('page' => $pagination->getFirst())); ?>">
				<span class="glyphicon glyphicon-fast-backward"></span>
				<span class="sr-only">First</span>
			</a>
		</li>
	<?php endif; ?>

	<?php if ($pagination->getPrevious()): ?>
		<li>
			<a href="<?php echo $route(array('page' => $pagination->getPrevious())); ?>">
				<span class="glyphicon glyphicon-backward"></span>
				<span class="sr-only">Previous</span>
			</a>
		</li>
	<?php endif; ?>

	<?php if ($pagination->getLess()): ?>
		<li>
			<a href="<?php echo $route(array('page' => $pagination->getLess())); ?>">
				Less
			</a>
		</li>
	<?php endif; ?>

	<?php foreach ($pagination->getPages() as $k => $page): ?>
		<?php $active = ($page == 'current') ? 'active' : ''; ?>
		<li class="<?php echo $active; ?>">
			<?php if (!$active): ?>
				<a href="<?php echo $route(array('page' => $k)); ?>">
					<?php echo $k; ?>
				</a>
			<?php else: ?>
				<a href="javascript:void(0);">
					<?php echo $k; ?>
				</a>
			<?php endif; ?>
		</li>
	<?php endforeach; ?>

	<?php if ($pagination->getMore()): ?>
		<li>
			<a href="<?php echo $route(array('page' => $pagination->getMore())); ?>">
				More
			</a>
		</li>
	<?php endif; ?>

	<?php if ($pagination->getNext()): ?>
		<li>
			<a href="<?php echo $route(array('page' => $pagination->getNext())); ?>">
				<span class="glyphicon glyphicon-forward"></span>
				<span class="sr-only">Next</span>
			</a>
		</li>
	<?php endif; ?>

	<?php if ($pagination->getLast()): ?>
		<li>
			<a href="<?php echo $route(array('page' => $pagination->getLast())); ?>">
				<span class="glyphicon glyphicon-fast-forward"></span>
				<span class="sr-only">Last</span>
			</a>
		</li>
	<?php endif; ?>
</ul>
