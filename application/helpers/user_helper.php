<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


// if ( ! function_exists('generate_users'))
// {
// 	/**
// 	* This Function is for Generating User 
// 	* @param array $User Data for User Table
// 	* @return error/userId
// 	* @author Tj Thouhid
// 	* @version 2017-02-01
// 	*/

//     function generate_users($users_data=array())
//     {
//     	$CI =& get_instance();
//     	if (array_key_exists('user_id', $users_data)) {	

//     		$users_data['modified']=date('Y-m-d h:i:s');
//     		$users_data['deleted']=0;
//     		$query=$CI->db->update('users',$users_data, array('user_id' => $users_data['user_id']));
//     		if($query){
    		   

//     		    $log_data = array(
//     		        "action" => "Updated",
//     		        "log_table" => 'users',
//     		        "log_id" => $users_data['user_id'],
//     		        "log_query" => ""
    		      
//     		    );
//     		    generate_activity_log($log_data);
//     		    return $users_data['user_id'];
//     		   }else{
//     		   	throw new Exception("Somthing Went Wrong Inserting User");
//     		   }	   
    	   
//     	}else{

//     		$users_data['created']=date('Y-m-d h:i:s');
//     		$users_data['modified']=date('Y-m-d h:i:s');
//     		$users_data['deleted']=0;
//     		$query=$CI->db->insert('users',$users_data);
//     		if($query){
//     		    $insert_id=$CI->db->insert_id();

//     		    $log_data = array(
//     		        "action" => "inserted",
//     		        "log_table" => 'users',
//     		        "log_id" => $insert_id,
//     		        "log_query" => ""
    		      
//     		    );
//     		    generate_activity_log($log_data);
//     		    return $insert_id;
//     		   }else{
//     		   	throw new Exception("Somthing Went Wrong Inserting User");
//     		   }		
    		
//     	}
 
    	
//     }
// }

if ( ! function_exists('login_user'))
{
    /**
    * This Function is for Get User 
    * @param array $User Data for User Table
    * @return error/userId
    * @author Tj Thouhid
    * @version 2017-10-22
    */

    function login_user($users_data=array())
    {
        //$email=isset($users_data['email']) ? $users_data['email'] : "";
        $user_name=isset($users_data['user_name']) ? $users_data['user_name'] : "";
        $pass=isset($users_data['pass']) ? $users_data['pass'] : "";
        $CI =& get_instance();
        $CI->load->helper('encrypt');
        $pass=encrypt_pass($pass);
        $query=$CI->db->get_where('sc_users', array('sc_user_name' => $user_name,'sc_user_password' => $pass),1);
        if ($query->num_rows()) {
            $result=$query->row();
             $data['user_id']=$result->sc_user_id;
             $data['user_name']=$result->sc_user_name;
             $data['user_type']=$result->sc_user_type;
             $data['logged_in']=true;
             $CI->session->set_userdata($data);
             return true;
         }else{
            return false;
         }
    }
}
if ( ! function_exists('check_login'))
{
    /**
    * This Function is for Get User 
    * @param array $User Data for User Table
    * @return error/userId
    * @author Tj Thouhid
    * @version 2017-10-22
    */

    function check_login()
    {
        $CI =& get_instance();
        $class=$CI->router->class;
        $method=$CI->router->method;
        if($CI->session->userdata('logged_in')){
            
            if($class==="login"){
                $CI->session->set_flashdata('notification_msg', lang('access_denied'));
                $CI->session->set_flashdata('notification_type', 'warning');
                redirect(site_url('siteadmin/dashboard'));
                return true;
            }
            
        }else{
            if($class!=="login"){
                $CI->session->set_flashdata('notification_msg', lang('access_denied'));
                $CI->session->set_flashdata('notification_type', 'warning');
                redirect(site_url('siteadmin/login'));
                return false;
            }
        }
    
    }
}
if ( ! function_exists('user_logout'))
{
    /**
    * This Function is for Get User 
    * @param array $User Data for User Table
    * @return error/userId
    * @author Tj Thouhid
    * @version 2017-10-22
    */

    function user_logout()
    {
        $CI =& get_instance();
         $CI->session->unset_userdata('user_id');
         $CI->session->unset_userdata('user_name');
         $CI->session->unset_userdata('user_type');
         $CI->session->unset_userdata('logged_in');
         //$CI->session->sess_destroy();
         return true;
         
    }
}