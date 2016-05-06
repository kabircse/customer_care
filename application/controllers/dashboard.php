<?php
class Dashboard extends CI_Controller{
    public function __construct() {
        parent::__construct();
        if(!$this->session->userdata('check')){
            redirect(base_url().'login');
        }
    }
    public function index(){
        $session = $this->session->userdata('check');
        $showroom_id = $session['showroom'];
        if($showroom_id ==0){
            $this->load->model('dashboard_model');
            $k = 0;
            $month = array('','Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec');
            for($i = 1; $i<=12; $i++){
                if($i<=9){
                    $j = '0'.$i;
                }else{
                    $j = $i;
                }
                $fdate = date('Y').'-'.$j.'-'.'01';
                $ldate = date('Y').'-'.$j.'-'.'31';
                $total_complain =  $this->dashboard_model->complain_data($fdate, $ldate);
                $total_solved = $this->dashboard_model->solved_data($fdate, $ldate);
                $total_pending = ($total_complain-$total_solved);
                
               $array[$k] = array(
                    'month' => $month[$i],
                     'complain' => $total_complain,
                     'solved' => $total_solved,
                     'pending' => $total_pending,
                );
               $date_differecne = $this->dashboard_model->solved_date($fdate, $ldate);
               $solved_data[$k] = array(
                   'month' => $month[$i],
                   'date' => $date_differecne
               );
               $deviation = $this->dashboard_model->deviation_date($fdate, $ldate);
               $deviation_data[$k] = array(
                   'month' => $month[$i],
                   'deviation' => $deviation
               );
               $income = $this->dashboard_model->income_data($fdate, $ldate);
               $income_data[$k] = array(
                   'month' => $month[$i],
                   'income' => $income
               );
               $price = $this->dashboard_model->total_value($fdate, $ldate);
               $complete_price_data[$k] = array(
                   'month' => $month[$i],
                   'price' => $price
               );
               $repair_price = $this->dashboard_model->total_repari_value($fdate, $ldate);
               $repair_price_data[$k] = array(
                   'month' => $month[$i],
                   'price' => $repair_price
               );
               $repair_cost = $this->dashboard_model->total_repari_cost($fdate, $ldate);
               $repair_cost_data[$k] = array(
                    'month' => $month[$i],
                   'cost' => $repair_cost
               );
                $k++;
            }
    //        echo '<pre>';
    //        print_r($repair_cost_data);
    //        echo '</pre>';
    //        exit;
            $data['title'] = 'Dashboard';
            $data['report_data'] = $array;
            $data['solved_date'] = $solved_data;
            $data['deviation_date'] = $deviation_data;
            $data['income'] = $income_data;
            $data['complete_price'] = $complete_price_data;
            $data['repair_price'] = $repair_price_data;
            $data['repair_cost'] = $repair_cost_data;
            $data['showroom_id'] = $showroom_id;
            $this->load->view('header', $data);
            $this->load->view('menu');
            $this->load->view('sidemenu');
            $this->load->view('dashboard', $data);
            $this->load->view('footer');
        }
        else if($showroom_id !=0){
             $this->load->model('dashboard_model_showroom');
            $k = 0;
            $month = array('','Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec');
            for($i = 1; $i<=12; $i++){
                if($i<=9){
                    $j = '0'.$i;
                }else{
                    $j = $i;
                }
                $fdate = date('Y').'-'.$j.'-'.'01';
                $ldate = date('Y').'-'.$j.'-'.'31';
                $total_complain =  $this->dashboard_model_showroom->complain_data($fdate, $ldate,$showroom_id);
                $total_solved = $this->dashboard_model_showroom->solved_data($fdate, $ldate,$showroom_id);
                $total_pending = ($total_complain-$total_solved);
                
               $array[$k] = array(
                    'month' => $month[$i],
                     'complain' => $total_complain,
                     'solved' => $total_solved,
                     'pending' => $total_pending,
                );
               $date_differecne = $this->dashboard_model_showroom->solved_date($fdate, $ldate,$showroom_id);
               $solved_data[$k] = array(
                   'month' => $month[$i],
                   'date' => $date_differecne
               );
               $deviation = $this->dashboard_model_showroom->deviation_date($fdate, $ldate,$showroom_id);
               $deviation_data[$k] = array(
                   'month' => $month[$i],
                   'deviation' => $deviation
               );
               $income = $this->dashboard_model_showroom->income_data($fdate, $ldate,$showroom_id);
               $income_data[$k] = array(
                   'month' => $month[$i],
                   'income' => $income
               );
               $price = $this->dashboard_model_showroom->total_value($fdate, $ldate,$showroom_id);
               $complete_price_data[$k] = array(
                   'month' => $month[$i],
                   'price' => $price
               );
               $repair_price = $this->dashboard_model_showroom->total_repari_value($fdate, $ldate,$showroom_id);
               $repair_price_data[$k] = array(
                   'month' => $month[$i],
                   'price' => $repair_price
               );
               $repair_cost = $this->dashboard_model_showroom->total_repari_cost($fdate, $ldate,$showroom_id);
               $repair_cost_data[$k] = array(
                    'month' => $month[$i],
                   'cost' => $repair_cost
               );
                $k++;
            }
    //        echo '<pre>';
    //        print_r($repair_cost_data);
    //        echo '</pre>';
    //        exit;
            $data['title'] = 'Dashboard';
            $data['report_data'] = $array;
            $data['solved_date'] = $solved_data;
            $data['deviation_date'] = $deviation_data;
            $data['income'] = $income_data;
            $data['complete_price'] = $complete_price_data;
            $data['repair_price'] = $repair_price_data;
            $data['repair_cost'] = $repair_cost_data;
            $this->load->view('header', $data);
            $this->load->view('menu');
            $this->load->view('sidemenu');
            $this->load->view('dashboard', $data);
            $this->load->view('footer');
        }
    }
}

?>
