<?php
class User_model extends CI_Model{
    public function __construct() {
        parent::__construct();
    }
    
    public function check($username, $password){
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $this->db->select('*');
        $this->db->from('cc_user');
        $qurey = $this->db->get();
        if($qurey->num_rows() == 1){
            return $qurey;
        }
        else{
            return FALSE;
        }
    }
    public function insert_user($data_array){
        if($this->db->insert('cc_user', $data_array)){
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function get_user(){
        $qurey = $this->db->get('cc_user');
        if($qurey->num_rows()>0){
            return $qurey->result_array();
        }else{
            return FALSE;
        }
    }
    public function delete_user($id){
        $this->db->where('id', $id);
        if($this->db->delete('cc_user')){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    public function get_user_info($id){
        $this->db->where('id', $id);
        $this->db->select('*');
        $this->db->from('cc_user');
        $qurey = $this->db->get();
        if($qurey->num_rows() == 1){
            return $qurey->result_array();
        }else{
            return FALSE;
        }
    }
    public function update_user($data_array, $id){
        $this->db->where('id', $id);
        if($this->db->update('cc_user', $data_array)){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }
    public function check_username($username){
        $this->db->where('username', $username);
        $this->db->select('*');
        $this->db->from('cc_user');
        $qurey = $this->db->get();
        if($qurey->num_rows() > 0){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    public function check_username_exists($id, $username){
        $this->db->where('username', $username);
        $this->db->where('id', $id);
        $this->db->select('*');
        $this->db->from('cc_user');
        $qurey = $this->db->get();
        if($qurey->num_rows() > 0){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    public function getUser(){
        $qurey = $this->db->query('SELECT * FROM cc_user');// cu LEFT JOIN cc_showroom cs ON cu.show_room_id=cs.id
        if($qurey->num_rows()>0){
            return $qurey->result_array();
        }else{
            return FALSE;
        }
    }
    public function get_showroom_name($id){
        $this->db->where('id',$id);
        $name = $this->db->get('cc_showroom')->row()->name;
        return $name;
    }
}

?>
