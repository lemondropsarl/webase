<?php 
defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<dic class="col-md-8">
				<div class="card">
					<div class="card-header card-header-primary">
						<h4 class="card-title">User Profile</h4>
						<p class="card-category">Complete your profile</p>
					</div>
					<div class="card-body">
						<?php echo form_open('');?>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="bmd-label-floating">Company (disabled)</label>
									<input type="text" class="form-control" disabled
										value="<?php echo $user->company;?>">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="bmd-label-floating">Email address</label>
									<input type="email" class="form-control" value="<?php echo $user->email;?>">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label class="bmd-label-floating">Username</label>
									<input type="text" class="form-control" value="<?php echo $user->username;?>">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label class="bmd-label-floating">Fist Name</label>
									<input type="text" class="form-control" value="<?php echo $user->first_name;?>">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label class="bmd-label-floating">Last Name</label>
									<input type="text" class="form-control" value="<?php echo $user->last_name;?>">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label class="bmd-label-floating">Phone number</label>
									<input type="text" class="form-control" value="<?php echo $user->phone;?>">
								</div>
							</div>
						</div>
						<button type="submit" class="btn btn-primary pull-right">Update Profile</button>
						<div class="clearfix"></div>
						<?php echo form_close();?>
					</div>
				</div>
			</dic>
			<dic class="col-md-4">
				<div class="card card-profile">
					<div class="card-avatar">
						<a href="#">
							<img class="img" src="<?php echo base_url('assets/img/faces/owner.jpg');?>" />
						</a>
					</div>
					<div class="card-body">
						<h6 class="card-category">Author / Webase</h6>
						<h4 class="card-title">Cedric Mataso</h4>
						<p class="card-description">
							Don't be scared of the truth because we need to restart the human foundation in truth.
						</p>
						<a href="https://twitter.com/CedricMataso" class="btn btn-primary btn-round">Follow</a>
						<h6 class="card-category">Groups</h6>
						<div>
							<ul>
								<?php foreach($user_groups as $ug) : ?>
								<li><?php echo $ug->description; ?></li>
								<?php endforeach; ?>
							</ul>
						</div>
						<hr>
						<h6 class="card-category">Permissions</h6>
						<div>
							<ul>
								<?php foreach($user_acl as $acl) : ?>
								<li><?php echo $acl['name']; ?>
									(<?php if($this->ion_auth_acl->has_permission($acl['key'], $user_acl)) : ?>Allow<?php else: ?>Deny<?php endif; ?><?php if($acl['inherited']) : ?>
									<strong>Inherited</strong><?php endif; ?>)</li>
								<?php endforeach; ?>
							</ul>
						</div>
					</div>
				</div>
			</dic>
		</div>
		<div class="row">
			<?php if ($this->ion_auth_acl->has_permission('A')) {?>
			<div class="col-md-12">
				<div class="card">
					<a href="#collapseCardPermission" class="d-block card-header card-header-warning py-3"
						data-toggle="collapse" role="button" aria-expanded="true"
						aria-controls="collapseCardPermission">
						<h4 class="card-title">Manage user permissions</h4>
						<p class="card-category">Update user permission</p>
					</a>
					<div class="collapse show" id="collapseCardPermission">
						<div class="card-body">
							<div class="table-responsive">

								<?php echo form_open('badmin/user_permissions/'.$user_id); ?>

								<table class="table">
									<thead>
										<tr>
											<th>Permission</th>
											<th>Allow</th>
											<th>Deny</th>
											<th>Inherited From Group</th>
										</tr>
									</thead>
									<tbody>
										<?php if($permissions) : ?>
										<?php foreach($permissions as $k => $v) : ?>
										<tr>
											<td><?php echo $v['name']; ?></td>
											<td>
												<?php echo form_radio("perm_{$v['id']}", '1', set_radio("perm_{$v['id']}", '1', $this->ion_auth_acl->is_allowed($v['key'], $user_acl))); ?>
											</td>
											<td>
												<?php echo form_radio("perm_{$v['id']}", '0', set_radio("perm_{$v['id']}", '0', $this->ion_auth_acl->is_denied($v['key'], $user_acl))) ?>
											</td>
											<td>
												<?php echo form_radio("perm_{$v['id']}", 'X', set_radio("perm_{$v['id']}", 'X', ( $this->ion_auth_acl->is_inherited($v['key'], $user_acl) || ! array_key_exists($v['key'], $user_acl)) ? TRUE : FALSE)); ?>
												(Inherit
												<?php echo ($this->ion_auth_acl->is_inherited($v['key'], $group_permissions, 'value')) ? "Allow" : "Deny"; ?>)
											</td>
										</tr>
										<?php endforeach; ?>
										<?php else: ?>
										<tr>
											<td colspan="4">There are currently no permissions to manage, please add
												some
												permissions</td>
										</tr>
										<?php endif; ?>
									</tbody>
								</table>

								<p>
									<button type="submit" class="btn btn-success" value="update">Update</button>

								</p>

								<?php echo form_close(); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-12">
				<div class="card">
					<a href="#collapseCardGroup" class="d-block card-header card-header-info py-3"
						data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardGroup">
						<h4 class="card-title">Manage user's Groups</h4>
						<p class="card-category">Update user's groups</p>
					</a>
					<div class="collapse show" id="collapseCardGroup">
						<div class="card-body">
							<div class="table-responsive">
								<?php echo form_open('badmin/group_permissions'.$user_id);?>
								<table class="table">
									<thead>
										<tr>
											<th>Groups</th>
											<th>No/Yes</th>

										</tr>
									</thead>
									<tbody>
										<?php if ($groups) {
											$ug = array();
											foreach ($user_groups as  $value) {
												$ug[] = $value->id;
											}
									
											foreach ($groups as $v) {?>

										<tr>
											<td><?php echo $v->name;?></td>
											<?php if (in_array($v->id,$ug)) { ?>
											<td>
												<input type="checkbox" value="1" name="group_<?php echo$v->id;?>"
													checked>
											</td>

											<?php	}else {?>
											<td>
												<input type="checkbox" value="0" name="group_<?php echo$v->id;?>">

											</td>
											<?php }?>
										</tr>

										<?php
										}
										}?>
									</tbody>
								</table>
								<p>
									<button type="submit" class="btn btn-success" value="assign">Assign group</button>

								</p>
								<?php echo form_close();?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php } ?>
		</div>
	</div>
</div>
