<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

global $app;
$this->load->config('app',TRUE);
$this->app = $this->config->item('application','app');

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
	<link rel="icon" type="image/png" href="../assets/img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>
		<?php echo $this->app['name'];?>
	</title>
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
		name='viewport' />
	<!--     Fonts and icons     -->
	<link rel="stylesheet" type="text/css"
		href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
	<!-- Material Kit CSS -->
	<link href="<?php echo base_url('assets/css/material-dashboard.css?v=2.1.0');?>" rel="stylesheet" />
</head>

<body class="dark-edition">

	<div class="container">
		<div class="row justify-content-center">
			<divc class="col-lg-6">
				<div class="p-5">
					<div class="text-center">
						<h1 class="h4 text-light">Webase connect</h1>
					</div>
					<?php echo form_open('auth/login');?>

					<div class="form-group">

						<input type="text" class="form-control form-control-user" id="username" name="username"
							placeholder="Username">
					</div>
					<div class="form-group">

						<input type="password" class="form-control form-control-user" id="password" name="password"
							placeholder="Password">
					</div>
					<div class="form-group">
						<div class="custom-control custom-checkbox small">
							<input type="checkbox" class="custom-control-input" id="remember">
							<label class="custom-control-label" for="remember">Remember me</label>
						</div>
					</div>
					<button type="submit" class="btn btn-primary btn-user btn-block">
						Login
					</button>
					<hr>

					<?php echo form_close();?>
					<hr>
					<div class="text-center">
						<a class="small" href="">Forgot password</a>
					</div>
				</div>
			</divc>


		</div>
	</div>

	<!--   Core JS Files   -->
	<script src="<?php echo base_url('assets/js/core/jquery.min.js');?>"></script>
	<script src="<?php echo base_url('assets/js/core/popper.min.js');?>"></script>
	<script src="<?php echo base_url('assets/js/core/bootstrap-material-design.min.js');?>"></script>
	<script src="https://unpkg.com/default-passive-events"></script>
	<script src="<?php echo base_url('assets/js/plugins/perfect-scrollbar.jquery.min.js');?>"></script>
	<!-- Place this tag in your head or just before your close body tag. -->
	<script async defer src="https://buttons.github.io/buttons.js"></script>
	<!--  Google Maps Plugin    -->
	<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
	<!-- Chartist JS -->
	<script src="<?php echo base_url('assets/js/plugins/chartist.min.js');?>"></script>
	<!--  Notifications Plugin    -->
	<script src="<?php echo base_url('assets/js/plugins/bootstrap-notify.js');?>"></script>
	<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
	<script src="<?php echo base_url('assets/js/material-dashboard.js?v=2.1.0');?>"></script>
</body>

</html>
