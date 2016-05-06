<?php

class Requisition_model extends CI_Model{
    public function __construct() {
        parent::__construct();
    }
    public function get_color(){
        $qurey = $this->db->get('cc_color');
        if($qurey->num_rows()>0){
            return $qurey->result_array();
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
    public function get_product(){
        $qurey = $this->db->get('cc_product');
        if($qurey->num_rows()>0){
            return $qurey->result_array();
        }else{
            return FALSE;
        }
    }
    public function get_color_name($color){
        $this->db->select('name');
        $this->db->from('cc_color');
        $this->db->where('id', $color);
        $qurey = $this->db->get();
        if($qurey->num_rows() == 1){
            return $qurey->row_array();
        }else{
            return FALSE;
        }
        
    }

    public function insert_requisition($data_array){
        if($this->db->insert('cc_requisition', $data_array)){
            return $this->db->insert_id();
        }else{
            return FALSE;
        }
    }
    public function insert_requisition_data($requisition_data){
        if($this->db->insert_batch('cc_requisition_data', $requisition_data)){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    public function update_requisition_data($rstn_data_id, $requisition_data){
        $this->db->where('id', $rstn_data_id);
        if($this->db->update('cc_requisition_data', $requisition_data)){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    public function insert_product_in_out($inOut){
        if($this->db->insert('cc_product_in_out', $inOut)){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    public function is_repaired($rstn_data_id){
        $qurey = $this->db->query("SELECT (SUM(`is_repaired`)/COUNT(`is_repaired`)) as d FROM `cc_allocate_expense` WHERE `rqtn_data_id` = $rstn_data_id");
        if($qurey->num_rows()>0){
            return $qurey->row_array();
        }else{
            return FALSE;
        }
            
    }
    public function is_shipped($rstn_data_id){
        $this->db->select('status');
        $this->db->from('cc_requisition_data');
        $this->db->where('id', $rstn_data_id);
        $this->db->where('status', 2);
        $qurey = $this->db->get();
        if($qurey->num_rows()>0){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    public function is_processing($rstn_data_id){
        $this->db->select('status');
        $this->db->from('cc_requisition_data');
        $this->db->where('id', $rstn_data_id);
        $this->db->where('status', 1);
        $qurey = $this->db->get();
        if($qurey->num_rows()>0){
            return TRUE;
        }else{
            return FALSE;
        }
        
    }

    public function get_product_of_name($product_of){
        $this->db->select('name');
        $this->db->from('cc_showroom');
        $this->db->where('id', $product_of);
        $qurey = $this->db->get();
        if($qurey->num_rows() == 1){
            return $qurey->row_array();
        }else{
            return FALSE;
        }
    }
    public function get_problem_name($problem){
        $this->db->select('name');
        $this->db->from('cc_problem');
        $this->db->where('id', $problem);
        $qurey = $this->db->get();
        if($qurey->num_rows() == 1){
            return $qurey->row_array();
        }else{
            return FALSE;
        }
    }

    public function get_requisition_list(){
        $this->db->select('cc_requisition.*, cc_showroom.id, cc_showroom.name, cc_requisition.id as rqtn_id');
        $this->db->from('cc_requisition');
        $this->db->join('cc_showroom', 'cc_showroom.id = cc_requisition.showroom_id', 'left');
        //$this->db->order_by('cc_requisition_data.complain_date','DESC');
        $qurey = $this->db->get();
        if($qurey->num_rows() > 0){
            return $qurey->result_array();
        }else{
            return FALSE;
        }
    }
    public function get_requisition_info($rqtn_id){
        $this->db->select('*,cc_product.name as product_name, cc_color.name as color_name, cc_showroom.name as showroom_name, cc_requisition_data.id as data_id, cc_problem.name as problem_name');
        $this->db->from('cc_requisition_data');
        $this->db->join('cc_showroom', 'cc_showroom.id = cc_requisition_data.product_of', 'left');
        $this->db->join('cc_product', 'cc_product.id = cc_requisition_data.product_id', 'left');
        $this->db->join('cc_color', 'cc_color.id = cc_requisition_data.color_id', 'left');
        $this->db->join('cc_problem', 'cc_problem.id = cc_requisition_data.problem_id', 'left');
        $this->db->where('cc_requisition_data.rqtn_id', $rqtn_id);
        $qurey = $this->db->get();
        if($qurey->num_rows() > 0){
            return $qurey->result_array();
        }else{
            return FALSE;
        }
    }
    public function get_product_edit_info($id){
        $this->db->select('*, cc_product.id as prod_id, cc_requisition_data.id as rstn_data_id');
        $this->db->from('cc_requisition_data');
        $this->db->join('cc_product', 'cc_product.id = cc_requisition_data.product_id', 'left');
        $this->db->where('cc_requisition_data.id', $id);
        $this->db->group_by('cc_product.id');
        $qurey = $this->db->get();
        if($qurey->num_rows() == 1){
            return $qurey->result_array();
        }else{
            return FALSE;
        }
    }

    public function delete_requisition_data($rqtn_id){
        $this->db->where('rqtn_id', $rqtn_id);
        if($this->db->delete('cc_requisition_data')){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    public function delete_requisition($rqtn_id){
        $this->db->where('id', $rqtn_id);
        if($this->db->delete('cc_requisition')){
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function get_product_details($product_id = ''){
        $this->db->where('id', $product_id);
        $get_data = $this->db->get('cc_product');
        if($get_data->num_rows() > 0){
            return $get_data->row_array();
        }else{
            return FALSE;
        }
    }
    public function insert_allocate_expanse($data){
        if($this->db->insert('cc_allocate_expense', $data)){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    public function get_info($id){
        $qurey = $this->db->query("SELECT cc_allocate_expense.*, cc_section.*, DATEDIFF(cc_allocate_expense.service_date, cc_allocate_expense.committed_date) as difference, cc_section.id as sec_id, cc_allocate_expense.id as allocate_id FROM cc_allocate_expense JOIN cc_section ON cc_section.id = cc_allocate_expense.section_id WHERE cc_allocate_expense.rqtn_data_id = $id");
        //$this->db->from('cc_allocate_expense');
        //$this->db->join('cc_section', 'cc_section.id = cc_allocate_expense.section_id');
        //$this->db->where('cc_allocate_expense.rqtn_data_id', $id);
        //$qurey = $this->db->get();
        if($qurey->num_rows() > 0){
            return $qurey->result_array();
        }else{
            return FALSE;
        }
    }
    public function repaired($allocate_id, $data){
        $this->db->where('id', $allocate_id);
        if($this->db->update('cc_allocate_expense', $data)){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    public function get_delivery_info($id){
        $qurey = $this->db->query("SELECT MAX(cc_allocate_expense.service_date) as max_service, cc_requisition_data.action_date, DATEDIFF(cc_requisition_data.action_date,MAX(cc_allocate_expense.service_date)) as difference FROM (cc_allocate_expense) JOIN cc_requisition_data ON cc_requisition_data.id = cc_allocate_expense.rqtn_data_id WHERE cc_allocate_expense.rqtn_data_id = $id AND cc_allocate_expense.is_repaired = 2 AND cc_requisition_data.status = 2");
        if($qurey){
            return $qurey->result_array();
        }else{
            return FALSE;
        }
    }
    public function repaired_check($rstn_data_id){
        $this->db->select('id');
        $this->db->from('cc_requisition_data');
        $this->db->where('repair_or_replace', 1);
        $this->db->where('id', $rstn_data_id);
        $qurey = $this->db->get();
        if($qurey->num_rows()>0){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    public function get_requisition_data($rstn_data_id){
        $this->db->select('*');
        $this->db->from('cc_requisition_data');
        $this->db->where('id', $rstn_data_id);
        $qurey = $this->db->get();
        if($qurey->num_rows()>0){
            return $qurey->row_array();
        }else{
            return FALSE;
        }
    }
    
    public function getRequisitionList(){
        $qurey = $this->db->query("SELECT crd.*,cc_requisition.date as date,cc_requisition.id as rqtn_id,cc_showroom.name FROM cc_requisition_data crd
            INNER JOIN cc_showroom ON crd.product_of=cc_showroom.id
            RIGHT JOIN cc_requisition ON cc_requisition.id=crd.rqtn_id
            ORDER BY complain_date DESC");
        //$this->db->select('cc_requisition.*, cc_showroom.id, cc_showroom.name, cc_requisition.id as rqtn_id');
        //$this->db->from('cc_requisition');
        //$this->db->join('cc_showroom', 'cc_showroom.id = cc_requisition.showroom_id', 'left');
        //$this->db->order_by('cc_requisition_data.complain_date','DESC');
        //$qurey = $this->db->get();
        if($qurey->num_rows() > 0){
            return $qurey->result_array();
        }else{
            return FALSE;
        }
    }
    
    public function getRequisitionListShowroom($show_room){
        $qurey = $this->db->query("SELECT crd.*,cc_requisition.date as date,cc_requisition.id as rqtn_id,cc_showroom.name FROM cc_requisition_data crd
            INNER JOIN cc_showroom ON crd.product_of=cc_showroom.id
            RIGHT JOIN cc_requisition ON cc_requisition.id=crd.rqtn_id
            WHERE crd.product_of=$show_room
            ORDER BY complain_date DESC");
        if($qurey->num_rows() > 0){
            return $qurey->result_array();
        }else{
            return FALSE;
        }
    }
    
}

?>
