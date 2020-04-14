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
        
    }

    public function down() {
        
    }

}

/* End of file initial_dashboard.php */
