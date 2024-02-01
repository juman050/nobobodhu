<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 //require APPPATH.'/models/admin/Mod_common.php';
/**
*
*Description : This is Admin Pages Model
*@param 
*@return 
*@author Tj Thouhid
*@version 1.0 (21-01-2017)
*/
class Mod_pages extends CI_Model {
 

 
    public function __construct()
    {
        parent::__construct();
    }
  
    /**
     * ---This Function is for Inserting Data For urls
     *  
     * @return result true/false
     * @author Tj Thouhid
     * @version 2017-11-01
     */
    function get_slider_text(){
      
      $query = $this->db->get_where('home_page',array('title' => 'slider-text'));
      return $query->result()[0]->value;
     
      

    }     

    /**
     * ---This Function is for Inserting Data For urls
     *  
     * @param string $slidet_text_json for json data
     * @return result true/false
     * @author Tj Thouhid
     * @version 2017-11-01
     */
    function update_slider_text($slidet_text_json){
      // Insert function
      $date= date('Y-m-d h:i:s');
      $data_urls = array(
        "value"=>$slidet_text_json,
        "date"=>$date
      );
      $this->db->where('title', 'slider-text');
      $query=$this->db->update('home_page', $data_urls);
     
      if($query){
          //activity generate
          return true;

      }else{
          return false;
      }
      

    }
    /**
     * ---This Function is for get cover photo
     *  
     * @return result true/false
     * @author Tj Thouhid
     * @version 2017-11-01
     */
    function get_all_from_home(){
      
      $query = $this->db->get('home_page');
      $result=$query->result();
      $home_data=array();
      foreach ($result as $hmvalue) {
         $home_data[$hmvalue->title]=$hmvalue->value;
         
      }
      return $home_data;
     
      

    }   


    /**
     * ---This Function is for Inserting Data For urls
     *  
     * @param array $about_array for home data
     * @return result true/false
     * @author Tj Thouhid
     * @version 2017-11-01
     */
    function update_home_text($home){
      // Insert function
      $date= date('Y-m-d h:i:s');
      $data = array(
         array(
          "title"=>'project-title',
          "value"=>$home['project_title'],
          "date"=>$date
        ),
         array(
          "title"=>'project-btn',
          "value"=>$home['project_btn'],
          "date"=>$date
        )
      );

      $query=$this->db->update_batch('home_page', $data, 'title'); 
     
      if($query){
          //activity generate
          return true;

      }else{
          return false;
      }
      

    }   


    // about page start

    /**
     * ---This Function is for get cover photo
     *  
     * @return result true/false
     * @author Tj Thouhid
     * @version 2017-11-01
     */
    function get_all_from_about(){
      
      $query = $this->db->get('about_page');
      $result=$query->result();
      $home_data=array();
      foreach ($result as $hmvalue) {
         $home_data[$hmvalue->title]=$hmvalue->value;
         
      }
      return $home_data;
    }
    /**
     * ---This Function is for Inserting Data For urls
     *  
     * @param array $custom_two_array for about data
     * @return result true/false
     * @author Tj Thouhid
     * @version 2017-11-01
     */
    function update_about_page_text($custom_two_array){
      // Insert function
      $date= date('Y-m-d h:i:s');
      $data = array(
         array(
          "title"=>'about-title',
          "value"=>$custom_two_array['about_title'],
          "date"=>$date
        ),
         array(
          "title"=>'about-text',
          "value"=>$custom_two_array['about_text'],
          "date"=>$date
        )
      );

      $query=$this->db->update_batch('about_page', $data, 'title'); 
     
      if($query){
          //activity generate
          return true;

      }else{
          return false;
      }
      

    }


    // Contact page start

    /**
     * ---This Function is for get cover photo
     *  
     * @return result true/false
     * @author Tj Thouhid
     * @version 2017-11-01
     */
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
     * ---This Function is for Inserting Data For urls
     *  
     * @param array $custom_two_array for about data
     * @return result true/false
     * @author Tj Thouhid
     * @version 2017-11-01
     */
    function update_contact_page_text($custom_two_array){
      // Insert function
      $date= date('Y-m-d h:i:s');
      $data = array(
         array(
          "title"=>'contact-title',
          "value"=>$custom_two_array['contact_title'],
          "date"=>$date
        ),
         array(
          "title"=>'contact-text',
          "value"=>$custom_two_array['contact_text'],
          "date"=>$date
        )
      );

      $query=$this->db->update_batch('contact_page', $data, 'title'); 
     
      if($query){
          //activity generate
          return true;

      }else{
          return false;
      }
    }
    /**
     * ---This Function is for faq page
     *  
     * @return result true/false
     * @author Tj Thouhid
     * @version 2018-01-12
     */
    function get_all_faq(){
      
      $query = $this->db->get('faqs');
       if ($query) {
         return $query->result();
       }else{
          return false;
        } 

    }
      
    public function save_faq_info($res_data)
    {
      $query=$this->db->insert('faqs', $res_data); 
      if($query){
          return true;
      }else{
          return false;
      }
    } 

    public function delete_faq($delete_id)
    {
      $query=$this->db->delete('faqs', array('faq_id'=>$delete_id)); 
      if($query){
          return true;
      }else{
          return false;
      }
    }

 
}