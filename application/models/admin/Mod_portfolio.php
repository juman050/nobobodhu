<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 //require APPPATH.'/models/admin/Mod_common.php';
/**
*
*Description : This is Admin portfolio Model
*@param 
*@return 
*@author juman
*@version 1.0 (23-01-2018)
*/
class Mod_portfolio extends CI_Model {
 
    var $table = 'portfolios';

 
    public function __construct()
    {
        parent::__construct();
        parent::__construct($this->table);
    }

    /**
       * Get number total filtered row
       *  
       * @return int Number total filtered row
       * @author juman
       * @version 23-01-2018
    **/
       private function _get_number_of_filtered_result(){

           $query =$this->db->query("SELECT FOUND_ROWS() as totalRows");
           $row = $query->row();
           
           $result =(int) (isset($row)? $row->totalRows : 0); 
           return $result;
       }

          /**
           * Get Number total row 
           * 
           * @return int Number total row
           * @author juman
           * @version 23-01-2018
           **/
           public function get_total_records($table_name,$pm_col) {
        
             $this->db->select($pm_col);
             $this->db->from($table_name);
             $this->db->where("deleted", 0);

             return (int) ($this->db->count_all_results());
           }



       
       /**
       * ---This Function is for Getting Data For Exams table
       *  
       * @return int Number total filtered row
       * @author juman
       * @version 23-01-2018
       */
       function get_portfolio_list_datatable(array $params)
       {
           $offset =$params['offset'];
           $length =$params['length'];
           $search =$params['search'];
           $sortings =$params['sortings'];
           $sortings_columns =$params['sortings_columns'];
           $advance_searches =$params['advance_searches'];


           $this->db->select('SQL_CALC_FOUND_ROWS sb.portfolio_id, sb.portfolio_id, sb.portfolio_title,portfolio_img,sb.updated', false);
           $this->db->from($this->table.' sb');  
           if($advance_searches['portfolio_title']!=""){
             $this->db->like("sb.portfolio_title", $advance_searches['portfolio_title']);
           }

           // Conditions 
           $this->db->where('sb.deleted', 0);  

           
           // Sortings
           foreach($sortings as $sorting){ 
               $this->db->order_by($sortings_columns[$sorting['column']], $sorting['dir']);
           }

           // Limit
           if($length != "-1"){
               $this->db->limit($length, $offset);
           }

           $query = $this->db->get();
           // echo $this->db->last_query(); exit;
           $data =$query->result();


           return array(
               'data' =>$data,
               'recordsFiltered' =>$this->_get_number_of_filtered_result(),
               'recordsTotal' =>$this->get_total_records($this->table,"portfolio_id"),
           );
    }
    /**
      * ---This Function is for saving Data into portfolios table
      *  
      * @return int Number total filtered row
      * @author juman
      * @version 23-01-2018
    */
    public function save_portfolio_info($data)
    {
      $query= $this->db->insert($this->table,$data);
      if($query){
          return true;
       }else{
        return false;
      }
    }

    /**
      * ---This Function is for deleting Data from portfolios table
      *  
      * @return int Number total filtered row
      * @author juman
      * @version 23-01-2018
    */

    public function delete_data($id)
    {
      $this->db->where('portfolio_id', $id);
      $query = $this->db->update($this->table, array('deleted' => 1)); 
      if($query){
          return true;
       }else{
        return false;
      }

    }
    /**
      * ---This Function is for getting Data from portfolios table
      *  
      * @return int Number total filtered row
      * @author juman
      * @version 23-01-2018
    */
    public function portfolio_get_by_id($id)
    {
      $query = $this->db->get_where($this->table,array('portfolio_id' => $id));
      if($query->num_rows()>0) {
        return $query->result();
      }else{
        return false;
      }
    }
    /**
      * ---This Function is for updating Data from portfolios table
      *  
      * @return int Number total filtered row
      * @author juman
      * @version 23-01-2018
    */
    public function update_portfolio_info($data,$pk)
      {
        $this->db->where('portfolio_id',$pk);
        $this->db->update('portfolios',$data);

        if( $this->db->affected_rows() )
        {
          return TRUE;
        }
        else
        {
           return FALSE;
        }
      }




 
}