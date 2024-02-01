<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Portfolio extends CI_Controller {

	/**
	*
	*Description : This is Admin portfolio Controller
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
	    $this->load->model('admin/mod_portfolio');

	   
	   }

	public function index(){
		$postedData =$this->input->post(NULL);
		// for datatable
		if(array_key_exists("start", $postedData)){
			$this->_get_portfolio_tbl();
			return false;
		}else{
			$data['page_name']="portfolio";
			$data['root_folder']=$this->root_folder;
			$data['dir']="portfolio";
			$data['page']="index";	
			$this->load->view($this->root_folder."/main",$data);
			$this->load->view($this->root_folder."/portfolio/portfolio_js");
	   }
	}

	/**
	* This Function is for Getting Data Table For portfolios 
	*
	* @param Post Table Param 
	* @return Success Result Table Jason
	* @author juman
	* @version 2017-12-01
	*/

	private function _get_portfolio_tbl(){
		$postedData =$this->input->post(NULL, true);

		$params =array(
			'offset' =>$postedData['start'],
			'length' =>$postedData['length'],
			'search' =>$postedData['search']['value'],
			'sortings' =>isset($postedData['order'])? $postedData['order'] : array(),
			'sortings_columns' =>array("1" =>"sb.portfolio_id"),
			'advance_searches' =>isset($postedData['advance_searches'])? $postedData['advance_searches'] : array(),
		);
		$resultForDatatable = $this->mod_portfolio->get_portfolio_list_datatable($params);
		$data = array();
		$serial_no = $postedData['start'];
		foreach ($resultForDatatable['data'] as $cdata) {
		
		    $row = array();
		    $row['0'] = ++$serial_no;
		    $row['1'] = $cdata->portfolio_title;		    	    
		    $row['2'] = '<img width="100" src="'.site_url('uploads/portfolios/').$cdata->portfolio_img.'"/>';		    
		    $row['3'] = $cdata->updated;		    
		    $row['4'] =generate_action_button("siteadmin/portfolio",$cdata->portfolio_id,false);	
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
	* This Function is for Add portfolio page 
	*
	* @param
	* @return 
	* @author juman
	* @version 2018-1-17
	*/
	public function add_portfolio(){
		check_login();
		$data['page_name']="Add portfolio";
		$data['root_folder']=$this->root_folder;
		$data['dir']="portfolio";
		$data['page']="add_portfolio";	
		$this->load->view($this->root_folder."/main",$data);
		$this->load->view($this->root_folder."/portfolio/portfolio_js");
	}

	/**
	* This Function is for inserting portfolio Data  For creative x 
	*
	* @param Post Table Param 
	* @return Success Result Table Json
	* @author juman
	* @version 2018-1-17
	*/

	public function upload_portfolio(){
		$postedData =$this->input->post(NULL);
		$res_data['portfolio_title']=isset($postedData['portfolio_title']) ? $postedData['portfolio_title'] : "";
		$res_data['portfolio_desc']=isset($postedData['portfolio_desc']) ? $postedData['portfolio_desc'] : "";
		$res_data['portfolio_link']=isset($postedData['portfolio_link']) ? $postedData['portfolio_link'] : "";
		$res_data['inserted'] = date('Y-m-d h:i:s');
		$res_data['updated'] = date('Y-m-d h:i:s');
		$this->db->trans_begin(); 
 		try{
 			if($res_data['portfolio_title']==""){
 				throw new Exception(lang("portfolio_title"));
 			}
 			if($res_data['portfolio_desc']==""){
 				throw new Exception(lang("portfolio_desc_null"));
 			}
 			if($res_data['portfolio_link']==""){
 				throw new Exception(lang("portfolio_link_null"));
 			}
 			$res_data['portfolio_img']=""; 
 			if($_FILES['portfolio_img']['name']!==""){
 				$upload_image=$this->_upload_thumb($_FILES);
 				if (array_key_exists('error', $upload_image)) {
 					throw new Exception($upload_image['error']);
 				}else{
 					$res_data['portfolio_img']=$upload_image['upload_data']['file_name'];
 				}
 			}
 			$this->mod_portfolio->save_portfolio_info($res_data);
 			
 			if ($this->db->trans_status() === FALSE){
				throw new Exception("transaction error");
			}
			$this->db->trans_commit();
			$this->session->set_flashdata('notification_msg', lang('success').' '.lang('inserted'));
			 $this->session->set_flashdata('notification_type', 'success');
			redirect(site_url('siteadmin/portfolio'));
		}catch(Exception $E){
		     $this->db->trans_rollback();
		     $this->session->set_flashdata('notification_type', 'error');
		     $this->session->set_flashdata('notification_msg', $E->getMessage());
			 
			 redirect(site_url('siteadmin/portfolio/add_portfolio'));
		}
				
	}

	/**
	* This Function is for upload portfolios image
	*
	* @param portfolio Table Param 
	* @return Success Result Table Json
	* @author juman
	* @version 2017-11-26
	*/
	private  function _upload_thumb($image)
	{	
	    $config['upload_path']          = './uploads/portfolios/';
	    $config['allowed_types']        = 'gif|jpg|png';
	    $config['max_size']             = 3000;
	    $config['max_width']            = 1440;
	    $config['max_height']           = 768;

	    $this->load->library('upload', $config);

	    if ( ! $this->upload->do_upload('portfolio_img'))
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

	/**
	* This Function is for editing Class 
	*
	* @param int portfolio id
	* @return view edit page
	* @author juman
	* @version 2018-1-18
	*/
	function edit(){
		$data['id']=$id=$this->uri->segment(4);
		$data['page_name']="Edit portfolio";
		$data['root_folder']=$this->root_folder;
		$data['dir']="portfolio";
		$data['page']="add_portfolio";
		$data['datas'] = $this->mod_portfolio->portfolio_get_by_id($id);
		$this->load->view($this->root_folder."/main",$data);
		$this->load->view($this->root_folder."/portfolio/portfolio_js");
	}

	/**
	* This Function is for updating portfolio 
	*
	* @param Post update id
	* @return Add page view
	* @author juman
	* @version 2018-1-17
	*/
	public function update_portfolio(){
		$postedData =$this->input->post(NULL);
		$res_data['portfolio_title']=isset($postedData['portfolio_title']) ? $postedData['portfolio_title'] : "";
		$res_data['portfolio_desc']=isset($postedData['portfolio_desc']) ? $postedData['portfolio_desc'] : "";
		$res_data['portfolio_link']=isset($postedData['portfolio_link']) ? $postedData['portfolio_link'] : "";
		$res_data['updated'] = date('Y-m-d h:i:s');
		$primary_key=$this->uri->segment(4);
		// Db Query Start
		$this->db->trans_begin(); 
 		try{
 			if($res_data['portfolio_title']==""){
 				throw new Exception(lang("portfolio_title"));
 			}
 			if($res_data['portfolio_desc']==""){
 				throw new Exception(lang("portfolio_desc_null"));
 			}
 			if($res_data['portfolio_link']==""){
 				throw new Exception(lang("portfolio_link_null"));
 			}
 			$res_data['portfolio_img']=""; 
 			if($_FILES['portfolio_img']['name']!==""){
 				$upload_image=$this->_upload_thumb($_FILES);
 				if (array_key_exists('error', $upload_image)) {
 					throw new Exception($upload_image['error']);
 				}else{
 					$res_data['portfolio_img']=$upload_image['upload_data']['file_name'];
 				}
 			}

 			$this->mod_portfolio->update_portfolio_info($res_data,$primary_key);
 			if ($this->db->trans_status() === FALSE){
				throw new Exception("transaction error");
			}
			$this->db->trans_commit();
			$this->session->set_flashdata('notification_type', 'success');
			$this->session->set_flashdata('notification_msg', lang('success').' '.lang('updated'));
			
			redirect(site_url('siteadmin/portfolio'));
		}catch(Exception $E){
		     $this->db->trans_rollback();
		     $this->session->set_flashdata('notification_type', 'error');
		     $this->session->set_flashdata('notification_msg', $E->getMessage());
			 
			 redirect(site_url('siteadmin/portfolio/edit/'.$primary_key));
		}
		exit;

	}




	/**
	* This Function is for deleting portfolios 
	*
	* @param Post delete id
	* @return Add page view
	* @author juman
	* @version 2017-12-17
	*/
	function delete(){
		$delete_id=$this->uri->segment(4);

		// Db Query Start
		$this->db->trans_begin();	
		
		try{
			$result=$this->mod_portfolio->delete_data($delete_id);
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

