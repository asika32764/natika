<?php
/**
 * Part of starter project.
 *
 * @copyright  Copyright (C) 2015 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later;
 */

$this->extend('_global.html');
?>

<?php $this->block('navbar'); ?>

<?php $this->endblock(); ?>

<?php $this->block('content'); ?>
<style>
	footer {
		text-align: center;
	}
</style>
<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3 text-center" style="margin-top: 50px; margin-bottom: 70px">
			<img src="https://cloud.githubusercontent.com/assets/1639206/2870854/176b987a-d2e4-11e3-8be6-9f70304a8499.png" alt="img" />
			<h2>Site Offline</h2>
			<p>Sorry, we are maintaining, please come back later.</p>
		</div>
	</div>
</div>
<?php $this->endblock(); ?>
