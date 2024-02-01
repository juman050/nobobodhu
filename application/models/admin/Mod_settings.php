<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 //require APPPATH.'/models/admin/Mod_common.php';
/**
*
*Description : This is Setting Model
*@param 
*@return 
*@author Tj Thouhid
*@version 1.0 2017-11-08
*/
class Mod_settings extends CI_Model {
 
    //var $table = 'tags';

 
    public function __construct()
    {
        parent::__construct();
        

    }
  
  
/**
 * ---This Function is for get cover photo
 *  
 * @return result true/false
 * @author Tj Thouhid
 * @version 2017-11-01
 */
function get_all_settings(){
  
  $query = $this->db->get('settings');
  $result=$query->result();
  $home_data=array();
  foreach ($result as $hmvalue) {
     $s_data[$hmvalue->setting_title]=$hmvalue->setting_value;
     
  }
  return $s_data;
 
  

}   
/**
 * ---This Function is for Updating pass For Setting
 *  
 * @param string $pass for about data
 * @return result true/false
 * @author Tj Thouhid
 * @version 2017-11-01
 */
function update_password($pass){
    $this->load->helper('encrypt');
    $pass=encrypt_pass($pass);
    $user_id=$this->session->userdata('user_id');
    $query=$this->db->update('sc_users', array('sc_user_password' => $pass ), array('sc_user_id' => $user_id ));
    
  if($query){
      //activity generate
      return true;

  }else{
      return false;
  }
}
/**
 * ---This Function is for Updating Data For Setting
 *  
 * @param array $about_array for about data
 * @return result true/false
 * @author Tj Thouhid
 * @version 2017-11-01
 */
function update_settings($image_data,$postedData){
  // Insert function
  $date= date('Y-m-d h:i:s');
  $data = array(
     array(
      "setting_title"=>'address',
      "setting_value"=>$postedData['office_address'],
      "date"=>$date
    ),
     array(
      "setting_title"=>'hour-of-operation',
      "setting_value"=>$postedData['hours_of_operation'],
      "date"=>$date
    ),
     array(
      "setting_title"=>'email',
      "setting_value"=>$postedData['email_ad'],
      "date"=>$date
    ),
     array(
      "setting_title"=>'phone',
      "setting_value"=>$postedData['phone_no'],
      "date"=>$date
    ),
     array(
      "setting_title"=>'map-lat',
      "setting_value"=>$postedData['lattitude'],
      "date"=>$date
    ),
     array(
      "setting_title"=>'map-lan',
      "setting_value"=>$postedData['longitude'],
      "date"=>$date
    ),
     array(
      "setting_title"=>'fb-link',
      "setting_value"=>$postedData['facebook-link'],
      "date"=>$date
    ),
     array(
      "setting_title"=>'tw-link',
      "setting_value"=>$postedData['twitter-link'],
      "date"=>$date
    ),
     array(
      "setting_title"=>'ln-link',
      "setting_value"=>$postedData['linkedin-link'],
      "date"=>$date
    ),
     array(
      "setting_title"=>'insta-link',
      "setting_value"=>$postedData['instra-link'],
      "date"=>$date
    ),
     array(
      "setting_title"=>'pre-loader',
      "setting_value"=>$postedData['show_preloder'],
      "date"=>$date
    )
  );
  if($image_data['header_logo']!==""){
    array_push($data,array(
      "setting_title"=>'logo-header',
      "setting_value"=>$image_data['header_logo'],
      "date"=>$date
    ));
  }
  if($image_data['footer_logo']!==""){
    array_push($data,array(
      "setting_title"=>'logo-footer',
      "setting_value"=>$image_data['footer_logo'],
      "date"=>$date
    ));
  }
  if($image_data['pre_loader_img']!==""){
    array_push($data,array(
      "setting_title"=>'pre-loader-img',
      "setting_value"=>$image_data['pre_loader_img'],
      "date"=>$date
    ));
  }

  $query=$this->db->update_batch('settings', $data, 'setting_title'); 
 
  if($query){
      //activity generate
      return true;

  }else{
      return false;
  }
  

}


 
}