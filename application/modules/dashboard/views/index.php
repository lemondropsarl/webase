<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<div class="content">
	<div class="container-fluid">
		<!-- your content here -->
		<div class="row">
            <div class="col-xl-4 col-lg-12">
			
				<h1><?php echo $this->lang->line('welcome_message');?></h1>
				<?php if ($done = $this->ion_auth_acl->has_permission('A')) {?>
				
					<h2>If you can read this that means you are admin</h2>
					<a href="<?php echo base_url('admin');?>">Go To admin page</a>
			<?php	}?>
			</div>
		</div>
	</div>
</div>
