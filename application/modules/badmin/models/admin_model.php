<?php 
defined('BASEPATH') OR exit('No direct script access allowed');





class admin_model extends CI_Model {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
   /**
	 * update_permission_to_group
	 *@author Cedric Mataso
	 * @param  mixed $id
	 * @param  mixed $value
	 * @return void
	 */
	public function update_permission_to_group($id,$value){
		$this->db->set('value',$value);
        $this->db->where('id',$id);
        $this->db->update('groups_permissions');
    }
    public function ggp(){
		return $this->db->get('groups_permissions')->result();
	}
    

}

/* End of file ModelName.php */

/* End of file filename.php */
