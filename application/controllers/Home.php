
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	*
	*Description : This is home Controller
	*
	*@param 
	*@return 
	*@author juman
	*@version 1.0 (27-01-2018)
	*/
	private $root_folder="front";

	public function __construct()
	   {
	    parent::__construct();
	 
	    $this->load->model('mod_home');
	    $this->load->model('mod_common');
	    $this->load->model('mod_user_auth');   
	   }

	public function index(){
		   $user_logged_in = $this->session->userdata('user_logged_in');
		if ($user_logged_in !== null) {
			$this->session->set_flashdata('notification_msg', 'you can not access this page.');
		   $this->session->set_flashdata('notification_type', 'error');
			redirect('users');
		}
		$data['page_name']="Home";
		$data['root_folder']=$this->root_folder;
		$data['dir']="landing";
		$data['page']="index";
		$data['settings']=$this->mod_common->get_all_settings();
		$this->load->view($this->root_folder."/main",$data);
	}


	// Validate and store registration data in database
	public function new_user_registration() {

		$postedData =$this->input->post(NULL);
		$postedData['password']  = md5($postedData['password']);		
		if (!$this->mod_user_auth->check_email($postedData['email'])) {
				$this->db->trans_begin();
		 		try{
		 			$this->mod_user_auth->save_user_info($postedData);
		 			
		 			if ($this->db->trans_status() === FALSE){
						throw new Exception("transaction error");
					}
					$this->db->trans_commit();
					$this->session->set_flashdata('notification_msg', lang('success').' '.lang('inserted'));
					$this->session->set_flashdata('notification_type', 'success');
					redirect(site_url('home'));
				}catch(Exception $E){
				    $this->db->trans_rollback();
				    $this->session->set_flashdata('notification_type', 'error');
				    $this->session->set_flashdata('notification_msg', $E->getMessage());
					redirect(site_url('home'));
				}
		}else{
			$this->session->set_flashdata('notification_type', 'error');
		    $this->session->set_flashdata('notification_msg', 'This email already exists.try another!');
			redirect(site_url('home'));
		}
		
		
	}
	public function forgot()
	{
		$postedData =$this->input->post(NULL);
		$res = $this->mod_home->check_email($postedData['email']);
		if (!$res) {
			$this->session->set_flashdata('notification_type', 'error');
		    $this->session->set_flashdata('notification_msg', 'your email does not exists.try valid one!');
			redirect(site_url('home'));
		}else{
			$x = 6; // Amount of digits
			$min = pow(10,$x);
			$max = pow(10,($x+1)-1);
			$code = rand($min, $max);
			$data['user_id'] = $res->user_id;
			$data['code'] = $code;
			$query = $this->db->insert('password_reset',$data);
			if ($query) {
		        $this->load->library('email'); 
		        $from = "no-reply@nobobodu.com";    //senders email address
		        $subject = 'Password reset';  //email subject
		        
		        //sending confirmEmail($receiver) function calling link to the user, inside message body
		        $message = 'Dear User,<br><br> here is your password reset code = '.$code.'<br><br>password reset link here..<br><br>
		        <a href="'.site_url('home').'">'.site_url('home/reset/').$data['user_id'].'</a><br><br>Thanks';

		        //config email settings
		        $config['mailtype'] = 'html';
		        $this->email->initialize($config);      
		       //send email
		        $this->email->from($from);
		        $this->email->to($email);
		        $this->email->subject($subject);
		        $this->email->message($message);       
		        $this->email->send();
		        $this->session->set_flashdata('notification_msg', 'password reset code sent to your email please check.');
				$this->session->set_flashdata('notification_type', 'success');
				redirect(site_url('home'));
				exit;
		    }else{
		        return false;
		    }
		}
		
       
	}

	public function reset()
	{
		$data['user_id'] = $this->uri->segment(3);
		$data['page_name']="Reset code";
		$data['root_folder']=$this->root_folder;
		$data['dir']="reset";
		$data['page']="index";
		$data['settings']=$this->mod_common->get_all_settings();
		$this->load->view($this->root_folder."/main",$data);
	}

	public function confirm_reset()
	{
		$postedData['user_id'] = $this->uri->segment(3);
		$postedData =$this->input->post(NULL);
		$postedData['code'] = $postedData['code'] ? $postedData['code'] : "";
		$res = $this->db->mod_home->check_code($postedData);
		if (!$res) {
			$this->session->set_flashdata('notification_type', 'error');
		    $this->session->set_flashdata('notification_msg', 'invalid code.');
		    redirect(site_url('home/reset/'.$postedData['user_id']));
		}else{
		    $data['user_id'] = $this->uri->segment(3);
			$data['page_name']="Reset Password";
			$data['root_folder']=$this->root_folder;
			$data['dir']="reset";
			$data['page']="password";
			$data['settings']=$this->mod_common->get_all_settings();
			$this->load->view($this->root_folder."/main",$data);		
		}
	}
	public function change_password()
	{
		
	}


	public function find_user()
	{
		$postedData =$this->input->post(NULL);
		if ($postedData) {
			$data['page_name']="Search";
			$data['root_folder']=$this->root_folder;
			$data['dir']="search";
			$data['page']="index";
			$data['settings']=$this->mod_common->get_all_settings();
			$data['result'] = $this->mod_home->search_user($postedData);
			$this->load->view($this->root_folder."/main",$data);
		}else{
			$this->session->set_flashdata('notification_type', 'error');
		    $this->session->set_flashdata('notification_msg', 'something wrong');
			redirect(site_url('home'));
		}
		
	}

	public function get_user()
	{
		$user_logged_in = $this->session->userdata('user_logged_in');
		if ($user_logged_in == null) {
			$this->session->set_flashdata('notification_msg', 'please login before access this page .');
		   $this->session->set_flashdata('notification_type', 'error');
			redirect('home');
		}
		$data['page_name']="Search";
		$data['root_folder']=$this->root_folder;
		$data['dir']="user_profile";
		$data['page']="index";
	    $data['settings']=$this->mod_common->get_all_settings();
		$id = $this->session->userdata('user_id');
		$user_id = $this->uri->segment(3);
		if ($id == $user_id) {
			return redirect('users/profile');
		}else{
			$data['get_user'] = $this->mod_home->get_user_by_id($user_id);
			$this->load->view($this->root_folder."/main",$data);
		}
	}




}
