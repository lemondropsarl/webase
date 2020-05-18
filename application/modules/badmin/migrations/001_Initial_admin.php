<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_initial_admin extends MY_Migration {

    public function __construct()
    {
        $this->load->dbforge();
       
    }

    public function up() {
        $acls = [
            [
                'module_name'   => 'badmin',
                'group_id'      => 1,
                'value'         => '1'
            ],
            [
                'module_name'   => 'badmin',
                'group_id'      => 2,
                'value'         => '1'
            ],
        ];
        $this->db->insert_batch('acl_modules', $acls);
        
        $menus = [
            //admin menu
            [
                'name'	=> 'badmin',
                'url'	=> '',
                'icon'  => 'material-icons',
				'icon-name'	=> 'brightness_auto',
				'text'	=> 'administration',
				'parent'=> '',
				'order' => 100,
				'perm_key'=> 'R'
            ],
            //admin sub menus
            [
                'name'	=> 'users',
                'url'	=> 'badmin/users',
                'icon'  => 'material-icons',
				'icon-name'	=> '',
				'text'	=> 'Users',
				'parent'=> 'badmin',
				'order' => 110,
				'perm_key'=> 'R'
            ],
            [
                'name'	=> 'group_permission',
                'url'	=> 'badmin/groups_permissions',
                'icon'  => 'material-icons',
				'icon-name'	=> '',
				'text'	=> 'Groups & Permissions',
				'parent'=> 'badmin',
				'order' => 120,
				'perm_key'=> 'R'
            ]
        ];
        $this->db->insert_batch('navigation_menu', $menus);
        
        $module = [
			'module_name'		    => 'admin',
			'module_display_name'	=> 'Administration',
			'module_description'	=> 'This extension handle all your administration operation and management',
			'module_status'			=>'1',
			'module_version'		=>'1.0.0',
			'is_preloaded'			=> '1'

		];
		$this->db->insert('modules', $module);
    }

    public function down() {
        
    }

}

/* End of file initial_admin.php */
