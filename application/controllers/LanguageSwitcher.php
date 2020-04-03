<?php 
defined('BASEPATH') OR exit('No direct script access allowed');



/**
 * LanguageSwitcher
 * @author Cedric Mataso
 * 
 */
class LanguageSwitcher extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }
    

    public function switchLang($language="")
    {
       $language = ($language != "") ? $language : "en";
       $this->session->set_userdata('site_lang', $language);
       redirect($_SERVER['HTTP_REFERER']);
    }

}

/* End of file Controllername.php */


/* End of file LAnguageSwitcher.php */
