<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 //require APPPATH.'/models/admin/Mod_common.php';
/**
*
*Description : This is home Model
*@param 
*@return 
*@author juman
*@version 1.0 (26-01-2018)
*/
class Mod_home extends CI_Model {
 

 
    public function __construct()
    {
        parent::__construct();
    }

    // search user data
  	public function search_user($post)
  	{
  	  $gender=$post['gender'];
  	  $country=$post['country'];
  	  $religion=$post['religion'];
  	  $marital_status=$post['marital_status'];
  	  $current = date('Y');
  	  $age_from = $current - $post['age_from'];
  	  $age_to = $current - $post['age_to'];
  	  $sql = "select * from users 
  	           where 
  	           (year(birthday) >= '$age_to' and year(birthday) <= '$age_from')
  	           and 
  	           gender='$gender' 
  	           and 
  	           country='$country' 
  	           and 
  	           religion='$religion' 
  	           and 
  	           marital_status='$marital_status' ";
  	  $query = $this->db->query($sql);
        if($query->num_rows()>0) {
          return $query->result_array();
        }else{
          return false;
        }
  	}

    public function get_user_by_id($id)
    {
      $query = $this->db->get_where('users',array('user_id'=>$id));
      if($query->num_rows()>0) {
        return $query->row();
      }else{
        return false;
      }
    }
    public function check_email($email){
      $query = $this->db->get_where('users',array('email'=>$email));
      if($query->num_rows()>0) {
        return $query->row();
      }else{
        return false;
      }
    }

 
}