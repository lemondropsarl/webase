<?php 
defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
			<?php if ($message != "") {?>
				<div class="alert alert-danger">
					<p><?php echo $message;?></p>
				</div>
			<?php }?>
				<div class="card">
					<div class="card-header-primary">
						<h4 class="card-title">New User</h4>
					</div>
					<div class="card-body">
						<?php echo form_open('auth/create_user');?>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label class="bmd-label-floating">Username</label>
									<input type="text" class="form-control" NAME="identity">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label class="bmd-label-floating">Fist Name</label>
									<input type="text" class="form-control" name="first_name">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label class="bmd-label-floating">Last Name</label>
									<input type="text" class="form-control" name="last_name">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label class="bmd-label-floating">Company</label>
									<input type="text" class="form-control" name="company">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label class="bmd-label-floating">Email</label>
									<input type="email" class="form-control" name="email">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label class="bmd-label-floating">Phone numnber</label>
									<input type="text" class="form-control" name="phone">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<select class=" custom-select-sm" name="group_id">
										<option value="">Choose group</option>
										<?php foreach ($group_available as $v) {?>
											
											<option value="<?php echo $v['id'];?>"><?php echo $v['name'];?></option>
										<?php }?>
									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label class="bmd-label-floating">Password</label>
									<input type="password" class="form-control" name="password">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label class="bmd-label-floating">Confirm password</label>
									<input type="password" class="form-control" name="password_confirm">
								</div>
							</div>
						</div>
						<button type="submit" class="btn btn-success">Regster</button>
						<?php echo form_close();?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
