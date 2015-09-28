<?php
/**
 * Part of Windwalker project.
 *
 * @copyright  Copyright (C) 2014 - 2015 LYRASOFT. All rights reserved.
 * @license    GNU General Public License version 2 or later;
 */

$this->extend('_global.html');

?>
<?php $this->block('style'); ?>
	<link rel="stylesheet" href="<?php echo $data->uri['media.path']; ?>css/acme/page.css" />
	<style>
		.reset-form {
			margin: 80px 0;
		}
	</style>
<?php $this->endblock(); ?>

<?php $this->block('page_title'); ?>Reset Complete<?php $this->endblock(); ?>

<?php $this->block('content'); ?>
	<div class="container">
		<div class="row reset-form">
			<div class="col-md-6 col-md-offset-3">
				<form action="<?php echo $data->router->html('reset', array('task' => 'reset')); ?>" class="form-horizontal" method="post">
					<fieldset>
						<legend>Reset Complete</legend>

						<p>
							Congrats, you successfully reset password.
						</p>

						<div class="buttons">
							<p>
								<a class="btn btn-primary btn-block" href="<?php echo $data->router->html('login'); ?>">Login</a>
							</p>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
	</div>
<?php $this->endblock(); ?>