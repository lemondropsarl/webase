<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Install_ion_auth extends MY_Migration {
	private $tables;

	public function __construct() {
		parent::__construct();
		$this->load->dbforge();

		$this->load->config('auth/ion_auth', TRUE);
		$this->tables = $this->config->item('tables', 'ion_auth');
	}

	public function up() {
		// Drop table 'groups' if it exists
		$this->dbforge->drop_table($this->tables['groups'], TRUE);

		// Table structure for table 'groups'
		$this->dbforge->add_field([
			'id' => [
				'type'           => 'MEDIUMINT',
				'constraint'     => '8',
				'unsigned'       => TRUE,
				'auto_increment' => TRUE
			],
			'name' => [
				'type'       => 'VARCHAR',
				'constraint' => '20',
			],
			'description' => [
				'type'       => 'VARCHAR',
				'constraint' => '100',
			]
		]);
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table($this->tables['groups']);

		// Dumping data for table 'groups'
		$data = [
			[
				'name'        => 'admin',
				'description' => 'Administrator'
			],
			[
				'name'        => 'members',
				'description' => 'General User'
			]
		];
		$this->db->insert_batch($this->tables['groups'], $data);

		// Drop table 'users' if it exists
		$this->dbforge->drop_table($this->tables['users'], TRUE);

		// Table structure for table 'users'
		$this->dbforge->add_field([
			'id' => [
				'type'           => 'MEDIUMINT',
				'constraint'     => '8',
				'unsigned'       => TRUE,
				'auto_increment' => TRUE
			],
			'ip_address' => [
				'type'       => 'VARCHAR',
				'constraint' => '45'
			],
			'username' => [
				'type'       => 'VARCHAR',
				'constraint' => '100',
			],
			'password' => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
			],
			'email' => [
				'type'       => 'VARCHAR',
				'constraint' => '254',
				'unique' => TRUE
			],
			'activation_selector' => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
				'null'       => TRUE,
				'unique' => TRUE
			],
			'activation_code' => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
				'null'       => TRUE
			],
			'forgotten_password_selector' => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
				'null'       => TRUE,
				'unique' => TRUE
			],
			'forgotten_password_code' => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
				'null'       => TRUE
			],
			'forgotten_password_time' => [
				'type'       => 'INT',
				'constraint' => '11',
				'unsigned'   => TRUE,
				'null'       => TRUE
			],
			'remember_selector' => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
				'null'       => TRUE,
                'unique' => TRUE
			],
			'remember_code' => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
				'null'       => TRUE
			],
			'created_on' => [
				'type'       => 'timestamp',
				'constraint' => '6',
				'unsigned'   => TRUE,
				'null'	=>	TRUE
			],
			'last_login' => [
				'type'       => 'timestamp',
				'constraint' => '6',
				'unsigned'   => TRUE,
				'null'	=> TRUE
				
			],
			'active' => [
				'type'       => 'TINYINT',
				'constraint' => '1',
				'unsigned'   => TRUE,
				'null'       => TRUE
			],
			'first_name' => [
				'type'       => 'VARCHAR',
				'constraint' => '50',
				'null'       => TRUE
			],
			'last_name' => [
				'type'       => 'VARCHAR',
				'constraint' => '50',
				'null'       => TRUE
			],
			'company' => [
				'type'       => 'VARCHAR',
				'constraint' => '100',
				'null'       => TRUE
			],
			'phone' => [
				'type'       => 'VARCHAR',
				'constraint' => '20',
				'null'       => TRUE
			]
		]);
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table($this->tables['users']);

		// Drop table 'users_groups' if it exists
		$this->dbforge->drop_table($this->tables['users_groups'], TRUE);

		// Table structure for table 'users_groups'
		$this->dbforge->add_field([
			'id' => [
				'type'           => 'MEDIUMINT',
				'constraint'     => '8',
				'unsigned'       => TRUE,
				'auto_increment' => TRUE
			],
			'user_id' => [
				'type'       => 'MEDIUMINT',
				'constraint' => '8',
				'unsigned'   => TRUE
			],
			'group_id' => [
				'type'       => 'MEDIUMINT',
				'constraint' => '8',
				'unsigned'   => TRUE
			]
		]);
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table($this->tables['users_groups']);

		// Drop table 'login_attempts' if it exists
		$this->dbforge->drop_table($this->tables['login_attempts'], TRUE);

		// Table structure for table 'login_attempts'
		$this->dbforge->add_field([
			'id' => [
				'type'           => 'MEDIUMINT',
				'constraint'     => '8',
				'unsigned'       => TRUE,
				'auto_increment' => TRUE
			],
			'ip_address' => [
				'type'       => 'VARCHAR',
				'constraint' => '45'
			],
			'login' => [
				'type'       => 'VARCHAR',
				'constraint' => '100',
				'null'       => TRUE
			],
			'time' => [
				'type'       => 'INT',
				'constraint' => '11',
				'unsigned'   => TRUE,
				'null'       => TRUE
			]
		]);
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table($this->tables['login_attempts']);

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
		$this->dbforge->create_table($this->tables['ci_sessions']);

		//install the reste of the table


	}

	public function down() {
		$this->dbforge->drop_table($this->tables['users'], TRUE);
		$this->dbforge->drop_table($this->tables['groups'], TRUE);
		$this->dbforge->drop_table($this->tables['users_groups'], TRUE);
		$this->dbforge->drop_table($this->tables['login_attempts'], TRUE);
		$this->dbforge->drop_table($this->tables['ci_sessions'], TRUE);
	}
}
