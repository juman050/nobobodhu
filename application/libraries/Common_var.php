<?php
    defined('BASEPATH') OR exit('No direct script access allowed.');

    class Common_var
    {
        protected $CI;

        public function __construct()
        {
            $this->CI =& get_instance(); //read manual: create libraries

            $dataX = array(); // set here all your vars to views

            
          
            //$query=$this->CI->db->get('options');
            //$results=$query->result_array();
            $options= array();
            // foreach ($results as $result) {
            //    $options[$result['title']]=$result['value'];
            // }
            $this->CI->config->set_item('base_url', "http://localhost/nobobodhu/");
            $options['title']="Nobo-bodhu Application";
            $options['admin_resource']=site_url().'resource/admin/';
            $options['public_resource']=site_url().'resource/front/';
            $dataX['options'] =$options;
            
            $this->CI->load->vars($dataX);
            $this->CI->lang->load('default', 'english');
            $this->CI->lang->load('custom', 'english');
        }
    }
?>