<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 //require APPPATH.'/models/admin/Mod_common.php';
/**
*
*Description : This is Common Model
*@param 
*@return 
*@author Tj Thouhid
*@version 1.0 (21-01-2017)
*/
class Mod_common extends CI_Model {
 

 
    public function __construct()
    {
        parent::__construct();
        

    }
function get_all_from_contact(){
  
  $query = $this->db->get('contact_page');
  $result=$query->result();
  $home_data=array();
  foreach ($result as $hmvalue) {
     $home_data[$hmvalue->title]=$hmvalue->value;
     
  }
  return $home_data;
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



 
}