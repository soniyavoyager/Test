<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>InterCol Admin Console</title>
	<meta name="description" content="The small framework with powerful features">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="shortcut icon" type="image/png" href="<?=base_url()?>/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>/css/bootstrap.min.css">
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" crossorigin="anonymous">
	<meta name="theme-color" content="#7952b3">
	<?= csrf_meta() ?>
	<?= $this->renderSection('styles') ?>
</head>
<body>
	<header>
		<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
			<div class="container">
			<a class="navbar-brand" href="#">InterCol</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item <?=($page_name == 'dashboard') ? 'active':''?>">
						<a class="nav-link" href="<?=base_url()?>/dashboard">Dashboard <span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item <?=($page_name == 'manager') ? 'active':''?>">
						<a class="nav-link" href="<?=base_url('/staffs/list/manager')?>">Managers</a>
					</li>
					<li class="nav-item <?=($page_name == 'supervisor') ? 'active':''?>">
						<a class="nav-link" href="<?=base_url('/staffs/list/supervisor')?>">Supervisors</a>
					</li>
					<li class="nav-item <?=($page_name == 'employees') ? 'active':''?>">
						<a class="nav-link" href="<?=base_url('/employees')?>">Employees</a>
					</li>
					<li class="nav-item <?=($page_name == 'jobs') ? 'active':''?>">
						<a class="nav-link" href="<?=base_url('/jobs')?>">Job Types</a>
					</li>
					<li class="nav-item <?=($page_name == 'materials') ? 'active':''?>">
						<a class="nav-link" href="<?=base_url('/materials')?>">Materials</a>
					</li>
					
				</ul>
				<ul class="navbar-nav float-right">
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?=session('_admin_name')?></a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="<?=base_url()?>/home/logout">Logout</a>
						</div>
					</li>
				</ul>
			</div>
			</div>
		</nav>
	</header>
	<div class="container">
		<p></p>
		<?php if (session('flash_result')):?>
		<div class="alert alert-<?=session('flash_result')?>">
		  <strong>Success!</strong> <?=session('flash_message')?>
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>
		<?php endif;?>
		<?= $this->renderSection('content') ?>
		<p>&nbsp;</p>
	</div>
	<footer>
		<p>&nbsp;</p>
	</footer>
	<script>
	var base_url = "<?=base_url()?>";
	</script>
	<script src="<?=base_url()?>/js/jquery-3.5.1.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="<?=base_url()?>/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
	<?= $this->renderSection('bootstrap_modals') ?>
	<?= $this->renderSection('scripts') ?>
</body>
</html>