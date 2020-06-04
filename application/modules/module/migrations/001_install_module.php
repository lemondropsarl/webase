<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_install_module extends CI_Migration {

    public function __construct()
    {
        $this->load->dbforge();
        $this->load->database();
    }

    public function up() {
        $acls = [
            [
                'module_name'   => 'module',
                'group_id'      => 1,
                'value'         => '1'
            ],
            [
                'module_name'   => 'module',
                'group_id'      => 2,
                'value'         => '1'
            ],
        ];
        $this->db->insert_batch('acl_modules', $acls);
        
        $menu = [
            //Module menu
            [
                'name'	=> 'module',
                'url'	=> 'module',
                'icon'  => 'material-icons',
				'icon-name'	=> 'apps',
				'text'	=> 'Modules',
				'parent'=> 'module',
				'order' => 200,
				'perm_key'=> 'A'
            ]
            
        ];
        $this->db->insert_batch('navigation_menu', $menu);
        $module = [
			'module_name'		    => 'module',
			'module_display_name'	=> 'Module management',
			'module_description'	=> 'This extension Helps you manage all your extensions',
			'module_status'			=>'1',
			'module_version'		=>'1.0',
			'is_preloaded'			=> '1'

		];
		$this->db->insert('modules', $module);
    }

    public function down() {
        
    }

}

/* End of file install_module.php */




/* End of file Module.php */
