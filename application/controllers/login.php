<?php

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
    }

    public function index() {
        $this->load->view('login');
    }

    public function check_login() {
        if ($this->input->post()) {
            $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[50]|xss_clean');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|max_length[50]');
            if ($this->form_validation->run() === FALSE) {
                $this->index();
            } else {
                $username = $this->input->post('username');
                $password = md5($this->input->post('password'));
                $data = $this->user_model->check($username, $password);
                if ($data) {
                    foreach ($data->result() as $data) {
                        if($data->status != 1){
                            $this->session->set_flashdata('disable', '<div class="error-container1">' . "You are Disable User" . '</div>');
                                redirect(base_url() . "login");
                        }
                        $session_data = array(
                            'fname' => $data->fname,
                            'lname' => $data->lname,
                            'username' => $data->username,
                            'email' => $data->email,
                            'showroom' => $data->show_room_id
                        );
                        $this->session->set_userdata('check', $session_data);
                        
                    }
                    redirect(base_url().'dashboard');
                } else {
                    $this->session->set_flashdata('error', '<div class="error-container">' . "Invalid Username or Password" . '</div>');
                    redirect(base_url() . "login");
                }
            }
        } else {
            show_404();
        }
    }
    public function logout(){
        $array_items = array('username' => '', 'is_logged_in' => '');
        $this->session->unset_userdata($array_items);
        $this->session->sess_destroy();
        redirect('login');
    }

}

?>
