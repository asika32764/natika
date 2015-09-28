<?php
/**
 * Part of Windwalker project.
 *
 * @copyright  Copyright (C) 2014 - 2015 LYRASOFT. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

$this->extend('_global.html');

?>
<?php $this->block('style'); ?>
	<link rel="stylesheet" href="<?php echo $data->uri['media.path']; ?>css/acme/page.css" />
	<style>
		.forgot-form {
			margin: 80px 0;
		}
	</style>
<?php $this->endblock(); ?>

<?php $this->block('page_title'); ?>Reset Confirm<?php $this->endblock(); ?>

<?php $this->block('content'); ?>
	<div class="container">
		<div class="row forgot-form">
			<div class="col-md-6 col-md-offset-3">
				<form action="<?php echo $data->router->html('forgot', array('task' => 'confirm')); ?>" class="form-horizontal" method="post">
					<fieldset>
						<legend>Reset Confirm</legend>
						<?php echo \Windwalker\Core\Frontend\Bootstrap::renderFields($data->form->getFields('confirm')); ?>

						<div class="buttons col-md-offset-3">
							<p>
								<button class="btn btn-primary" type="submit">Confirm</button>
							</p>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
	</div>
<?php $this->endblock(); ?>
