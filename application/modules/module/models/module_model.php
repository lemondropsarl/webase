<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class module_model extends CI_Model {

    

    public function __construct()
    {
         parent::__construct();
         $this->load->database();
    //Do your magic here
    }
    public function get_modules(){
        $this->db->order_by('id');
        $query = $this->db->get('modules');     
        return $query->result_array();     
    }
    function get_module_details($module_id) {
		$query = $this->db->get_where('modules', array('id' => $module_id));
        return $query->row_array();
    }
	function get_module_details_by_name($module_name) {
		$query = $this->db->get_where('modules', array('module_name' => $module_name));
        return $query->row_array();
    }
    function deactivate_module($module_name) {
		$data['module_status'] = 0;
		//$data['sync_status'] = 0;
		$this->db->update('modules', $data, array('module_name' => $module_name));
    }
	function activate_module($module_name) {
		$data['module_status'] = 1;
		//$data['sync_status'] = 0;
		$this->db->update('modules', $data, array('module_name' => $module_name));
    }
    function get_active_modules() {
		$this->db->where('module_status', 1);
		$this->db->select('module_name');
		$query=$this->db->get('modules');
		$result =  $query->result_array();
		$active_modules = array();
		foreach($result as $row){
			$active_modules[]= $row['module_name']; 
		}
		return $active_modules;
    }
    function is_active($module_name){
		$this->db->where('module_name', $module_name);
		$this->db->select('module_status');
		$query=$this->db->get('modules');
		//echo $this->db->last_query();
		$row =  $query->row_array();
		if($row['module_status'] == 1){
			return TRUE;
		}else{
			return FALSE;
		}
    }
    function is_preloaded($module_name){
        $this->db->where('module_name', $module_name);
		$this->db->select('is_preloaded');
        $query=$this->db->get('modules');
        
        $row =  $query->row_array();
		if($row['is_preloaded'] == 1){
			return TRUE;
		}else{
			return FALSE;
		}
    }
    function get_license_key($module_name){
		$this->db->where('module_name', $module_name);
		$this->db->select('license_key');
		$query=$this->db->get('modules');
		$row =  $query->row_array();
		return $row['license_key'];
    }
    function activate_license($module_name){
		$data['license_status'] = 'active';
		//$data['sync_status'] = 0;
		$this->db->update('modules', $data, array('module_name' => $module_name));
	}
	function dectivate_license($module_name){
		$data['license_status'] = 'inactive';
		//$data['sync_status'] = 0;
		$this->db->update('modules', $data, array('module_name' => $module_name));
	}
	function set_license_key($module_name,$license_key){
		$data['license_key'] = $license_key;
		$data['license_status'] = '';
		//$data['sync_status'] = 0;
		$this->db->update('modules', $data, array('module_name' => $module_name));
	}

}

/* End of file module_model.php */





/* End of file module_model.php */
