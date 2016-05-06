<?php

class dashboard_model_showroom extends CI_Model{
    public function __construct() {
        parent::__construct();
    }
    
    public function complain_data($fdate, $ldate,$showroom_id){
        $false_val = 0;
        $this->db->select('COUNT(id) as id');
        $this->db->from('cc_requisition_data');
        $this->db->where('complain_date >=', $fdate);
        $this->db->where('complain_date <=', $ldate);
        $this->db->where('product_of',$showroom_id);
        $qurey = $this->db->get();
        if($qurey->num_rows() == 1){
            $qurey = $qurey->row_array();
            return $qurey['id'];
        }else{
            return $false_val;
        }
    }
    
    public function solved_data($fdate, $ldate,$showroom_id){
        $false_val = 0;
       $this->db->select('COUNT(id) as id');
        $this->db->from('cc_requisition_data');
        $this->db->where('status', 2);
        $this->db->where('action_date >=', $fdate);
        $this->db->where('action_date <=', $ldate);
         $this->db->where('product_of',$showroom_id);
        $qurey = $this->db->get();
        if($qurey->num_rows()==1){
            $qurey = $qurey->row_array();
            return $qurey['id'];
        }else{
            return $false_val;
        } 
    }
   
    public function solved_date($fdate, $ldate,$showroom_id){
        $false_val = 0;
        //$this->db->select('SUM(DATEDIFF(action_date,complain_date)) as date_sum, COUNT(id) as id');
        $qurey = $this->db->query("SELECT SUM(DATEDIFF(action_date, complain_date)) as date_sum, COUNT(id) as id FROM (cc_requisition_data) WHERE status = 2 AND action_date >= '$fdate' AND action_date <= '$ldate'");
        //echo $this->db->last_query().'<br>'; 
        if($qurey->num_rows() == 1){
            $qurey = $qurey->row_array();
            if($qurey['id'] == 0){
                return 0;
            }else{
                
                $difference = $qurey['date_sum']/$qurey['id'];
                return $difference;
            }
            
        }else{
            return $false_val;
        } 
    }
    public function deviation_date($fdate, $ldate,$showroom_id){
        $false_val = 0;
        $qurey = $this->db->query("SELECT SUM(DATEDIFF(action_date, commited_date)) as date_sum, COUNT(id) as id FROM (cc_requisition_data) WHERE status = 2 AND action_date >= '$fdate' AND action_date <= '$ldate'");
        if($qurey->num_rows() == 1){
            $qurey = $qurey->row_array();
            if($qurey['date_sum'] <= 0){
                return 0;
            }else{
                $difference = $qurey['date_sum']/$qurey['id'];
                return $difference;
            }
            
        }else{
            return $false_val;
        } 
    }
    public function income_data($fdate, $ldate,$showroom_id){
        $this->db->select('SUM(cc_requisition_data.amount) as amount, SUM(cc_allocate_expense.repair_cost) as cost');
        $this->db->from('cc_requisition_data');
        $this->db->join('cc_allocate_expense', 'cc_allocate_expense.rqtn_data_id = cc_requisition_data.id');
        $this->db->where('complain_date >=', $fdate);
        $this->db->where('complain_date <=', $ldate);
         $this->db->where('product_of',$showroom_id);
        $qurey = $this->db->get();
        if($qurey->num_rows()>0){
            $qurey = $qurey->row_array();
            $difference = $qurey['amount']-$qurey['cost'];
            if($difference <= 0){
                return 0;
            }
            else{
                return $difference;
            }
            
        }else{
            return 0;
        }
    }
    public function total_value($fdate, $ldate,$showroom_id){
        $false_val = 0;
        $this->db->select('SUM(cc_product.price) as price');
        $this->db->from('cc_requisition_data');
        $this->db->join('cc_product', 'cc_product.id = cc_requisition_data.product_id');
        $this->db->where('cc_requisition_data.status', 2);
        $this->db->where('cc_requisition_data.complain_date >=', $fdate);
        $this->db->where('cc_requisition_data.complain_date <=', $ldate);
         $this->db->where('product_of',$showroom_id);
        $qurey = $this->db->get();
        if($qurey->num_rows()>0){
            $qurey = $qurey->row_array();
            if($qurey['price']<=0){
                return 0;
            }else{
                return $qurey['price'];
            }
        }else{
            return $false_val;
        }
    }
    public function total_repari_value($fdate, $ldate,$showroom_id){
         $false_val = 0;
        $this->db->select('SUM(cc_product.price) as price');
        $this->db->from('cc_requisition_data');
        $this->db->join('cc_product', 'cc_product.id = cc_requisition_data.product_id');
        $this->db->join('cc_allocate_expense', 'cc_allocate_expense.rqtn_data_id = cc_requisition_data.id');
        $this->db->where('cc_allocate_expense.is_repaired', 1);
        $this->db->where('cc_requisition_data.complain_date >=', $fdate);
        $this->db->where('cc_requisition_data.complain_date <=', $ldate);
         $this->db->where('product_of',$showroom_id);
        $qurey = $this->db->get();
        if($qurey->num_rows()>0){
            $qurey = $qurey->row_array();
            if($qurey['price']<=0){
                return 0;
            }else{
                return $qurey['price'];
            }
        }else{
            return $false_val;
        }
    }
    public function total_repari_cost($fdate, $ldate,$showroom_id){
        $false_val = 0;
        $this->db->select('SUM(cc_allocate_expense.repair_cost) as cost');
        $this->db->from('cc_requisition_data');
        $this->db->join('cc_allocate_expense', 'cc_allocate_expense.rqtn_data_id = cc_requisition_data.id');
        $this->db->where('cc_requisition_data.complain_date >=', $fdate);
        $this->db->where('cc_requisition_data.complain_date <=', $ldate);
         $this->db->where('product_of',$showroom_id);
        $qurey = $this->db->get();
        if($qurey->num_rows()>0){
            $qurey = $qurey->row_array();
            if($qurey['cost']<=0){
                return 0;
            }else{
                return $qurey['cost'];
            }
        }else{
            return $false_val;
        }
    }
}

?>
