<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_install_ion_auth_acl extends MY_Migration {

    private $tables;
    public function __construct()
    {
        $this->load->dbforge();
        $this->load->config('auth/ion_auth', TRUE);
		$this->tables = $this->config->item('tables', 'ion_auth');
    }

    public function up() {
        //check if tables greoup_permissions exists or create them
        $this->dbforge->drop_table($this->tables['groups_permissions'], TRUE);
        $this->dbforge->add_field([
            'id'=>[
                'type'           => 'MEDIUMINT',
				'constraint'     => '8',
				'unsigned'       => TRUE,
				'auto_increment' => TRUE
            ],
            'group_id' => [
				'type'       => 'MEDIUMINT',
				'constraint' => '8',
                'unsigned'   => TRUE,
                
            ],
            'perm_id' => [
				'type'       => 'MEDIUMINT',
				'constraint' => '8',
                'unsigned'   => TRUE,
                
            ],
            'value' =>[
                'type'       => 'TINYINT',
                'constraint' => '4',
                'default'    => '0'
            ]
                       
        ]);
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->add_key('group_id','perm_id');
        $this->dbforge->create_table($this->tables['groups_permissions']);
         
        //check if tables permissions exists or create them
        $this->dbforge->drop_table($this->tables['permissions'], TRUE);
        $this->dbforge->add_field([
            'id'=>[
                'type'           => 'MEDIUMINT',
				'constraint'     => '8',
				'unsigned'       => TRUE,
				'auto_increment' => TRUE
            ],
            'perm_key' =>[
                'type'          => 'VARCHAR',
                'constraint'    => '30',
                'unique'        => TRUE
            ],
            'perm_name' =>[
                'type'          => 'VARCHAR',
                'constraint'    => '100',
                
            ]
        ]);
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table($this->tables['permissions']);
        
        //dump data
        $data =[
            [
                'perm_key'  => 'R',
                'perm_name' => 'Read'
            ],
            [
                'perm_key'  => 'W',
                'perm_name' => 'Write'
            ],
            [
                'perm_key'  => 'A',
                'perm_name' => 'Admin'
            ],
            [
                'perm_key'  => 'S',
                'perm_name' => 'Super'
            ]
        ];
        $this->db->insert_batch($this->tables['permissions'], $data);
        
        //check if user_permission exists or create
        $this->dbforge->drop_table($this->tables['users_permissions'], TRUE);
        $this->dbforge->add_field([
            'id'=>[
                'type'           => 'MEDIUMINT',
				'constraint'     => '8',
				'unsigned'       => TRUE,
				'auto_increment' => TRUE
            ],
            'user_id'=>[
                'type'           => 'MEDIUMINT',
				'constraint'     => '8',
                
                
				
            ],
            'perm_id'=>[
                'type'           => 'MEDIUMINT',
				'constraint'     => '8',
                'unique'         => TRUE,
                
				
            ],
            'value' =>[
                'type'       => 'TINYINT',
                'constraint' => '4',
                'default'    => '0'
            ]
            
        ]);
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table($this->tables['users_permissions']);

        //Add ACL_MODULES
        $this->dbforge->drop_table($this->tables['acl_modules'],TRUE);
        $this->dbforge->add_field([
            'id'=>[
                'type'           => 'MEDIUMINT',
				'constraint'     => '8',
				'unsigned'       => TRUE,
				'auto_increment' => TRUE
            ],
            'module_name' =>[
                'type'          => 'VARCHAR',
                'constraint'    => '30',
                'unsigned'      => TRUE,
            ],
            'group_id' => [
				'type'       => 'MEDIUMINT',
				'constraint' => '8',
                'unsigned'   => TRUE,
                
            ],
            'value' =>[
                'type'       => 'TINYINT',
                'constraint' => '4',
                'default'    => '0'
            ]
        ]);
        $this->dbforge->add_key('id',TRUE);
        $this->dbforge->create_table($this->tables['acl_modules']);

        //ACL_MENU
    }

    public function down() {
        $this->dbforge->drop_table($this->tables['groups_permissions'], TRUE);
        $this->dbforge->drop_table($this->tables['permissions'], TRUE);
        $this->dbforge->drop_table($this->tables['users_permissions'], TRUE);
        $this->dbforge->drop_table($this->tables['acl_modules'], TRUE);
        
    }

}

/* End of file install_ion_auth_acl.php */
