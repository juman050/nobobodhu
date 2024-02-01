<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	/**
	*
	*Description : This is Admin dashboard Controller
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

	public function index(){
		check_login();
		$data['page_name']="Dashboard";

		$data['root_folder']=$this->root_folder;
		$data['dir']="dashboard";
		$data['page']="index";

		$this->load->view($this->root_folder."/main",$data);
	}







}
