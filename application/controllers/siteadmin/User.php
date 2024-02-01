<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	/**
	*
	*Description : This is Admin user Controller
	*
	*@param 
	*@return 
	*@author juman
	*@version 1.0 (17-01-2018)
	*/
	private $root_folder="admin";

	public function __construct()
	   {
	    parent::__construct();
	    $this->load->helper('user');
	    $this->load->model('admin/mod_user');

	   
	   }

	public function index(){
		$postedData =$this->input->post(NULL);
		// for datatable
		if(array_key_exists("start", $postedData)){
			$this->_get_user_tbl();
			return false;
		}else{
			$data['page_name']="user";
			$data['root_folder']=$this->root_folder;
			$data['dir']="users";
			$data['page']="index";	
			$this->load->view($this->root_folder."/main",$data);
			$this->load->view($this->root_folder."/users/users_js");
	   }
	}

	/**
	* This Function is for Getting Data Table For user 
	*
	* @param Post Table Param 
	* @return Success Result Table Jason
	* @author juman
	* @version 2017-12-01
	*/

	private function _get_user_tbl(){
		$postedData =$this->input->post(NULL, true);

		$params =array(
			'offset' =>$postedData['start'],
			'length' =>$postedData['length'],
			'search' =>$postedData['search']['value'],
			'sortings' =>isset($postedData['order'])? $postedData['order'] : array(),
			'sortings_columns' =>array("1" =>"sb.user_id"),
			'advance_searches' =>isset($postedData['advance_searches'])? $postedData['advance_searches'] : array(),
		);
		$resultForDatatable = $this->mod_user->get_user_list_datatable($params);
		$data = array();
		$serial_no = $postedData['start'];
		foreach ($resultForDatatable['data'] as $cdata) {
		
		    $row = array();
		    $row['0'] = ++$serial_no;
		    $row['1'] = $cdata->firstname;		    	    
		    $row['2'] =  $cdata->email;			    
		    $row['3'] = '<img width="100" src="'.site_url('uploads/users/').$cdata->user_photo.'"/>';		    
		    $row['4'] =generate_action_button("siteadmin/user",$cdata->user_id,false);	
		    $data[] = $row;
		}
		
		$output = array(
		                "draw" => $postedData['draw'],
		                "recordsFiltered" => $resultForDatatable['recordsFiltered'],
		                "recordsTotal" => $resultForDatatable['recordsTotal'],
		                "data" => $data,
		        );
		//output to json format
		echo json_encode($output); 

	}
	/**
	* This Function is for deleting user 
	*
	* @param Post delete id
	* @return Add page view
	* @author juman
	* @version 2018-05-13
	*/
	function delete(){
		$delete_id=$this->uri->segment(4);

		// Db Query Start
		$this->db->trans_begin();	
		
		try{
			$result=$this->mod_user->delete_data($delete_id);
			if($result==false){
				throw new Exception(lang("failure")." ".lang("delete"));
			}
			if ($this->db->trans_status() === FALSE)
			 {
			 	throw new Exception("transaction error");
			         // generate an error... or use the log_message() function to log your error
			 }
			 $this->db->trans_commit();
			 $results['notification_type']="success";
			 $results['notification_msg']=lang("success")." ".lang("deleted");
					 
			    	 
		}
		catch(Exception $E){
			$this->db->trans_rollback();
			$results['notification_type']="error";
			$results['notification_msg']=$E->getMessage();
			 			  	 
			
		}
		echo json_encode($results);
		exit;
		
		
	}

	


	    
	    
}

