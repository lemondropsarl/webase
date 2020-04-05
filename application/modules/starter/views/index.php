<?php

defined('BASEPATH') OR exit('No direct script access allowed');

global $app;
$this->load->config('app', TRUE);
$this->app = $this->config->item('application', 'app');
?>

<html>

<head>
	<title><?php echo $this->app['name'];?> - Installation</title>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- Material Kit CSS -->
  <link href="<?php echo base_url('assets/css/material-dashboard.css?v=2.1.0');?>" rel="stylesheet" />
</head>
<?php 
	
		function display_information($message) {
			global $display_message;
			global $flag;
			$display_message = $display_message . $message . "<br/>";   
			if($message=="You have latest version of application installed."){
				$flag=true;
			}
				
		}
		
		function get_server() {
			// Edit config/database.php file 
			$database_file = "application/config/database.php";
			$line_array = file($database_file);

			for ($i = 0; $i < count($line_array); $i++) {
				if (strstr($line_array[$i], "'hostname' =>")) {
					$server = str_replace("'hostname' =>", "", $line_array[$i]);
					$server = str_replace("'", "", $server);
					$server = str_replace(",", "", $server);
					$server = trim($server);
					return $server;
				}
			}
		}
		function get_username() {
			// Edit config/database.php file 
			$database_file = "application/config/database.php";
			$line_array = file($database_file);

			for ($i = 0; $i < count($line_array); $i++) {
				if (strstr($line_array[$i], "'username' => ")) {
					$username = str_replace("'username' => ", "", $line_array[$i]);
					$username = str_replace("'", "", $username);
					$username = str_replace(",", "", $username);
					$username = trim($username);
					return $username;
				}
			}
		}
		function get_password() {
			// Edit config/database.php file 
			$database_file = "application/config/database.php";
			$line_array = file($database_file);

			for ($i = 0; $i < count($line_array); $i++) {
				if (strstr($line_array[$i], "'password' => ")) {
					$password = str_replace("'password' => ", "", $line_array[$i]);
					$password = str_replace("'", "", $password);
					$password = str_replace(",", "", $password);
					$password = trim($password);
					return $password;
				}
			}
		}
		
		
		function display_error($message) {
            echo "<div class=\"alert alert-danger\" >$message</div>";
        }
		function is_installed() {
			$database_file = "application/config/database.php";
			if(!file_exists($database_file)){
				return FALSE;
			}else{
				return TRUE;
			}
		}
		function does_database_exist($server, $username, $password,$dbname){
			$mysql = mysqli_connect($server, $username, $password,$dbname);
			if (!$mysql) {
				return 0;
			}else{
				return 1;
			}
		}
		function are_tables_created($dbprefix,$con){
			$sql = "SHOW TABLES LIKE version";
            $result = mysqli_query($con,$sql);
			if((mysqli_num_rows($result))==0){
				return FALSE;	
			}else{		
				return TRUE;
			}
		}
		
		function display_form($message){
			if($message != ""){
				display_error($message);
			}
			?>

<div class=" p-3">
	<div class=" text-gray-500">
		<h5>Step 1 : DATABASE INSTALLATION</h5>
	</div>
	<div class="text">
		<h6>Fill in the details</h6>
	</div>
	<?php echo form_open('starter/install');?>
	<input type="hidden" name="step" value="1" />
	<div class="form-group">
		<span class=" input-group-addon">Host Name</span>
		<input type="text" class="form-control" name="server" placeholder="localhost" required />
	<span class="small">Get it from your host, if <strong>localhost</strong>
		doesn't work.</span>
	</div>
	<div class="form-group">
		<span class="input-group-addon">Database name</span>
		<input type="text" class="form-control" name="dbname" placeholder="example: Webase" required />
	</div>

	<div class="form-group">
		<span class="input-group-addon"> MySQL Username</span>
		<input type="text" class="form-control" name="username" placeholder="MySQL Username" required />
	</div>
	<div class="form-group">
		<span class="input-group-addon">MySQL Password</span>
		<input type="text" class="form-control" name="password" placeholder="MySQL Password" />
	</div>
	<button type="submit" name="submit" class="btn btn-success" />Install</button>
	<?php echo form_close();?>


</div>


<?php
		}	
		function display_system_admin_form($message){
			if($message != ""){
				display_error($message);
			}
			?>
<div class="p-3">
	<div class=" text-gray-500">
		<h5>Step 2 : ADMIN USER CREATION</h5>
	</div>
	<div class="text">
		<h6>Fill in the details</h6>
	</div>
	<?php echo form_open('starter/install');?>
				<input type="hidden" name="step" value="2" />

				<div class="form-group">
					<span class="input-group-addon">First name</span>
					<input type="text" class="form-control" name="fname" placeholder="example : Lemondrop" required />
				</div>
				<div class="form-group">
					<span class="input-group-addon">Last name</span>
					<input type="text" class="form-control" name="lname" placeholder="example : Lemondrop" required />
				</div>
				<div class="form-group">
					<span class="input-group-addon">Email</span>
					<input type="text" class="form-control" name="email" placeholder="example : admin@example.com" required />
				</div>
				<div class="form-group">
					<span class="input-group-addon">Company</span>
					<input type="text" class="form-control" name="company" placeholder="example : Lemondrop" required />
				</div>
				<div class="form-group">
					<span class="input-group-addon">Phone number</span>
					<input type="text" class="form-control" name="phone" placeholder="example : +243990000000" required />
				</div>
				<div class="form-group">
					<span class="input-group-addon">Username</span>
					<input type="text" class="form-control" name="username" placeholder="example : admin" required />
				</div>
				<div class="form-group ">
					<span class="input-group-addon">Password</span>
					<input type="password" class="form-control" name="password" placeholder="Mot de passe" />
				</div>
				<div class="form-group">
					<span class="input-group-addon">Confirm Password</span>
					<input type="password" class="form-control" name="confirm_password"
						placeholder="Confirm Password" />
				</div>
				<button type="submit" name="submit" class="btn btn-success" />Create</button>
				<?php form_close();?>

		</div>

<?php
		}
		function display_finish_form(){
			?>
			<div class="p-5">
				<div class=" text-success text-center">
					<h5>INSTALLATION DONE SUCCESSFULLY</h5>
				</div>

				<div class="form-horizontal text-center">
					<a class="btn btn-success square-btn-adjust" title="Goto Application"
						href="<?php echo base_url('dashboard');?>">Go to Application</a>
				</div>
			</div>
	<?php	}
	?>

