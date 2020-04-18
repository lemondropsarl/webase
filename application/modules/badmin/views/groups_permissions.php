<?php 
defined('BASEPATH') OR exit('No direct script access allowed');?>

<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6">
				<div class="card">
					<div class="card-header-warning">
						<a class="pull-right card-header-icon" href="#">
							<i class="material-icons">add_circle</i>
						</a>
						<h4 class="card-title">Groups</h4>
						<p class="card-category">List of all groups</p>

					</div>

					<div class="card-body">
						<div class="table-responsive">
							<table class="table">
								<thead>
									<tr>
										<th>Name</th>
										<th>Description</th>
									</tr>
								</thead>
								<tbody>
									<?php 
                                            foreach ($groups as $v) {?>
									<tr>
										<td><?php echo $v->name;?></td>
										<td><?php echo $v->description;?></td>
									</tr>
									<?php }
                                        ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="card">
					<div class="card-header-info">
						<a class="pull-right card-header-icon" href="#">
							<i class="material-icons">add_circle</i>
						</a>
						<h4 class="card-title">Permissions</h4>
						<p class="card-category">List of all permissions</p>
					</div>

					<div class="card-body">
						<div class="table-responsive">
							<table class="table">
								<thead>
									<tr>
										<th>Key</th>
										<th>Name</th>

									</tr>
								</thead>
								<tbody>
									<?php 
                                            foreach ($permissions as $v) {?>
									<tr>
										<td><?php echo $v['key'];?></td>
										<td><?php echo $v['name'];?></td>
									</tr>
									<?php }
                                        ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-12">
				<div class="card">
					<div class="card-header-primary">
						<a class="pull-right card-header-icon" href="#colGroupPermission" data-toggle="collapse"
							role="button" aria-expanded="true" aria-controls="colGroupPermission">
							<i class="material-icons">keyboard_array_down</i>
						</a>
						<h4 class="card-title">Group's permissions</h4>
						<p class="card-category">Assign permissions to groups</p>
					</div>
					<div class="collapse show" id="colGroupPermission">
						<div class="card-body">
							<div class="table-responsive">

								<table class="table">
									<thead>
										<tr>
											<th>Group</th>
											<?php 
											$perm =array();
											$gp = array();
											foreach ($permissions as  $v) {
												$id = $v['id'];
												$name = $v['name'];
												$perm[$id] = $name;
											}
											foreach ($groups as $v) {
												$id =$v->id;
												$name =$v->name;
												$gp[$id] = $name;
											}
                                                foreach (array_keys(current($matrix)) as $perm_name) {?>
											<th><?php echo $perm[$perm_name];?></th>
											<?php }
                                            ?>
										</tr>
									</thead>
									<tbody>
										<?php 
									 echo form_open('badmin/groupsProcess');
                                            foreach (array_keys($matrix) as $group_id) {?>
										<tr>
											<td><?php echo $gp[$group_id];?></td>
											<?php 
														foreach (array_keys($matrix[$group_id]) as $perm_id) {
															if ($matrix[$group_id][$perm_id] == '1') {?>
											<td>
												<input type="checkbox"
													name="<?php echo $perm_id;?>_<?php echo $group_id;?>_" value="1"
													checked>
											</td>
											<?php }else {?>
											<td>
												<input type="checkbox"
													name="<?php echo $perm_id;?>_<?php echo $group_id;?>_" value="0">
											</td>
											<?php	}
														}?>
										</tr>
										<?php	}
                                        ?>
									</tbody>
								</table>
								<p>
									<button type="submit" class="btn btn-success" value="save">Update
										permission</button>
								</p>
								<?php echo form_close();?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
