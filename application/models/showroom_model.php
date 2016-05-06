<?php
 
class Showroom_model extends CI_Model
{
    public function __construct() {
        parent::__construct();
    }
    public function insert_showroom($data_array){
        if($this->db->insert('cc_showroom', $data_array)){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    public function get_showroom_list(){
        $qurey = $this->db->get('cc_showroom');
        if($qurey->num_rows()>0){
            return $qurey->result_array();
        }
        else{
            return FALSE;
        }
    }
    public function delete_showroom($id){
        $this->db->where('id', $id);
        if($this->db->delete('cc_showroom')){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    public function get_showroom_info($id){
        $this->db->where('id', $id);
        $this->db->select('*');
        $this->db->from('cc_showroom');
        $qurey = $this->db->get();
        if($qurey->num_rows() == 1){
            return $qurey->result_array();
        }else{
            return FALSE;
        }
    }
    public function update_showroom($data_array, $id){
        $this->db->where('id', $id);
        if($this->db->update('cc_showroom', $data_array)){
            return TRUE;
        }else{
            return FALSE;
        }
                
    }
    public function get_showroom(){
        $this->db->select('cc_showroom.id, cc_showroom.name');
        $qurey = $this->db->get('cc_showroom');
        if($qurey->num_rows()>0){
            return $qurey->result_array();
        }else{
            return FALSE;
        }
    }
}

?>
