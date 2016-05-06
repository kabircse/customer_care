<?php

class Showroom extends CI_Controller{
    public function __construct() {
        parent::__construct();
        if(!$this->session->userdata('check')){
            redirect(base_url().'login');
        }
        $this->load->model('showroom_model');
    }
    //this method loads view for inserting showroom information 
    public function addShowroom($flag = ''){
        $data['flag'] = $flag;
        $data['title'] = 'Add Showroom';
        $this->load->view('header', $data);
        $this->load->view('menu');
        $this->load->view('sidemenu');
        $this->load->view('add_showroom', $data);
        $this->load->view('footer');
    }
    //this method is for inserting showroom information into database
    public function insertShowroom(){
        if($this->input->post()){
            $this->form_validation->set_rules('type', 'Showroom Type', 'required|trim|xss_clean');
            $this->form_validation->set_rules('name', 'Showroom Name', 'required|trim|xss_clean');
            $this->form_validation->set_rules('address', 'Address', 'required|trim|xss_clean');
            $this->form_validation->set_rules('code', 'Showroom Code', 'required|trim|xss_clean|max_length[8]');
            $this->form_validation->set_rules('reg_no', 'Registration No', 'required|trim|xss_clean|max_length[20]');
            if($this->form_validation->run() === FALSE){
                $this->addShowroom();
            }
            else{
                $data_array = array(
                    'type' => $this->input->post('type'),
                    'name' => $this->input->post('name'),
                    'address' => $this->input->post('address'),
                    'code' => $this->input->post('code'),
                    'reg_no' => $this->input->post('reg_no')
                );
                if($this->showroom_model->insert_showroom($data_array)){
                    redirect(base_url().'showroom/addShowroom/success');
                }
                else{
                    redirect(base_url().'showroom/addShowroom/failed');
                }
                
            }
        }else{
            show_404();
        }
    }

    public function showroomList($flag = ''){
        $data['flag'] = $flag;
        $data['title']  = 'Showroom List';
        //this model is contains all showroom data
        $data['showroomlist'] = $this->showroom_model->get_showroom_list();
        $this->load->view('header', $data);
        $this->load->view('menu');
        $this->load->view('sidemenu');
        $this->load->view('showroom_list', $data);
        $this->load->view('footer');
    }
    public function editShowroom($id, $flag = ''){
        $data['flag'] = $flag;
        $data['title'] = 'Edit Showroom';
        //this model is for updating show room information
        $data['showroominfo'] = $this->showroom_model->get_showroom_info($id);
        $this->load->view('header', $data);
        $this->load->view('menu');
        $this->load->view('sidemenu');
        $this->load->view('edit_showroom', $data);
        $this->load->view('footer');
    }
    public function updateShowroom($id){
        if($this->input->post()){
            $this->form_validation->set_rules('type', 'Showroom Type', 'required|trim|xss_clean');
            $this->form_validation->set_rules('name', 'Showroom Name', 'required|trim|xss_clean');
            $this->form_validation->set_rules('address', 'Address', 'required|trim|xss_clean');
            $this->form_validation->set_rules('code', 'Showroom Code', 'required|trim|xss_clean|max_length[8]');
            $this->form_validation->set_rules('reg_no', 'Registration No', 'required|trim|xss_clean|max_length[20]');
            if($this->form_validation->run() === FALSE){
                $this->addShowroom();
            }
            else{
                $data_array = array(
                    'type' => $this->input->post('type'),
                    'name' => $this->input->post('name'),
                    'address' => $this->input->post('address'),
                    'code' => $this->input->post('code'),
                    'reg_no' => $this->input->post('reg_no')
                );
                if($this->showroom_model->update_showroom($data_array, $id)){
                    redirect(base_url().'showroom/editShowroom/'.$id.'/success');
                }
                else{
                    redirect(base_url().'showroom/editShowroom/'.$id.'/failed');
                }
                
            }
        }else{
            show_404();
        }
    }
    //this method for deleting showroom information
    public function deleteShowroom($id){
        //this model is for deleting a column from  cc_showroom table 
        if($this->showroom_model->delete_showroom($id)){
            redirect(base_url().'showroom/showroomList');
        }else{
            redirect(base_url().'showroom/showroomList/failed');
        }
    }
}

?>
