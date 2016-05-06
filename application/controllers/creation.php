<?php

class Creation extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('check')) {
            redirect(base_url() . 'login');
        }
        $this->load->model('creation_model');
    }

    //this method loads view for insert color
    public function addColor($flag = '') {
        $data['flag'] = $flag;
        $data['title'] = 'Add Color';
        //this model contains all color list from cc_color table
        $data['colorlist'] = $this->creation_model->get_color();
        $this->load->view('header', $data);
        $this->load->view('menu');
        $this->load->view('sidemenu');
        $this->load->view('color', $data);
        $this->load->view('footer');
    }

    //this method insert color information into database
    public function insertColor() {
        if ($this->input->post()) {
            $this->form_validation->set_rules('name', 'Color Name', 'xss_clean|required|trim|max_length[30]');
            if ($this->form_validation->run() === FALSE) {
                $this->addColor();
            } else {
                $data_array = array(
                    'name' => $this->input->post('name')
                );
                if ($this->creation_model->insert_color($data_array)) {
                    redirect(base_url() . 'creation/addColor/success');
                } else {
                    redirect(base_url() . 'creation/addColor/failed');
                }
            }
        } else {
            show_404();
        }
    }

    //this method updates color information
    public function updateCategory() {
        if ($this->input->post()) {
            $this->form_validation->set_rules('color_id', 'Old Color', 'xss_clean|required|trim');
            $this->form_validation->set_rules('new_name', 'Color Name', 'xss_clean|required|trim|max_length[30]');
            if ($this->form_validation->run() === FALSE) {
                $this->addColor();
            } else {
                $id = $this->input->post('color_id');
                $data_array = array(
                    'name' => $this->input->post('new_name')
                );
                if ($this->creation_model->update_color($data_array, $id)) {
                    redirect(base_url() . 'creation/addColor/uploadsuccess');
                } else {
                    redirect(base_url() . 'creation/addColor/uploadfailed');
                }
            }
        } else {
            show_404();
        }
    }

    //this method delete color information from database
    public function deleteColor($id) {
        if ($this->creation_model->delete_color($id)) {
            redirect(base_url() . 'creation/addColor');
        } else {
            redirect(base_url() . 'creation/addColor/deletefailed');
        }
    }

    //this method load the view for insert supplier information
    public function addSupplier($flag = '') {
        $data['flag'] = $flag;
        $data['title'] = 'Add Color';
        $data['supplier'] = $this->creation_model->get_supplier();
        $this->load->view('header', $data);
        $this->load->view('menu');
        $this->load->view('sidemenu');
        $this->load->view('add_supplier', $data);
        $this->load->view('footer');
    }

    //this method insert supplier information into database
    public function insertSupplier() {
        if ($this->input->post()) {
            $this->form_validation->set_rules('name', 'Supplier Name', 'xss_clean|required|trim');
            $this->form_validation->set_rules('address', 'Supplier Address', 'xss_clean|required|trim');
            $this->form_validation->set_rules('phone', 'Supplier phone', 'xss_clean|required|trim');
            if ($this->form_validation->run() === FALSE) {
                $this->addSupplier();
            } else {
                $data_array = array(
                    'name' => $this->input->post('name'),
                    'address' => $this->input->post('address'),
                    'phone' => $this->input->post('phone'),
                );
                if ($this->creation_model->insert_supplier($data_array)) {
                    redirect(base_url() . 'creation/addSupplier/success');
                } else {
                    redirect(base_url() . 'creation/addSupplier/failed');
                }
            }
        } else {
            show_404();
        }
    }

    //this method delete supplier information from database
    public function deleteSupplier($id) {
        if ($this->creation_model->delete_supplier($id)) {
            redirect(base_url() . 'creation/addSupplier');
        } else {
            redirect(base_url() . 'creation/addSupplier/deletefailed');
        }
    }

    //this method loads the view for supplier information update
    public function editSupplier($id, $flag = '') {
        $data['flag'] = $flag;
        $data['title'] = 'Add Color';
        $data['supplierList'] = $this->creation_model->get_supplier_info($id);
        $this->load->view('header', $data);
        $this->load->view('menu');
        $this->load->view('sidemenu');
        $this->load->view('edit_supplier', $data);
        $this->load->view('footer');
    }

    //this method update supplier information into database
    public function updateSupplier($id) {
        if ($this->input->post()) {
            $this->form_validation->set_rules('name', 'Supplier Name', 'xss_clean|required|trim');
            $this->form_validation->set_rules('address', 'Supplier Address', 'xss_clean|required|trim');
            $this->form_validation->set_rules('phone', 'Supplier phone', 'xss_clean|required|trim');
            if ($this->form_validation->run() === FALSE) {
                $this->addSupplier();
            } else {
                $data_array = array(
                    'name' => $this->input->post('name'),
                    'address' => $this->input->post('address'),
                    'phone' => $this->input->post('phone'),
                );
                if ($this->creation_model->update_supplier($data_array, $id)) {
                    redirect(base_url() . 'creation/editSupplier/' . $id . '/success');
                } else {
                    redirect(base_url() . 'creation/editSupplier/' . $id . '/failed');
                }
            }
        } else {
            show_404();
        }
    }

    public function addProblem($flag = '') {
        $data['flag'] = $flag;
        $data['problemlist'] = $this->creation_model->get_problem();
        $data['title'] = 'Add Problem';
        $this->load->view('header', $data);
        $this->load->view('menu');
        $this->load->view('sidemenu');
        $this->load->view('add_problem', $data);
        $this->load->view('footer');
    }

    public function insertProblem() {
        if ($this->input->post()) {
            $this->form_validation->set_rules('name', 'Problem Name', 'xss_clean|required|trim');
            if ($this->form_validation->run() === FALSE) {
                $this->addProblem();
            } else {
                $data_array = array(
                    'name' => $this->input->post('name')
                );
                if ($this->creation_model->insert_problem($data_array)) {
                    redirect(base_url() . 'creation/addProblem/success');
                } else {
                    redirect(base_url() . 'creation/addProblem/failed');
                }
            }
        } else {
            show_404();
        }
    }

    public function deleteProblem($id) {
        if ($this->creation_model->delete_problem($id)) {
            redirect(base_url() . 'creation/addProblem');
        } else {
            redirect(base_url() . 'creation/addProblem/deletefailed');
        }
    }

    public function updateProblem() {
        if ($this->input->post()) {
            $this->form_validation->set_rules('problem_id', 'Problem Name', 'xss_clean|required|trim');
            $this->form_validation->set_rules('new_name', 'Problem Name', 'xss_clean|required|trim|max_length[30]');
            if ($this->form_validation->run() === FALSE) {
                $this->addProblem();
            } else {
                $id = $this->input->post('problem_id');
                $data_array = array(
                    'name' => $this->input->post('new_name')
                );
                if ($this->creation_model->update_problem($data_array, $id)) {
                    redirect(base_url() . 'creation/addProblem/uploadsuccess');
                } else {
                    redirect(base_url() . 'creation/addProblem/uploadfailed');
                }
            }
        } else {
            show_404();
        }
    }

    public function addSection($flag = '') {
        $data['flag'] = $flag;
        $data['title'] = 'Add Section';
        $data['sectionlist'] = $this->creation_model->get_section();
        $this->load->view('header', $data);
        $this->load->view('menu');
        $this->load->view('sidemenu');
        $this->load->view('add_section', $data);
        $this->load->view('footer');
    }

    public function insertSection() {
        if ($this->input->post()) {
            $this->form_validation->set_rules('name', 'Section Name', 'xss_clean|required|trim');
            if ($this->form_validation->run() === FALSE) {
                $this->addSection();
            } else {
                $data_array = array(
                    'name' => $this->input->post('name')
                );
                if ($this->creation_model->insert_section($data_array)) {
                    redirect(base_url() . 'creation/addSection/success');
                } else {
                    redirect(base_url() . 'creation/addSection/failed');
                }
            }
        } else {
            show_404();
        }
    }

    public function updateSection() {
        if ($this->input->post()) {
            $this->form_validation->set_rules('section_id', 'Section Name', 'xss_clean|required|trim');
            $this->form_validation->set_rules('new_name', 'New Name', 'xss_clean|required|trim|max_length[30]');
            if ($this->form_validation->run() === FALSE) {
                $this->addProblem();
            } else {
                $id = $this->input->post('section_id');
                $data_array = array(
                    'name' => $this->input->post('new_name')
                );
                if ($this->creation_model->update_section($data_array, $id)) {
                    redirect(base_url() . 'creation/addSection/uploadsuccess');
                } else {
                    redirect(base_url() . 'creation/addSection/uploadfailed');
                }
            }
        } else {
            show_404();
        }
    }

    public function deleteSection($id) {
        if ($this->creation_model->delete_section($id)) {
            redirect(base_url() . 'creation/addSection');
        } else {
            redirect(base_url() . 'creation/addSection/deletefailed');
        }
    }

    public function addStore($flag = '') {
        $data['flag'] = $flag;
        $data['title'] = 'Add Store';
        $data['storelist'] = $this->creation_model->get_store();
        $this->load->view('header', $data);
        $this->load->view('menu');
        $this->load->view('sidemenu');
        $this->load->view('add_store', $data);
        $this->load->view('footer');
    }
    public function insertStore(){
        if ($this->input->post()) {
            $this->form_validation->set_rules('name', 'Store Name', 'xss_clean|required|trim');
            if ($this->form_validation->run() === FALSE) {
                $this->addStore();
            } else {
                $data_array = array(
                    'name' => $this->input->post('name')
                );
                if ($this->creation_model->insert_store($data_array)) {
                    redirect(base_url() . 'creation/addStore/success');
                } else {
                    redirect(base_url() . 'creation/addStore/failed');
                }
            }
        } else {
            show_404();
        }
    }
    public function updateStore(){
        if ($this->input->post()) {
            $this->form_validation->set_rules('store_id', 'Store Name', 'xss_clean|required|trim');
            $this->form_validation->set_rules('new_name', 'New Name', 'xss_clean|required|trim|max_length[30]');
            if ($this->form_validation->run() === FALSE) {
                $this->addStore();
            } else {
                $id = $this->input->post('store_id');
                $data_array = array(
                    'name' => $this->input->post('new_name')
                );
                if ($this->creation_model->update_store($data_array, $id)) {
                    redirect(base_url() . 'creation/addStore/uploadsuccess');
                } else {
                    redirect(base_url() . 'creation/addStore/uploadfailed');
                }
            }
        } else {
            show_404();
        }
    }

    public function deleteStore($id){
        if ($this->creation_model->delete_store($id)) {
            redirect(base_url() . 'creation/addStore');
        } else {
            redirect(base_url() . 'creation/addStore/deletefailed');
        }
    }

}

?>
