<?php

class Creation_model extends CI_Model{
    public function __construct() {
        parent::__construct();
    }
    public function insert_color($data_array){
        if($this->db->insert('cc_color', $data_array)){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    public function get_color(){
        $qurey = $this->db->get('cc_color');
        if($qurey->num_rows()>0){
            return $qurey->result_array();
        }else{
            return FALSE;
        }
    }
    public function update_color($data_array, $id){
        $this->db->where('id', $id);
        if($this->db->update('cc_color', $data_array)){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    public function delete_color($id){
        $this->db->where('id', $id);
        if($this->db->delete('cc_color')){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    public function insert_supplier($data_array){
        if($this->db->insert('cc_supplier', $data_array)){
            return TRUE;
        }else{
            return TRUE;
        }
    }
    public function get_supplier(){
        $qurey = $this->db->get('cc_supplier');
        if($qurey->num_rows()>0){
            return $qurey->result_array();
        }else{
            return FALSE;
        }
    }
    public function delete_supplier($id){
        $this->db->where('id', $id);
        if($this->db->delete('cc_supplier')){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    public function get_supplier_info($id){
        $this->db->select('*');
        $this->db->from('cc_supplier');
        $this->db->where('id', $id);
        $qurey = $this->db->get();
        if($qurey->num_rows() == 1){
            return $qurey->result_array();
        }else{
            return FALSE;
        }
    }
    public function update_supplier($data_array, $id){
        $this->db->where('id', $id);
        if($this->db->update('cc_supplier', $data_array)){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    public function insert_problem($data_array){
        if($this->db->insert('cc_problem', $data_array)){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    public function get_problem(){
        $qurey = $this->db->get('cc_problem');
        if($qurey->num_rows()>0){
            return $qurey->result_array();
        }else{
            return FALSE;
        }
    }
    public function delete_problem($id){
        $this->db->where('id', $id);
        if($this->db->delete('cc_problem')){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    public function update_problem($data_array, $id){
        $this->db->where('id', $id);
        if($this->db->update('cc_problem', $data_array)){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    public function get_section(){
        $qurey = $this->db->get('cc_section');
        if($qurey->num_rows()>0){
            return $qurey->result_array();
        }else{
            return FALSE;
        }
    }
    public function insert_section($data_array){
        if($this->db->insert('cc_section', $data_array)){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    public function update_section($data_array, $id){
        $this->db->where('id', $id);
        if($this->db->update('cc_section', $data_array)){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    public function delete_section($id){
        $this->db->where('id', $id);
        if($this->db->delete('cc_section')){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    public function insert_store($data_array){
        if($this->db->insert('cc_store', $data_array)){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    public function get_store(){
        $qurey = $this->db->get('cc_store');
        if($qurey->num_rows()>0){
            return $qurey->result_array();
        }else{
            return FALSE;
        }
    }
    public function update_store($data_array, $id){
         $this->db->where('id', $id);
        if($this->db->update('cc_store', $data_array)){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    public function delete_store($id){
        $this->db->where('id', $id);
        if($this->db->delete('cc_store')){
            return TRUE;
        }else{
            return FALSE;
        }
    }
}

?>
