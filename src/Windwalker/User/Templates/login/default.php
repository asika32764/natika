<?php
/**
 * Part of Windwalker project.
 *
 * @copyright  Copyright (C) 2014 - 2015 LYRASOFT. All rights reserved.
 * @license    GNU Lesser General Public License version 3 or later.
 */

$root = $data->uri['base.path'];

$this->extend('_global.html');

?>
<?php $this->block('style'); ?>
<link rel="stylesheet" href="<?php echo $data->uri['media.path']; ?>css/acme/page.css" />
<style>
	.login-form {
		margin: 80px 0;
	}
</style>
<?php $this->endblock(); ?>

<?php $this->block('page_title'); ?>Login<?php $this->endblock(); ?>

<?php $this->block('content'); ?>
<div class="container">
	<div class="row login-form">
		<div class="col-md-6 col-md-offset-3">
			<form action="<?php echo $data->uri['current']; ?>" class="form-horizontal" method="post">
				<fieldset>
					<legend>LOGIN</legend>
					<?php echo \Windwalker\Core\Frontend\Bootstrap::renderFields($data->form->getFields()); ?>

					<div class="buttons col-md-offset-3">
						<p>
							<button class="btn btn-primary" type="submit">Login</button>
							<a class="btn btn-default" href="<?php echo $data->router->html('registration'); ?>">Register</a>
						</p>

						<ul>
							<li><a href="<?php echo $data->router->html('forgot'); ?>">Forgot Password</a></li>
						</ul>
					</div>
				</fieldset>
			</form>
		</div>
	</div>
</div>
<?php $this->endblock(); ?>
