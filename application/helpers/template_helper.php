<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if ( ! function_exists('template'))
{
	function template($tem_array=array()){
		$CI =& get_instance();
		extract($tem_array);
		$CI->load->view($root_folder.'/includes/header',$additional);
		$CI->load->view($root_folder.'/'.$dir.'/'.$page,$additional);
		$CI->load->view($root_folder.'/includes/footer',$additional);
		//$this->load->view();
	}
}