<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {

	/**
	*
	*Description : This is Admin Settings Controller
	*
	*@param 
	*@return 
	*@author Tj Thouhid
	*@version 1.0 (15-01-2017)
	*/
	private $root_folder="admin";

	public function __construct()
	   {
	    parent::__construct();
	    $this->load->helper('user');
	    $this->load->model('admin/mod_settings');

	   
	   }

	public function index(){
		check_login();
		$postedData =$this->input->post(NULL);
		if(isset($postedData['update'])){
			$this->_update_settings($postedData,$_FILES);
		}
		$data['page_name']="Settings";

		$data['root_folder']=$this->root_folder;
		$data['dir']="settings";
		$data['page']="index";
		$data['settings']=$this->mod_settings->get_all_settings();

		$this->load->view($this->root_folder."/main",$data);
	}


	// for updating Settings
	private function _update_settings($postedData,$files){
		
		if(!isset($postedData['show_preloder'])){
			$postedData['show_preloder']=0;
		}

		// exit;
		$setting_data = array(
			'header_logo' => '',
			'pre_loader_img' => '',
			'footer_logo' => ''
		);
		$update_pass=0;
		if(isset($postedData['user_pass']) && $postedData['user_pass']!=""){
			$pass=$postedData['user_pass'];
			$cpass=$postedData['user_cpass'];
			if(strlen($pass) < 6){
				$this->session->set_flashdata('notification_msg', 'Password Length Must be 6 Charrachter');
				$this->session->set_flashdata('notification_type', 'danger');			  	 
				redirect(site_url("siteadmin/settings"));
				
			}
			else if($pass!==$cpass){
				$this->session->set_flashdata('notification_msg', 'Password and Confirm Password Do no Match');
			$this->session->set_flashdata('notification_type', 'danger');			  	 
			redirect(site_url("siteadmin/settings"));
			}
			else{
				$update_pass=1;
			}


		}
		$this->db->trans_begin();	
		
		try{

			if($update_pass===1){
				$update_pss=$this->mod_settings->update_password($pass);
				if($update_pss==False){
					throw new Exception("Somthing went wrong with updating password try later!");
				}
			}

			if($files['header_logo']['name']!=="" || $files['pre_loader_img']['name']!=="" || $files['footer_logo']['name']!==""){
				$upload_image=$this->_do_upload($files);
				if (array_key_exists('error', $upload_image)) {
					throw new Exception($upload_image['error']);
				}else{
					if (array_key_exists('header_logo', $upload_image)){
						$setting_data['header_logo']=$upload_image['header_logo'];
					}
					if (array_key_exists('pre_loader_img', $upload_image)){
						$setting_data['pre_loader_img']=$upload_image['pre_loader_img'];
					}
					if (array_key_exists('footer_logo', $upload_image)){
						$setting_data['footer_logo']=$upload_image['footer_logo'];
					}

					 
				}
			}
			$update_set=$this->mod_settings->update_settings($setting_data,$postedData);
			if($update_set==False){
				throw new Exception("Somthing went wrong try later!");
			}
			if ($this->db->trans_status() === FALSE)
			{
				throw new Exception("transaction error");
			        // generate an error... or use the log_message() function to log your error
			}
			 $this->db->trans_commit();
			 $this->session->set_flashdata('notification_msg', 'Setting Updated');
			 $this->session->set_flashdata('notification_type', 'success');
			 redirect(site_url("siteadmin/settings"));

		}
		catch(Exception $E){
			$this->db->trans_rollback();
			$this->session->set_flashdata('notification_msg', $E->getMessage());
			$this->session->set_flashdata('notification_type', 'danger');			  	 
			redirect(site_url("siteadmin/settings"));
			//echo "founc exception :".$E->getMessage();
		}
		exit;

	}

	/**
	* This Function is for uploading images 
	*
	* @param array $post_image
	* @return Success erro/upload success data
	* @author Tj Thouhid
	* @version 2017-01-24
	*/

	private function _do_upload($post_images)
    {
    	
        $config['upload_path']          = './uploads/settings/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 3000;
        $config['max_width']            = 1200;
        $config['max_height']           = 768;
        $config['encrypt_name']           = TRUE;
        $data = array();
        $this->load->library('upload', $config);
        if(isset($post_images['header_logo']) && $post_images['header_logo']['error']==0){
        	if ( ! $this->upload->do_upload('header_logo'))
        	{
        	     return   $error = array('error' => $this->upload->display_errors());

        	       // $this->load->view('upload_form', $error);
        	}
        	else
        	{		
        		  $img_data=$this->upload->data();
        	      $data['header_logo'] =$img_data['file_name'];

        	       // $this->load->view('upload_success', $data);
        	}
        }
        if(isset($post_images['pre_loader_img']) && $post_images['pre_loader_img']['error']==0){
        	if ( ! $this->upload->do_upload('pre_loader_img'))
        	{
        	     return   $error = array('error' => $this->upload->display_errors());

        	       // $this->load->view('upload_form', $error);
        	}
        	else
        	{		
        		  $img_data=$this->upload->data();
        	      $data['pre_loader_img'] =$img_data['file_name'];

        	       // $this->load->view('upload_success', $data);
        	}
        }
        if(isset($post_images['footer_logo']) && $post_images['footer_logo']['error']==0){
        	if ( ! $this->upload->do_upload('footer_logo'))
        	{
        	     return   $error = array('error' => $this->upload->display_errors());

        	       // $this->load->view('upload_form', $error);
        	}
        	else
        	{		
        		  $img_data=$this->upload->data();
        	      $data['footer_logo'] =$img_data['file_name'];

        	       // $this->load->view('upload_success', $data);
        	}
        }
        return $data;
        

        
    }

}

