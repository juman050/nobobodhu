<?php

Class User_Authentication extends CI_Controller {
    /**
	*
	*Description : This is user auth Controller
	*
	*@param 
	*@return 
	*@author juman
	*@version 1.0 (03-05-2018)
	*/
	private $root_folder="front";
	public function __construct() {
	  parent::__construct();
	  $this->load->model('mod_user_auth');
	  $user_logged_in = $this->session->userdata('user_logged_in');
		if ($user_logged_in !== null) {
			$this->session->set_flashdata('notification_msg', 'you can not access this page .');
		   $this->session->set_flashdata('notification_type', 'error');
			redirect('users');
		}
	}

	

	// Check for user login process
	public function user_login_process() {
		$postedData =$this->input->post(NULL);
		$result =$this->mod_user_auth->login_process($postedData);
		if ($result==false) {
			$this->session->set_flashdata('notification_type', 'error');
		    $this->session->set_flashdata('notification_msg', 'Username or password not match!try again.');
			redirect(site_url('home'));
		}else{
			$this->session->set_flashdata('notification_type', 'success');
		    $this->session->set_flashdata('notification_msg', 'successfully logged in.');
			redirect(site_url('users'));
		}
		
	}

}

?>