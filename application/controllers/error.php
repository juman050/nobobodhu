<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Error2 extends CI_Controller {

	/**
	*
	*Description : This is Admin Tags Controller
	*
	*@param 
	*@return 
	*@author Tj Thouhid
	*@version 1.0 (15-01-2017)
	*/
	private $root_folder="front";

	public function __construct()
	   {
	    parent::__construct();
	    //$this->load->model('mod_blog');
	    $this->load->model('mod_common');

	   
	   }

	public function index(){
		echo "This Page is Not For Access";
		exit;

		$data['page_name']="Blog";

		$data['root_folder']=$this->root_folder;
		$data['dir']="blog";
		$data['page']="post";
		$data['settings']=$this->mod_common->get_all_settings();

		$this->load->view($this->root_folder."/main",$data);
	}








}
