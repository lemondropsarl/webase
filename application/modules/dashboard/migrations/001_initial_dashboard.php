<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_initial_dashboard extends MY_Migration {

    public function __construct()
    {
        $this->load->dbforge();
        
    }

    public function up() {
        $acls = [
            [
                'module_name'   => 'dashboard',
                'group_id'      => 1,
                'value'         => '1'
            ],
            [
                'module_name'   => 'dashboard',
                'group_id'      => 2,
                'value'         => '1'
            ],
            [
                'module_name'   => 'dashboard',
                'group_id'      => 3,
                'value'         => '1'
            ]
        ];
        $this->db->insert_batch('acl_modules', $acls);
        $module = [
			'module_name'		    => 'dashboard',
			'module_display_name'	=> 'Dashboard',
			'module_description'	=> 'connect information for other extension to your dashbord',
			'module_status'			=>'1',
			'module_version'		=>'1.0.0',
			'is_preloaded'			=> '1'

		];
		$this->db->insert('modules', $module);
        
    }

    public function down() {
        
    }

}

/* End of file initial_dashboard.php */
