<?php
/**
 * Part of Windwalker project. 
 *
 * @copyright  Copyright (C) 2014 - 2015 LYRASOFT. All rights reserved.
 * @license    GNU Lesser General Public License version 3 or later.
 */

$flashes = $data->flashes;

?>
<div class="message-wrap">
<?php foreach ((array) $flashes as $type => $typeBag): ?>
	<div class="alert alert-<?php echo $type ?> alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert">
		  <span aria-hidden="true">&times;</span>
		  <span class="sr-only">Close</span>
		</button>

	<?php foreach ((array) $typeBag as $msg): ?>
		<p><?php echo $msg; ?></p>
	<?php endforeach; ?>

	</div>
<?php endforeach; ?>
</div>
