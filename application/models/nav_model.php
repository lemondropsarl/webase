<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class nav_model extends CI_Model {

    
    public function __construct()
    {
       $this->load->database();
       $this->load->model('auth/ion_auth_model');
        //Do your magic here
    }
    public function get_nav_menus(){
        
       return $this->db->get('navigation_menu')->result_array();
    }
    public function get_acl_modules($user_id = FALSE){
        if (!$user_id) {
           $user_id = $this->session->userdata('user_id');
        }
        $user_groups = $this->ion_auth_model->get_user_groups($user_id);
        $input = array();
        if (is_array($user_groups)) {
          $query = $this->db->select('module_name')
                    ->where_in('group_id',$user_groups)
                    ->where(array('value'=>'1'))
                    ->get('acl_modules');
          
              $rows = $query->result_array();
             foreach ($rows as $module) {
                if (!in_Array($module['module_name'],$input)) {
                   array_push($input,$module{'module_name'});
                }
             }         
        }
        return $input;
       
    }
    public function get_acl_menus(){
        return $this->db->get('acl_menus')->result_array();

    }
    

}

/* End of file nav_model.php */
