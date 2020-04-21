<?php 
defined('BASEPATH') OR exit('No direct script access allowed');





class admin_model extends CI_Model {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function update_permission_to_group($id,$value){
		       $this->db->set('value',1);
               $this->db->where('id',$id[$i]);
               $this->db->update('groups_permissions');
    }
    public function ggp(){
		return $this->db->get($this->tables['groups_permissions'])->result();
	}
    

}

/* End of file ModelName.php */

/* End of file filename.php */
