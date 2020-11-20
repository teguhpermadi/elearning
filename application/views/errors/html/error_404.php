<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>AdminLTE 3 | 404 Page not found</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?= config_item('base_url') ?>/node_modules/admin-lte/plugins/fontawesome-free/css/all.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?= config_item('base_url') ?>/node_modules/admin-lte/dist/css/adminlte.min.css">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition login-page">
	<div class="wrapper">
			<!-- Main content -->
			<section class="content">
				<div class="error-page">
					<h2 class="headline text-warning"> 404</h2>

					<div class="error-content">
						<h3><i class="fas fa-exclamation-triangle text-warning"></i> Oops! <?php echo $heading; ?></h3>

						<p>
							<?php echo $message; ?>
							We could not find the page you were looking for.
							Meanwhile, you may <a href="<?= config_item('base_url') ?>">return to dashboard</a> or try using the search form.
						</p>

					</div>
					<!-- /.error-content -->
				</div>
				<!-- /.error-page -->
			</section>
	</div>
	<!-- jQuery -->
	<script src="<?= config_item('base_url') ?>/node_modules/admin-lte/plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap 4 -->
	<script src="<?= config_item('base_url') ?>/node_modules/admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- AdminLTE App -->
	<script src="<?= config_item('base_url') ?>/node_modules/admin-lte/dist/js/adminlte.min.js"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="<?= config_item('base_url') ?>/node_modules/admin-lte/dist/js/demo.js"></script>
</body>

</html>