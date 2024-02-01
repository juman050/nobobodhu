<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	*
	*Description : This is Admin Login Controller
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
	   
	   }

	public function index()
	{
		check_login();
		$postedData =$this->input->post(NULL);
		if(isset($postedData['user_name'])){
			$data = array(
			'user_name' => $postedData['user_name'],
			'pass' => $postedData['user_pass']
			 );
			if(login_user($data)){
				$this->session->set_flashdata('notification_msg', lang('success_login'));
				$this->session->set_flashdata('notification_type', 'success');
				redirect(site_url('siteadmin/dashboard'));
			}else{
				$this->session->set_flashdata('notification_msg', lang('wrong_user_detail'));
				$this->session->set_flashdata('notification_type', 'error');
				
			}
		}
		$this->load->view('admin/login/index');
	}
	function logout(){
		if(user_logout()){
			$this->session->set_flashdata('notification_msg', lang("logout_msg"));
			$this->session->set_flashdata('notification_type', 'success');
			redirect(site_url('siteadmin/login'));
			
		}
		
	}






}
