<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
*
*Description : This is user Model
*@param 
*@return 
*@author juman
*@version 1.0 (03-05-2018)
*/
class Mod_user extends CI_Model {
 

 
    public function __construct()
    {
        parent::__construct();      
    }
    // get user data
  	public function get_user($id)
  	{
  	  $query = $this->db->get_where('users',array('user_id' => $id));
        if($query->num_rows()>0) {
          return $query->row();
        }else{
          return false;
        }
  	}
    public function get_interest_list($id)
    {
      $this->db->where('interest_id', $id);
      $this->db->update('interests',array('status'=>'1'));
      $query  = "select users.user_id,users.user_photo,users.photo_access,users.firstname,interests.* from interests INNER JOIN users ON users.user_id = interests.user_id WHERE interests.interest_id = ".$id." ";
      $result = $this->db->query($query); 
      if($result->num_rows()>0) {
        return $result->result();
      }else{
        return false;
      }
    }
    public function get_recieve_conversation($id)
    {
      $this->db->where('recipient_id', $id);
      $this->db->update('messages',array('seen'=>'1'));

      $sql = "SELECT users.user_id,users.firstname,users.user_photo,users.photo_access,conversations.* FROM conversations 
      INNER JOIN users ON users.user_id = conversations.user_from OR users.user_id = conversations.user_to
      WHERE 
      user_from='$id' OR user_to='$id' ";

      // $query  = "select users.user_id,users.firstname,users.user_photo,users.photo_access,messages.* from messages INNER JOIN users ON users.user_id = messages.sender_id WHERE messages.recipient_id= ".$id." order by messages.msg_id desc ";
      $result = $this->db->query($sql); 
      if($result->num_rows()>0) {
        return $result->result();
      }else{
        return false;
      }
    }
    public function get_conversation_byId($id,$conversation_id)
    {
      $query  = "select users.user_id,users.firstname,messages.* from messages INNER JOIN users ON users.user_id = messages.sender_id WHERE messages.conversation_id= ".$conversation_id." and (messages.sender_id = '$id' or messages.recipient_id='$id') order by msg_id desc ";
      $result = $this->db->query($query); 
      if($result->num_rows()>0) {
        return $result->result();
      }else{
        return false;
      }
    }
    public function get_user_to($conversation_id)
    {
      $query = $this->db->get_where('conversations',array('conversation_id' => $conversation_id));
      if($query->num_rows()>0) {
        return $query->row();
      }else{
        return false;
      }
    }
    public function get_send_conversation($id)
    {
      $query  = "select users.user_id,users.firstname,messages.* from messages INNER JOIN users ON users.user_id = messages.recipient_id WHERE messages.sender_id= ".$id." ";
      $result = $this->db->query($query); 
      if($result->num_rows()>0) {
        return $result->result();
      }else{
        return false;
      }
    }
    public function check_interest($interest_id)
    {
      $id = $this->session->userdata('user_id');
      $query = $this->db->get_where('interests',array('user_id' => $id,'interest_id'=>$interest_id));
      if($query->num_rows()>0) {
        return true;
      }else{
        return false;
      }
    }
    public function insert_interest($interest_id)
    {
      $id = $this->session->userdata('user_id');
      $data = array(
        'user_id' => $id,
        'interest_id' => $interest_id
      );
      $res = $this->db->insert('interests',$data);
      if($res){
          return true;
       }else{
        return false;
      }
    }
    // get common user data
    public function get_data()
    {
      $id = $this->session->userdata('user_id');
      $query = $this->db->get_where('users',array('user_id' => $id));
        if($query->num_rows()>0) {
          $result = $query->row();
          $preferance_gender=$result->preferance_gender;
          //echo $preferance_gender;
          $preferance_religion=$result->preferance_religion;
          $preferance_country=$result->preferance_country;
           //echo $preferance_religion;
          $preferance_marital_status=$result->preferance_marital_status;
          // echo $preferance_marital_status;
          $current = date('Y');
          $preferance_age_from = $current - $result->preferance_age_from;
          // echo $preferance_age_from;
          $preferance_age_to = $current - $result->preferance_age_to;
          // echo $preferance_age_to;
           //exit;
            $sql = "select 
                    user_id,firstname,birthday,country,religion,marital_status,gender,user_photo,
                    photo_access,is_login
                    from users 
                    where 
                    (year(birthday) >= '$preferance_age_to' and year(birthday) <= '$preferance_age_from')
                    and 
                    gender='$preferance_gender'
                    and
                    country='$preferance_country'
                    and 
                    religion='$preferance_religion' 
                    and 
                    marital_status='$preferance_marital_status' ";
            $query = $this->db->query($sql);
            // echo "<pre>";
            // print_r($query);
            //     exit;
            if($query->num_rows()>0) {
                return $query->result_array();
            }else{
                return false;
            }
        }else{
          return false;
        }

    }
    public function update_personal_info($data,$id)
    {
        $this->db->where('user_id', $id);
        $this->db->update('users',$data);
        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }

    public function update_photo($postedData,$id)
    {
        $this->db->where('user_id', $id);
        $this->db->update('users',$postedData);
        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }

    public function update_preferance_info($data,$id)
    {
        $this->db->where('user_id', $id);
        $this->db->update('users',$data);
        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }
    public function send_msg($data)
    {
      $data['sent_at'] = date('Y-m-d h:i:s');
      $res = $this->db->insert('messages',$data);
      if($res){
          return true;
       }else{
        return false;
      }
    }
    public function check_conversation($id,$interest_id)
    {
      $sql = "select * from conversations 
                where 
                (user_from = $id and user_to = $interest_id)
                or 
                (user_to = $id and user_from = $interest_id)
              ";
      $query = $this->db->query($sql);
      if($query->num_rows()>0) {
        return $query->row();
      }else{       
          return false;
      }
    }
    public function insert_conversation($id,$interest_id)
    {
      $res = $this->db->insert('conversations',array('user_from'=>$id,'user_to'=>$interest_id));
      if ($res) {
        return $this->db->insert_id();
      }else{
        return false;
      }
    }
    public function add_message($postedData)
    {



      $res = $this->db->insert('messages',$postedData);
      if($res){
          return true;
       }else{
        return false;
      }
    }

    public function update_password($data,$id)
    {
        $data['password'] = md5($data['password']);
        $this->db->where('user_id', $id);
        $this->db->update('users',$data);
        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }


 
}