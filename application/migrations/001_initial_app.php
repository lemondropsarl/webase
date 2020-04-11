<?php 
defined('BASEPATH') OR exit('No direct script access allowed');


class Migration_initial_app extends CI_Migration {

    public function __construct()
    {
        $this->load->dbforge();
        $this->load->library('migration');
    }

    public function up() {
        $this->dbforge->drop_table('version',TRUE);
        $this->dbforge->add_field(array('current_version'=>[
            'type' =>'VARCHAR',
            'constraint' =>'3'
        ]));
        $this->dbforge->create_table('version',TRUE);
        //drop tables 'ci_sessions' if it does not exist
		$this->dbforge->drop_table('ci_sessions', TRUE);
		$this->dbforge->add_field([
			'id'=>[
				'type'=>'VARCHAR',
				'constraint'=>'40'
			],
			'ip_address'=>[
				'type'=>'VARCHAR',
				'constraint'=>'45'
			],
			'timestamp'=>[
				'type'=>'MEDIUMINT',
				'constraint'=>'11',
				'unsigned' => TRUE,
				'default' => 0,
				
			],
			'data'=>[
				'type' => 'blob'
			]
		]);
		$this->dbforge->add_key('id',TRUE);
		$this->dbforge->create_table('ci_sessions');

		$this->dbforge->drop_table('navigation_menu',TRUE);
		$this->dbforge->add_field([
			'id'=>[
                'type'           => 'MEDIUMINT',
				'constraint'     => '8',
				'unsigned'       => TRUE,
				'auto_increment' => TRUE
            ],
            'name' =>[
                'type'          => 'VARCHAR',
                'constraint'    => '50',
				'unsigned'      => TRUE,
				'unique'		=> TRUE
			],
			'url' =>[
                'type'          => 'VARCHAR',
                'constraint'    => '50',
				'unsigned'      => TRUE,
				'unique'		=> TRUE
			],
			'icon' =>[
                'type'          => 'VARCHAR',
                'constraint'    => '50',
				'unsigned'      => TRUE,				
			],
			'text' =>[
                'type'          => 'VARCHAR',
                'constraint'    => '50',
				'unsigned'      => TRUE,
				'unique'		=> TRUE
			],
			'parent' =>[
                'type'          => 'VARCHAR',
                'constraint'    => '50',
				'unsigned'      => TRUE,
				'unique'		=> TRUE
			],
			'order' =>[
                'type'          => 'INT',
                'constraint'    => '11',
				'unsigned'      => TRUE,
				
			]
		]);
		$this->dbforge->add_key('id',TRUE);
		$this->dbforge->create_table('navigation_menu');
        
    }

    public function down() {
        $this->dbforge->drop_table('version',TRUE);
		$this->dbforge->drop_table('ci_sessions',TRUE);
		$this->dbforge->drop_table('navigation_menu',TRUE);

    }

}

/* End of file Class_name.php */

