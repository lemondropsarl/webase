<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="row">
					<?php foreach ($modules as $v) {?>

					<div class="col-md-4">
						<div class="card  card-profile">
							<div class="card-avatar">
								<a href="#">
									<img class="img" src="<?php echo base_url('assets/img/faces/owner.jpg');?>" />
								</a>
							</div>
							<div class="card-body">
								<h6 class="card-category"><?php echo $v['module_display_name']?></h6>
								<p class="card-description text-justify">
									<?php echo $v['module_description']?>
								</p>
								<div class="row">
									<div class="col-lg-4">
										<h8>v<?php echo $v['module_version']?></h8>
									</div>
									<div class="col-lg-3">

										<text class=" pull-left <?php if ($v['module_status'] == 1) {
                                            echo "text-success";
                                            }else {
                                            echo "text-danger";
                                            }?>"> <strong><?php if ($v['module_status'] == 1) {?>
												Active
												<?php }else {?>
												Inactif
												<?php }?></strong>
										</text>
									</div>
									<div class="col-lg-5">
										<?php if ($v['is_preloaded'] == 1) {
                                           echo "<text><small>Preloaded</small></text>";
                                        }?>
									</div>
									<div class="col-md-12">
										<?php if (1.1 > intval($v['module_version'])) {?>

										<a href="#" class="btn btn-just-icon btn-primary">
											<i class="material-icons">arrow_circle_up</i>
										</a>
										<?php }?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php }?>
				</div>
			</div>
		</div>
	</div>
</div>