<body class="dark-edition">
	<div class="container">
		<div class="row  justify-content-center">
			<div class="col-xl-10 col-lg-12 col-md-12">
				<div class="card o-hidden border-0 shadow-lg my-5">
					<div class="card-body p-0">
						<div class="row">
							<div class="col-lg-12">
								<div class="p-5">
									<div class="text-center">
										<h2><?php echo $this->app['name'];?> Installation</h2>
									</div>
								</div>
							</div>
							<div class="col-md-12">

									<?php
									if ($req == 1) {
									// Check if application is installled or not      
										if (!is_installed()) {
							
							
										/************************************************************
										** Step 1 - Ask for MySQL Credentials
										*************************************************************/
							
										$message="";
							
										display_form($message);
										}
									}elseif ($req == 2) {
							
										/************************************************************
										** Step 2 - With given Credentials
										**          Install the application for the first time
										*************************************************************/
										//$this->load->library('migration');
										//$this->load->dbforge();
						
										display_system_admin_form("");
						
										?>
							</div>
							<?php   }elseif ($req == 3) {
										/************************************************************
										** Step 3 - Ask for System administrator Username and Password
										*************************************************************/
										?>
							<div class="col-lg-12">
									<?php	
									display_finish_form();
								} ?>
							</div>
								
						</div>
					</div>
				</div>
			</div>

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
