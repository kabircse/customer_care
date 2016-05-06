<?php
class Product_model extends CI_Model{
    public function __construct() {
        parent::__construct();
    }
    public function insert_category($data_array){
        if($this->db->insert('cc_product_category', $data_array)){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    public function getCategories($parent_id = 0)
	 {
        $category_data = array();

        $this->db->where('parent', $parent_id);
        $query = $this->db->get('cc_product_category');

        $result_array = $query->result_array();

        foreach ($result_array as $result) {
            $category_data[] = array(
                'id' => $result['id'],
                'name' => $this->getPath($result['id'])
            );

            $category_data = array_merge($category_data, $this->getCategories($result['id']));
        }

        return $category_data;
    }

    public function getPath($category_id)
	{
        $this->db->where('id', $category_id);
        $query = $this->db->get('cc_product_category');
        $result = $query->row_array();

        if ($result['parent']) {
            return $this->getPath($result['parent']) . ' > ' . $result['name'];
        } else {
            return $result['name'];
        }
    }
    public function delete_category($id){
        $this->db->where('id', $id);
        if($this->db->delete('cc_product_category')){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    public function get_category($id){
        $this->db->select('*');
        $this->db->from('cc_product_category');
        $this->db->where('id', $id);
        $qurey = $this->db->get();
        if($qurey->num_rows() == 1){
            return $qurey->result_array();
        }else{
            return FALSE;
        }
    }
    public function update_category($data_array, $id){
        $this->db->where('id', $id);
        if($this->db->update('cc_product_category', $data_array)){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    public function check_coode($code){
        $this->db->select('*');
        $this->db->from('cc_product');
        $this->db->where('code', $code);
        $qurey = $this->db->get();
        if($qurey->num_rows()>0){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    public function insert_product($data_array){
        if($this->db->insert('cc_product', $data_array)){
            return $this->db->insert_id();
        }else{
            return FALSE;
        }
    }
    public function insert_product_color($color_data){
        if($this->db->insert_batch('cc_product_color', $color_data)){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    public function insert_product_supplier($supplier_data){
        if($this->db->insert_batch('cc_product_supplier', $supplier_data)){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    public function get_product(){
        $this->db->select('*, cc_product.id as product_id, cc_product.name as product_name, cc_product_category.name as category_name');
        $this->db->from('cc_product');
        $this->db->join('cc_product_category', 'cc_product_category.id = cc_product.category');
//        $this->db->join('cc_product_supplier', 'cc_product_supplier.product_id = cc_product.id');
//        $this->db->join('cc_supplier', 'cc_supplier.id = cc_product_supplier.supplier_id');
        $qurey = $this->db->get();
        if($qurey->num_rows()>0){
            return $qurey->result_array();
        }else{
            return FALSE;
        }
    }
    public function get_product_info($id){
        
        $this->db->select('*');
        $this->db->from('cc_product');
        //$this->db->join('cc_product_category', 'cc_product_category.id = cc_product.category');
        //$this->db->join('cc_product_supplier', 'cc_product_supplier.product_id = cc_product.id');
        //$this->db->join('cc_product_color', 'cc_product_color.product_id = cc_product.id');
        $this->db->where('cc_product.id', $id);
        $qurey = $this->db->get();
        if($qurey->num_rows() == 1){
            return $qurey->result_array();
        }else{
            return FALSE;
        }
    }
    public function get_product_color($id){
        $this->db->where('product_id', $id);
        $this->db->select('*');
        $this->db->from('cc_product_color');
        $qurey = $this->db->get();
        if($qurey->num_rows()>0){
            return $qurey->result_array();
        }else{
            return FALSE;
        }
    }
    public function get_product_supplier($id){
        $this->db->where('product_id', $id);
        $this->db->select('*');
        $this->db->from('cc_product_supplier');
        $qurey = $this->db->get();
        if($qurey->num_rows()>0){
            return $qurey->result_array();
        }else{
            return FALSE;
        }
    }
    public function update_product($data_array, $id){
        $this->db->where('id', $id);
        if($this->db->update('cc_product', $data_array)){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    public function update_product_color($color_data, $id){
        $this->db->where('product_id', $id);
        if($this->db->update('cc_product_color', $color_data)){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    public function update_product_supplier($supplier_data, $id){
        $this->db->where('product_id', $id);
        if($this->db->update('cc_product_supplier', $supplier_data)){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    public function delete_product_color($id){
        $this->db->where('product_id', $id);
        if($this->db->delete('cc_product_color')){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    public function delete_product_supplier($id){
       $this->db->where('product_id', $id);
        if($this->db->delete('cc_product_supplier')){
            return TRUE;
        }else{
            return FALSE;
        } 
    }
    public function check_code_exits($code, $id){
        $this->db->where('id', $id);
        $this->db->where('code', $code);
        $this->db->select('*');
        $this->db->from('cc_product');
        $qurey = $this->db->get();
        if($qurey->num_rows()>0){
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function get_product_color_data($id = ''){
        $this->db->where('product_id', $id);
        $this->db->select('*');
        $this->db->from('cc_product_color');
        $this->db->join('cc_color', 'cc_color.id = cc_product_color.color_id');
        $query = $this->db->get();
        if($query->num_rows()>0){
            $get_data = $query->result_array();
            return json_encode($get_data);
        }else{
            return FALSE;
        }
    }
    
    public function get_product_repaired($start='',$end=''){
	if(!empty($start) && !empty($end))
	    $query = $this->db->query("SELECT PRODUCT.*,SUM(REQ.aquantity) as quantity FROM cc_product PRODUCT
		INNER JOIN cc_requisition_data REQ ON PRODUCT.id=REQ.product_id WHERE REQ.status=2 AND repair_or_replace=1 AND (complain_date BETWEEN '$start' AND '$end') GROUP BY product_id");
        else
	    $query = $this->db->query("SELECT PRODUCT.*,SUM(REQ.aquantity) as quantity FROM cc_product PRODUCT
		INNER JOIN cc_requisition_data REQ ON PRODUCT.id=REQ.product_id WHERE REQ.status=2 AND repair_or_replace=1 GROUP BY product_id");// WHERE REQ.status=2 AND repair_or_replace=1
	if($query->num_rows()>0){
            return $query->result_array();
        }else{
            return FALSE;
        }
    }
    
    public function get_product_replaced($start='',$end=''){
	if(!empty($start) && !empty($end))
	    $query = $this->db->query("SELECT PRODUCT.*,SUM(REQ.aquantity) as quantity FROM cc_product PRODUCT
		INNER JOIN cc_requisition_data REQ ON PRODUCT.id=REQ.product_id WHERE REQ.status=2 AND repair_or_replace=2 AND (complain_date BETWEEN '$start' AND '$end') GROUP BY product_id");// WHERE REQ.status=2
	else
	    $query = $this->db->query("SELECT PRODUCT.*,SUM(REQ.aquantity) as quantity FROM cc_product PRODUCT
		INNER JOIN cc_requisition_data REQ ON PRODUCT.id=REQ.product_id WHERE REQ.status=2 AND repair_or_replace=2 GROUP BY product_id");// WHERE REQ.status=2 AND repair_or_replace=1
	if($query->num_rows()>0){
            return $query->result_array();
        }else{
            return FALSE;
        }
    }
}


?>
