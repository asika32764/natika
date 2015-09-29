@extends('_global.html')

@section('style')
<link rel="stylesheet" href="<?php echo $uri['media.path']; ?>css/acme/page.css" />
<style>
	.login-form {
		margin: 80px 0;
	}
</style>
@stop

@section('content')
<div class="container">
	<div class="row login-form">
		<div class="col-md-6 col-md-offset-3">
			<form action="<?php echo $uri['current']; ?>" class="form-horizontal" method="post">
				<fieldset>
					<legend>LOGIN</legend>
					<?php echo \Windwalker\Core\Frontend\Bootstrap::renderFields($form->getFields()); ?>

					<div class="buttons col-md-offset-3">
						<p>
							<button class="btn btn-primary" type="submit">Login</button>
							<a class="btn btn-default" href="<?php echo $router->html('registration'); ?>">Register</a>
						</p>

						<ul>
							<li><a href="<?php echo $router->html('forgot'); ?>">Forgot Password</a></li>
						</ul>
					</div>
				</fieldset>
			</form>
		</div>
	</div>
</div>
@stop
