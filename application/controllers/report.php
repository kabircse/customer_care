<?php

class Report extends CI_Controller{
    public function __construct() {
        parent::__construct();
    }
    
    public function complainReport(){
        $data['title'] = "Complain and Solved problem";
        $this->load->view('header', $data);
        $this->load->view('menu');
        $this->load->view('sidemenu');
        $this->load->view('complain');
        $this->load->view('footer');
    }
}

?>
