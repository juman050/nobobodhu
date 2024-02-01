<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
*
*Description : This is auth Model
*@param 
*@return 
*@author juman
*@version 1.0 (03-05-2018)
*/
class Mod_user_auth extends CI_Model {
 

 
    public function __construct()
    {
        parent::__construct();
        

    }
    // Insert registration data in database
	public function save_user_info($data) {

	 $query= $this->db->insert("users",$data);
      if($query){
          return true;
       }else{
        return false;
      }
	}
    // check if user email exist
	public function check_email($email)
	{
	  $query = $this->db->get_where('users',array('email' => $email));
      if($query->num_rows()>0) {
        return true;
      }else{
        return false;
      }
	}

	//login process
	public function login_process($postedData)
	{
    
	  $data = array(
	  	'email' => $postedData['email'], 
	  	'password' => md5($postedData['password'])
	  );
	  $query = $this->db->get_where('users',$data);
      if($query->num_rows()>0) {
        $result=$query->row();
        $sdata = array();
        $sdata['user_id'] = $result->user_id;
        $sdata['email'] = $result->email;
        $sdata['email'] = $result->email;
        $sdata['user_logged_in'] = true;
        $this->session->set_userdata($sdata);
        $this->db->where('user_id',$result->user_id);
        $this->db->update('users',array('is_login'=>'1'));
        return true;
      }else{
        return false;
      }
	}

 
}