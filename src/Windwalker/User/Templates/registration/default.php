<?php
/**
 * Part of Windwalker project.
 *
 * @copyright  Copyright (C) 2014 - 2015 LYRASOFT. All rights reserved.
 * @license    GNU Lesser General Public License version 3 or later.
 */

/**
 * @var \Windwalker\Data\Data $data
 */
$root = $data->uri['base.path'];

$this->extend('_global.html');
?>

<?php $this->block('style'); ?>
<link rel="stylesheet" href="<?php echo $root; ?>media/css/acme/page.css" />
<style>
	.registration-form {
		margin: 80px 0;
	}
</style>
<?php $this->endblock(); ?>

<?php $this->block('page_title'); ?>Registration<?php $this->endblock(); ?>

<?php $this->block('content'); ?>
<div class="container">
	<div class="row registration-form">
		<div class="col-md-6 col-md-offset-3">
			<form action="<?php echo $data->uri['current']; ?>" class="form-horizontal" method="post">
				<fieldset>
					<legend>Registration</legend>

					<?php echo \Windwalker\Core\Frontend\Bootstrap::renderFields($data->form->getFields()); ?>

					<div class="buttons col-md-offset-3">
						<button class="btn btn-primary" type="submit">Register</button>
					</div>
				</fieldset>
			</form>
		</div>
	</div>
</div>
<?php $this->endblock(); ?>

