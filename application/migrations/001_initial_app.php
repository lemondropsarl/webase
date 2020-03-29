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
		$this->dbforge->drop_table($this->tables['ci_sessions'], TRUE);
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
        
    }

    public function down() {
        $this->dbforge->drop_table('version',TRUE);
        $this->dbforge->drop_table('ci_sessions',TRUE);
    }

}

/* End of file Class_name.php */

