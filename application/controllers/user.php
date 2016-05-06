<?php
class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        //this session is for checking user is logged in or not
        if(!$this->session->userdata('check')){
            redirect(base_url().'login');
        }
        $this->load->model('showroom_model');
        $this->load->model('user_model');
    }
    //this method loads the view for insert user information
    public function index($flag = '') {
        $data['flag'] = $flag;
        $data['title'] = 'Add User';
        $this->load->model('creation_model');
        $this->load->model('showroom_model');
        //this model is for getting show room information
        $data['section'] = $this->creation_model->get_section();
        //this model is for getting user information
        $data['userlist'] = $this->user_model->getUser();
        $data['show_rooms'] = $this->showroom_model->get_showroom_list();
        $this->load->view('header', $data);
        $this->load->view('menu');
        $this->load->view('sidemenu');
        $this->load->view('user_view', $data);
        $this->load->view('footer');
    }
    //this method insert data to database
    public function insertUser() {
        if ($this->input->post()) {
            $this->form_validation->set_rules('fname', 'First Name', 'required|xss_clean|trim|max_length[50]');
            $this->form_validation->set_rules('lname', 'Last Name', 'required|xss_clean|trim|max_length[50]');
            $this->form_validation->set_rules('email', 'Email', 'required|xss_clean|trim|max_length[50]|valid_email');
            $this->form_validation->set_rules('section_id', 'Section', 'required|xss_clean|trim');
            $this->form_validation->set_rules('username', 'Username', 'required|xss_clean|trim|max_length[12]|callback_username');
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
            $this->form_validation->set_rules('group', 'User Group', 'required|xss_clean|trim');
            $this->form_validation->set_rules('status', 'Status', 'required|xss_clean|trim');
           //$this->form_validation->set_rules('show_room_id', 'Show Room', 'required|xss_clean|trim');
            if ($this->form_validation->run() === FALSE) {
                $this->index();
            } else {
                
                if($this->input->post('group')=='2'){
                    $show_room_id = $this->input->post('show_room_id');   
                }
                else{
                    $show_room_id = 0;
                }
                $data_array = array(
                    'fname' => $this->input->post('fname'),
                    'lname' => $this->input->post('lname'),
                    'email' => $this->input->post('email'),
                    'section_id' => $this->input->post('section_id'),
                    'username' => $this->input->post('username'),
                    'password' => md5($this->input->post('password')),
                    'group' => $this->input->post('group'),
                    'status' => $this->input->post('status'),
                    'show_room_id' => $show_room_id
                );
                //echo var_dump($data_array);exit;
                //this model is for insert data to cc_user table
                if ($this->user_model->insert_user($data_array)) {
                    redirect(base_url() . 'user/index/success');
                } else {
                    redirect(base_url() . 'user/index/failed');
                }
            }
        } else {
            show_404();
        }
    }
    //this method checks the username is exits or not
    public function username($username) {
        $data = $this->user_model->check_username($username);
        if ($data) {
            $this->form_validation->set_message('username', 'This Username has already Exists!!!!');
            return FALSE;
        } else {
            return TRUE;
        }
    }
    
    //this method is for deleting user information from database
    public function deleteUser($id) {
        //this model is for deleting user information from cc_user table
        if ($this->user_model->delete_user($id)) {
            redirect(base_url() . 'user/index');
        } else {
            redirect(base_url() . 'user/index/deletefailed');
        }
    }
    //this method load the view for update user informatiuon
    public function editUser($id, $flag = '') {
        $data['flag'] = $flag;
        $data['title'] = 'Edit User';
        $this->load->model('creation_model');
        //this modol is for getting information for a user 
        $data['userinfo'] = $this->user_model->get_user_info($id);
        //this model is for getting data of all showroom from cc_showroom table 
        $data['section'] = $this->creation_model->get_section();
        $data['show_rooms'] = $this->showroom_model->get_showroom_list();
        $this->load->view('header', $data);
        $this->load->view('menu');
        $this->load->view('sidemenu');
        $this->load->view('edit_user', $data);
        $this->load->view('footer');
    }
    //this method update user data to database
    public function updateUser($id) {
        if ($this->input->post()) {
            $this->form_validation->set_rules('fname', 'First Name', 'required|xss_clean|trim|max_length[50]');
            $this->form_validation->set_rules('lname', 'Last Name', 'required|xss_clean|trim|max_length[50]');
            $this->form_validation->set_rules('email', 'Email', 'required|xss_clean|trim|max_length[50]|valid_email');
            $this->form_validation->set_rules('section_id', 'Showroom', 'required|xss_clean|trim');
            $this->form_validation->set_rules('username', 'Username', 'required|xss_clean|trim|max_length[12]|callback_check_username');
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
            $this->form_validation->set_rules('group', 'User Group', 'required|xss_clean|trim');
            $this->form_validation->set_rules('status', 'Status', 'required|xss_clean|trim');
            if ($this->form_validation->run() === FALSE) {
                $this->editUser($id);
            } else {
                $data_array = array(
                    'fname' => $this->input->post('fname'),
                    'lname' => $this->input->post('lname'),
                    'email' => $this->input->post('email'),
                    'section_id' => $this->input->post('section_id'),
                    'username' => $this->input->post('username'),
                    'password' => md5($this->input->post('password')),
                    'group' => $this->input->post('group'),
                    'status' => $this->input->post('status')
                );
                //this model is for update user information 
                if ($this->user_model->update_user($data_array, $id)) {
                    redirect(base_url() . 'user/editUser/' . $id . '/success');
                } else {
                    redirect(base_url() . 'user/editUser/' . $id . '/failed');
                }
            }
        } else {
            show_404();
        }
    }
    //this method is for checing username is exits or not when the user information is updating
    public function check_username($username) {
        $id = $this->input->post('id');
        //this model is for checing this username and id is exists or not
        $data = $this->user_model->check_username_exists($id, $username);
        if ($data) {
            return TRUE;
        } else {
            $$data = $this->user_model->check_username($username);
            if ($$data) {
                $this->form_validation->set_message('check_username', 'This Username has already Exists!!!!');
                return FALSE;
            } else {
                return TRUE;
            }
        }
    }

}

?>
