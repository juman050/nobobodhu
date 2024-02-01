<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	/**
	*
	*Description : This is Users Controller
	*
	*@param 
	*@return 
	*@author juman
	*@version 1.0 (03-05-2018)
	*/
	private $root_folder="front";

	public function __construct()
	{
	    parent::__construct();
	    $user_logged_in = $this->session->userdata('user_logged_in');
		if ($user_logged_in == NULL) {
			$this->session->set_flashdata('notification_msg', 'you can not access this page .');
		   $this->session->set_flashdata('notification_type', 'error');
			redirect('home');
		}
	    $this->load->model('mod_user');
	    $this->load->model('mod_common');
	    
		
	}

	public function index(){
		$data['page_name']="home";
		$data['root_folder']=$this->root_folder;
		$data['dir']="home";
		$data['page']="index";
		$data['settings']=$this->mod_common->get_all_settings();
		$data['feed_user']=$this->mod_user->get_data();
		$this->load->view($this->root_folder."/main",$data);
	}

	public function profile()
	{
		$id = $this->session->userdata('user_id');
		$data['page_name']="Profile";
		$data['root_folder']=$this->root_folder;
		$data['dir']="profile";
		$data['page']="index";
		$data['settings']=$this->mod_common->get_all_settings();
		$data['get_user_data']=$this->mod_user->get_user($id);
		$this->load->view($this->root_folder."/main",$data);
	}
	public function interested_people()
	{
		$id = $this->session->userdata('user_id');
		$data['page_name']="Conversations";
		$data['root_folder']=$this->root_folder;
		$data['dir']="interest";
		$data['page']="index";
		$data['settings']=$this->mod_common->get_all_settings();
		$data['get_interest']=$this->mod_user->get_interest_list($id);
		$this->load->view($this->root_folder."/main",$data);
	}

	public function conversations()
	{
		$id = $this->session->userdata('user_id');
		$data['page_name']="Conversations";
		$data['root_folder']=$this->root_folder;
		$data['dir']="message";
		$data['page']="index";
		$data['settings']=$this->mod_common->get_all_settings();
		$data['get_conversation']=$this->mod_user->get_recieve_conversation($id);
		$this->load->view($this->root_folder."/main",$data);
	}
	public function reply_to()
	{
		$id = $this->session->userdata('user_id');
		$conversation_id = $this->uri->segment(3);
		$data['page_name']="Conversations";
		$data['root_folder']=$this->root_folder;
		$data['dir']="message";
		$data['page']="box";
		$data['settings']=$this->mod_common->get_all_settings();
		$data['get_conversation']=$this->mod_user->get_recieve_conversation($id);
		$data['get_msg']=$this->mod_user->get_conversation_byId($id,$conversation_id);
		$this->load->view($this->root_folder."/main",$data);
	}
	public function reply_message()
	{
		$conversation_id = $this->uri->segment(3);
		$postedData =$this->input->post(NULL);
		$id = $this->session->userdata('user_id');
      
		$user_to = $this->mod_user->get_user_to($conversation_id);
		if ($user_to !== false) {
			$postedData['conversation_id'] = $conversation_id;
			if ($user_to->user_from !== $id && $user_to->user_to == $id) {
	          $postedData['recipient_id'] = $user_to->user_from;
	        }else{
	        	$postedData['recipient_id'] = $user_to->user_to;
	        }
	        $postedData['sender_id'] = $id;
			$postedData['sent_at'] = date('Y-m-d h:i:s');
			// echo "<pre>";
			// print_r($postedData);
			// exit;
			$this->mod_user->add_message($postedData);
			return redirect('users/reply_to/'.$conversation_id);
		}else{
			echo "false";
			exit;
		}
		
	}

	public function update_personal_info()
	{
		$id = $this->session->userdata('user_id');
		$postedData =$this->input->post(NULL);
		$this->db->trans_begin();
 		try{
 			$this->mod_user->update_personal_info($postedData,$id);
 			
 			if ($this->db->trans_status() === FALSE){
				throw new Exception("transaction error");
			}
			$this->db->trans_commit();
			$this->session->set_flashdata('notification_msg', "updated successfully");
			$this->session->set_flashdata('notification_type', 'success');
			redirect(site_url('users/profile'));
		}catch(Exception $E){
		    $this->db->trans_rollback();
		    $this->session->set_flashdata('notification_type', 'error');
		    $this->session->set_flashdata('notification_msg', $E->getMessage());
			redirect(site_url('users/profile'));
		}
	}

	public function update_preferance_info()
	{
		$id = $this->session->userdata('user_id');
		$postedData =$this->input->post(NULL);
		$this->db->trans_begin();
 		try{
 			$this->mod_user->update_preferance_info($postedData,$id);
 			
 			if ($this->db->trans_status() === FALSE){
				throw new Exception("transaction error");
			}
			$this->db->trans_commit();
			$this->session->set_flashdata('notification_msg', "updated successfully");
			$this->session->set_flashdata('notification_type', 'success');
			redirect(site_url('users/profile'));
		}catch(Exception $E){
		    $this->db->trans_rollback();
		    $this->session->set_flashdata('notification_type', 'error');
		    $this->session->set_flashdata('notification_msg', $E->getMessage());
			redirect(site_url('users/profile'));
		}
	}

	public function update_password()
	{
		$id = $this->session->userdata('user_id');
		$postedData =$this->input->post(NULL);
		$this->db->trans_begin();
 		try{
 			$this->mod_user->update_password($postedData,$id);
 			
 			if ($this->db->trans_status() === FALSE){
				throw new Exception("transaction error");
			}
			$this->db->trans_commit();
			$this->session->set_flashdata('notification_msg', "password updated successfully");
			$this->session->set_flashdata('notification_type', 'success');
			redirect(site_url('users/profile'));
		}catch(Exception $E){
		    $this->db->trans_rollback();
		    $this->session->set_flashdata('notification_type', 'error');
		    $this->session->set_flashdata('notification_msg', $E->getMessage());
			redirect(site_url('users/profile'));
		}
	}

	public function update_user_photo()
	{
		$id = $this->session->userdata('user_id');
		$postedData = $this->input->post(NULL);
		$resData['photo_access'] = isset($postedData['photo_access'])?$postedData['photo_access']:"";
		$this->db->trans_begin();
 		try{
 			$resData['user_photo']=""; 
 			if($_FILES['user_photo']['name']!==""){
 				$upload_image=$this->_upload_thumb($_FILES);
 				if (array_key_exists('error', $upload_image)) {
 					throw new Exception($upload_image['error']);
 				}else{
 					$resData['user_photo']=$upload_image['upload_data']['file_name'];
 				}
 				$this->mod_user->update_photo($resData,$id);
 			}
 			$this->mod_user->update_photo(array('photo_access'=>$resData['photo_access']),$id);
 			
 			
 			if ($this->db->trans_status() === FALSE){
				throw new Exception("transaction error");
			}
			$this->db->trans_commit();
			$this->session->set_flashdata('notification_msg', "Photo updated successfully");
			$this->session->set_flashdata('notification_type', 'success');
			redirect(site_url('users/profile'));
		}catch(Exception $E){
		    $this->db->trans_rollback();
		    $this->session->set_flashdata('notification_type', 'error');
		    $this->session->set_flashdata('notification_msg', $E->getMessage());
			redirect(site_url('users/profile'));
		}
	}

	public function update_gallery()
	{
		$id = $this->session->userdata('user_id');
		$postedData = $this->input->post(NULL);
		$this->db->trans_begin();
 		try{
 			// $resData['gallery1']=""; 
 			// $resData['gallery2']=""; 
 			// $resData['gallery3']=""; 
 			// $resData['gallery4']=""; 
 			if($_FILES['gallery1']['name']!==""){
 				$upload_image=$this->_upload_thumb1($_FILES);
 				if (array_key_exists('error', $upload_image)) {
 					throw new Exception($upload_image['error']);
 				}else{
 					$resData['gallery1']=$upload_image['upload_data']['file_name'];
 				}
 				$this->mod_user->update_photo($resData,$id);
 			}

 			if($_FILES['gallery2']['name']!==""){
 				$upload_image=$this->_upload_thumb2($_FILES);
 				if (array_key_exists('error', $upload_image)) {
 					throw new Exception($upload_image['error']);
 				}else{
 					$resData['gallery2']=$upload_image['upload_data']['file_name'];
 				}	
 				$this->mod_user->update_photo($resData,$id);
 			}

 			if($_FILES['gallery3']['name']!==""){
 				$upload_image=$this->_upload_thumb3($_FILES);
 				if (array_key_exists('error', $upload_image)) {
 					throw new Exception($upload_image['error']);
 				}else{
 					$resData['gallery3']=$upload_image['upload_data']['file_name'];
 				}
 				$this->mod_user->update_photo($resData,$id);
 			}
 			if($_FILES['gallery4']['name']!==""){
 				$upload_image=$this->_upload_thumb4($_FILES);
 				if (array_key_exists('error', $upload_image)) {
 					throw new Exception($upload_image['error']);
 				}else{
 					$resData['gallery4']=$upload_image['upload_data']['file_name'];
 				}
 				$this->mod_user->update_photo($resData,$id);
 			}
 			
 			
 			
 			if ($this->db->trans_status() === FALSE){
				throw new Exception("transaction error");
			}
			$this->db->trans_commit();
			$this->session->set_flashdata('notification_msg', "Gallery upload successfully");
			$this->session->set_flashdata('notification_type', 'success');
			redirect(site_url('users/profile'));
		}catch(Exception $E){
		    $this->db->trans_rollback();
		    $this->session->set_flashdata('notification_type', 'error');
		    $this->session->set_flashdata('notification_msg', $E->getMessage());
			redirect(site_url('users/profile'));
		}
	}

	private  function _upload_thumb($image)
	{	
	    $config['upload_path']          = './uploads/users/';
	    $config['allowed_types']        = 'gif|jpg|png';
	    $config['max_size']             = 3000;
	    $config['max_width']            = 1440;
	    $config['max_height']           = 768;

	    $this->load->library('upload', $config);

	    if ( ! $this->upload->do_upload('user_photo'))
	    {
	         return   $error = array('error' => $this->upload->display_errors());

	           // $this->load->view('upload_form', $error);
	    }
	    else
	    {
	           return $data = array('upload_data' => $this->upload->data());

	           // $this->load->view('upload_success', $data);
	    }
	}

	private  function _upload_thumb1($image)
	{	
	    $config['upload_path']          = './uploads/users/';
	    $config['allowed_types']        = 'gif|jpg|png';
	    $config['max_size']             = 3000;
	    $config['max_width']            = 1440;
	    $config['max_height']           = 768;

	    $this->load->library('upload', $config);

	    if ( ! $this->upload->do_upload('gallery1'))
	    {
	         return   $error = array('error' => $this->upload->display_errors());

	           // $this->load->view('upload_form', $error);
	    }
	    else
	    {
	           return $data = array('upload_data' => $this->upload->data());

	           // $this->load->view('upload_success', $data);
	    }
	}

	private  function _upload_thumb2($image)
	{	
	    $config['upload_path']          = './uploads/users/';
	    $config['allowed_types']        = 'gif|jpg|png';
	    $config['max_size']             = 3000;
	    $config['max_width']            = 1440;
	    $config['max_height']           = 768;

	    $this->load->library('upload', $config);

	    if ( ! $this->upload->do_upload('gallery2'))
	    {
	         return   $error = array('error' => $this->upload->display_errors());

	           // $this->load->view('upload_form', $error);
	    }
	    else
	    {
	           return $data = array('upload_data' => $this->upload->data());

	           // $this->load->view('upload_success', $data);
	    }
	}

	private  function _upload_thumb3($image)
	{	
	    $config['upload_path']          = './uploads/users/';
	    $config['allowed_types']        = 'gif|jpg|png';
	    $config['max_size']             = 3000;
	    $config['max_width']            = 1440;
	    $config['max_height']           = 768;

	    $this->load->library('upload', $config);

	    if ( ! $this->upload->do_upload('gallery3'))
	    {
	         return   $error = array('error' => $this->upload->display_errors());

	           // $this->load->view('upload_form', $error);
	    }
	    else
	    {
	           return $data = array('upload_data' => $this->upload->data());

	           // $this->load->view('upload_success', $data);
	    }
	}

	private  function _upload_thumb4($image)
	{	
	    $config['upload_path']          = './uploads/users/';
	    $config['allowed_types']        = 'gif|jpg|png';
	    $config['max_size']             = 3000;
	    $config['max_width']            = 1440;
	    $config['max_height']           = 768;

	    $this->load->library('upload', $config);

	    if ( ! $this->upload->do_upload('gallery4'))
	    {
	         return   $error = array('error' => $this->upload->display_errors());

	           // $this->load->view('upload_form', $error);
	    }
	    else
	    {
	           return $data = array('upload_data' => $this->upload->data());

	           // $this->load->view('upload_success', $data);
	    }
	}




	public function interested()
	{
		$interest_id = $this->uri->segment(3);
		if (!$interest_id) {
			return redirect('home');
		}else{
			$check = $this->mod_user->check_interest($interest_id);
			if (!$check) {
				$interest = $this->mod_user->insert_interest($interest_id);
				if ($interest) {
				   $this->session->set_flashdata('notification_type', 'success');
			       $this->session->set_flashdata('notification_msg', 'interested.');
				   redirect(site_url('home/get_user/'.$interest_id));
				}
			}
		}
	}

	public function send_message()
	{
		$postedData = $this->input->post(NULL);
		$id = $this->session->userdata('user_id');
		$postedData['sender_id'] = $id;
		$check = $this->mod_user->check_conversation($id,$postedData['recipient_id']);
		if (!$check) { 
			$postedData['conversation_id'] = $this->mod_user->insert_conversation($id,$postedData['recipient_id']);
			$send = $this->mod_user->send_msg($postedData);
			if ($send) {
				$this->session->set_flashdata('notification_type', 'success');
				$this->session->set_flashdata('notification_msg', 'msg sent successfully.');
				redirect(site_url('home/get_user/'.$postedData['recipient_id']));
			}
		}else{
			$postedData['conversation_id'] = $check->conversation_id;
			$send = $this->mod_user->send_msg($postedData);
			if ($send) {
				$this->session->set_flashdata('notification_type', 'success');
				$this->session->set_flashdata('notification_msg', 'msg sent successfully.');
				redirect(site_url('home/get_user/'.$postedData['recipient_id']));
			}

		}
		
	}



	public function logout()
	{
		$this->session->unset_userdata('user_logged_in');
		$id = $this->session->unset_userdata('user_id');
		$this->session->unset_userdata('email');
		$this->db->where('user_id',$id);
        $this->db->update('users',array('is_login'=>'0'));
		$this->session->set_flashdata('notification_msg', 'successfully logout.');
		$this->session->set_flashdata('notification_type', 'success');
		redirect(site_url('home'));
	}




}
