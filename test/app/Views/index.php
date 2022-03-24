<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>InterCo Admin Console</title>
	<meta name="description" content="The small framework with powerful features">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="shortcut icon" type="image/png" href="<?=base_url()?>/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>/css/bootstrap.min.css">
	<meta name="theme-color" content="#7952b3">
	<?= csrf_meta() ?>
</head>
<body>
	<div class="container">
		<div class="row justify-content-md-center align-self-center">
			<div class="col-4" style="margin-top: 4rem;">
				<h1 class="h3 mb-4 font-weight-normal">Please sign in</h1>
				<?php if (session('error')):?>
				<div class="alert alert-danger"><?=session('error')?></div>
				<?php endif;?>
				<?php echo form_open('home/login', ['method' => 'post', 'id' => 'form-admin-login']);?>
					<div class="form-group">
						<label for="inputEmail" class="sr-only">Username</label>
						<input type="text" id="admin_name" name="admin_name" class="form-control form-control-lg" placeholder="Username" required autofocus>
						<?php if (isset($validation)):?>
						<div class="form-text text-danger small"><?=$validation->showError('admin_name')?></div>
						<?php endif;?>
					</div>
					<div class="form-group">
						<label for="inputPassword" class="sr-only">Password</label>
						<input type="password" id="admin_pass" name="admin_pass" class="form-control form-control-lg" placeholder="Password" required>
						<?php if (isset($validation)):?>
						<div class="form-text text-danger small"><?=$validation->showError('admin_pass')?></div>
						<?php endif;?>
					</div>
					<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
					<input type="hidden" name="admin_login" value="1">
				<?php echo form_close();?>
			</div>
		</div>
	</div>

	<script src="<?=base_url()?>/js/jquery.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="<?=base_url()?>/js/bootstrap.min.js"></script>
</body>
</html>
