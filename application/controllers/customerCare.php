<?php

class CustomerCare extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('check')) {
            redirect(base_url() . 'login');
        }
        $this->load->library('cart');
        $this->load->helper('form');
        $this->load->model('requisition_model');
        $this->load->model('creation_model');
    }

    //this method loads the view for insert requisition
    public function addRequisition($flag = '') {
        $data['flag'] = $flag;
        $data['title'] = 'Add Requisition';
        $data['product'] = $this->requisition_model->get_product();
        $data['color'] = $this->requisition_model->get_color();
        $data['showroom'] = $this->requisition_model->get_showroom();
        $data['problemlist'] = $this->creation_model->get_problem();
        $this->load->view('header', $data);
        $this->load->view('menu');
        $this->load->view('sidemenu');
        $this->load->view('add_requisition', $data);
        $this->load->view('footer');
    }

    //this method insert requisition data into cart
    public function addCartRequisition() {
        $session = $this->session->userdata('check');
        $showroom_id = $session['showroom'];
        if ($this->input->post()) {
            $this->form_validation->set_rules('product_id', 'Product', 'xss_clean|required|trim');
            $this->form_validation->set_rules('color', 'Product Color', 'xss_clean|required|trim');
            $this->form_validation->set_rules('quantity', 'Product Quantity', 'xss_clean|required|trim');
            $this->form_validation->set_rules('amount', 'Amount', 'xss_clean|required|trim');
            $this->form_validation->set_rules('product_of', 'Product Of', 'xss_clean|required|trim');
            $this->form_validation->set_rules('problem_id', 'Problem', 'xss_clean|required|trim');
            $this->form_validation->set_rules('invoice', 'Invoice', 'xss_clean|required|trim');
            $this->form_validation->set_rules('remarks', 'Remarks', 'xss_clean|required|trim');
            $this->form_validation->set_rules('cname', 'Customer Name', 'xss_clean|required|trim');
            $this->form_validation->set_rules('ccontact', 'Contact Number', 'xss_clean|required|trim');
            $this->form_validation->set_rules('caddress', 'Contact Address', 'xss_clean|required|trim');
            $this->form_validation->set_rules('repair', 'Remarks', 'xss_clean|required|trim');
            if($showroom_id ==0)
                $this->form_validation->set_rules('aquantity', 'Approved Quantity', 'xss_clean|required|trim');
            if ($this->form_validation->run() === FALSE) {
                $this->addRequisition();
            } else {
                $get_data = $this->requisition_model->get_product_details($this->input->post('product_id'));
                if ($get_data) {
                    $p_code = $get_data['code'];
                    $p_name = $get_data['name'];
                    $color = $this->input->post('color');
                    $color_name = $this->requisition_model->get_color_name($color);
                    $qty = $this->input->post('quantity');
                    $product_of = $this->input->post('product_of');
                    $product_of_name = $this->requisition_model->get_product_of_name($product_of);
                    $problem = $this->input->post('problem_id');
                    $problem_name = $this->requisition_model->get_problem_name($problem);
                    $invoice = $this->input->post('invoice');
                    $remarks = $this->input->post('remarks');
                    $cname = $this->input->post('cname');
                    $ccontact = $this->input->post('ccontact');
                    $caddress = $this->input->post('caddress');
                    $aquantity = $this->input->post('aquantity');
                    $repair = $this->input->post('repair');

                    $config['upload_path'] = './upload';
                    $config['allowed_types'] = 'gif|jpg|png';
                    $config['overwrite'] = FALSE;

                    $this->load->library('upload', $config);

                    $img_src = '';

                    if ($this->upload->do_upload('product_image')) {
                        $image_info = $this->upload->data();

                        $img_src = base_url() . 'upload/' . $image_info['file_name'];
                    } else {
                        $img_src = base_url() . 'img/no_image.png';
                    }

                    $cart = array(
                        'id' => $this->input->post('product_id'),
                        'qty' => 1,
                        'price' => $this->input->post('amount'),
                        'name' => $p_name,
                        'options' => array('code' => $p_code, 'color' => $color, 'color_name' => $color_name['name'], 'quantity' => $qty, 'product_of' => $product_of,
                            'product_of_name' => $product_of_name['name'], 'invoice' => $invoice, 'remarks' => $remarks, 'problem' => $problem_name['name'],
                            'problem_id' => $problem, 'customer_name' => $cname, 'customer_contact' => $ccontact, 'caddress' => $caddress, 'aquantity' => $aquantity, 'repair' => $repair, 'img_src' => $img_src)
                    );
                    if ($this->cart->insert($cart)) {
                        redirect(base_url() . 'customerCare/addRequisition');
                    } else {
                        redirect(base_url() . 'customerCare/addRequisition');
                    }
                } else {
                    redirect(base_url() . 'customerCare/addRequisition');
                }
            }
        } else {
            show_404();
        }
    }

    public function deleteCart($row_id) {
        $data = array(
            'rowid' => $row_id,
            'qty' => 0
        );
        $this->cart->update($data);
        redirect(base_url() . 'customerCare/addRequisition');
    }

    public function insertRequisition() {
        if ($this->input->post()) {
            $this->form_validation->set_rules('date', 'Date', 'xss_clean|required|trim');
            $this->form_validation->set_rules('showroom', 'Showroom', 'xss_clean|required|trim');
            if ($this->form_validation->run() === FALSE) {
                $this->addRequisition();
            } else {
                $data_array = array(
                    'showroom_id' => $this->input->post('showroom'),
                    'date' => $this->input->post('date')
                );
                if ($requisition_id = $this->requisition_model->insert_requisition($data_array)) {
                    foreach ($this->cart->contents() as $cart) {
                        $requisition_data[] = array(
                            'rqtn_id' => $requisition_id,
                            'product_id' => $cart['id'],
                            'quantity' => $cart['options']['quantity'],
                            'amount' => $cart['price'],
                            'remarks' => $cart['options']['remarks'],
                            'image' => $cart['options']['img_src'],
                            'status' => 0,
                            'color_id' => $cart['options']['color'],
                            'product_of' => $cart['options']['product_of'],
                            'problem_id' => $cart['options']['problem_id'],
                            'invoice' => $cart['options']['invoice'],
                            'customer_name' => $cart['options']['customer_name'],
                            'customer_contact' => $cart['options']['customer_contact'],
                            'customer_address' => $cart['options']['caddress'],
                            'complain_date' => $this->input->post('date'),
                            'repair_or_replace' => $cart['options']['repair']
                        );
                    }
                    if ($this->requisition_model->insert_requisition_data($requisition_data)) {
                        $this->cart->destroy();
                        redirect(base_url() . 'customerCare/addRequisition/success');
                    } else {
                        redirect(base_url() . 'customerCare/addRequisition/failed');
                    }
                } else {
                    redirect(base_url() . 'customerCare/addRequisition/failed');
                }
            }
        } else {
            show_404();
        }
    }

    public function requisitionList($flag = '') {
        $data['flag'] = $flag;
        $data['title'] = 'Requisition List';
        $data['requisition'] = $this->requisition_model->getRequisitionList();//get_requisition_list()
        $this->load->view('header', $data);
        $this->load->view('menu');
        $this->load->view('sidemenu');
        $this->load->view('requisition_list', $data);
        $this->load->view('footer');
    }

    public function editRequisition($rqtn_id) {
        $data['title'] = 'Edit Requisition';
        $data['requisition'] = $this->requisition_model->get_requisition_info($rqtn_id);
        $this->load->view('header', $data);
        $this->load->view('menu');
        $this->load->view('sidemenu');
        $this->load->view('edit_requisition', $data);
        $this->load->view('footer');
    }

    public function viewRequisition($rqtn_id) {
        $data['title'] = 'Requisition View';
        $data['requisition'] = $this->requisition_model->get_requisition_info($rqtn_id);
        $this->load->view('header', $data);
        $this->load->view('menu');
        $this->load->view('sidemenu');
        $this->load->view('view_requisition', $data);
        $this->load->view('footer');
    }

    public function editRequisitionProduct($id, $flag = '') {
        $data['flag'] = $flag;
        $data['title'] = 'Edit Product';
        $data['problemlist'] = $this->creation_model->get_problem();
        $data['color'] = $this->requisition_model->get_color();
        $data['product'] = $this->requisition_model->get_product_edit_info($id);
        $data['showroom'] = $this->requisition_model->get_showroom();
        $data['store'] = $this->creation_model->get_store();
        $this->load->view('header', $data);
        $this->load->view('menu');
        $this->load->view('sidemenu');
        $this->load->view('edit_requisition_product', $data);
        $this->load->view('footer');
    }

    public function updateRequisitionProduct($rstn_data_id) {
        if ($this->input->post()) {
            $this->form_validation->set_rules('problem_id', 'Problem', 'xss_clean|required');
            $this->form_validation->set_rules('product_code', 'Product Name', 'xss_clean|required|trim');
            $this->form_validation->set_rules('product_name', 'Product Code', 'xss_clean|required|trim');
            $this->form_validation->set_rules('color', 'Color', 'xss_clean|required');
            $this->form_validation->set_rules('quantity', 'Quantity', 'xss_clean|required');
            $this->form_validation->set_rules('aquantity', 'Apporved Quanity', 'xss_clean|required');
            $this->form_validation->set_rules('amount', 'Amount', 'xss_clean|required');
            $this->form_validation->set_rules('date', 'Date', 'xss_clean|required');
            $this->form_validation->set_rules('product_of', 'Product Of', 'xss_clean|required');
            $this->form_validation->set_rules('store', 'Store', 'xss_clean|required');
            $this->form_validation->set_rules('invoice', 'Invoice', 'xss_clean|required|trim');
            $this->form_validation->set_rules('cname', 'Customer Name', 'xss_clean|required|trim');
            $this->form_validation->set_rules('ccontact', 'Customer Contact', 'xss_clean|required|trim');
            $this->form_validation->set_rules('caddress', 'Customer Address', 'xss_clean|required');
            $this->form_validation->set_rules('remarks', 'Remarks', 'xss_clean|required|trim');
            $this->form_validation->set_rules('repair', 'Repair', 'xss_clean|required');
            $this->form_validation->set_rules('ccarcost', 'Car Cost', 'xss_clean|required');
            $this->form_validation->set_rules('status', 'Status', 'xss_clean|required');
            if ($this->form_validation->run() === FALSE) {
                $this->editRequisitionProduct($rstn_data_id);
            } else {
                $requisitionData = $this->requisition_model->get_requisition_data($rstn_data_id);
                $requisition_data = array(
                    'problem_id' => $this->input->post('problem_id'),
                    'quantity' => $this->input->post('quantity'),
                    'aquantity' => $this->input->post('aquantity'),
                    'amount' => $this->input->post('amount'),
                    'remarks' => $this->input->post('remarks'),
                    'color_id' => $this->input->post('color'),
                    'product_of' => $this->input->post('product_of'),
                    'store_id' => $this->input->post('store'),
                    'invoice' => $this->input->post('invoice'),
                    'customer_name' => $this->input->post('cname'),
                    'customer_contact' => $this->input->post('ccontact'),
                    'customer_address' => $this->input->post('caddress'),
                    'commited_date' => $this->input->post('date'),
                    'repair_or_replace' => $this->input->post('repair'),
                    'ccarcost' => $this->input->post('ccarcost'),
                    'status' => $this->input->post('status'),
                    'action_date' => date('Y-m-d')
                );
                //this condition is running when status is processing
                if ($this->input->post('status') == 1) {
                    if ($this->requisition_model->update_requisition_data($rstn_data_id, $requisition_data)) {
                        $inOut = array(
                            'rqtn_data_id' => $rstn_data_id,
                            'type' => 1,
                            'date' => date('Y-m-d')
                        );
                        if ($this->requisition_model->insert_product_in_out($inOut)) {
                            redirect(base_url() . 'customerCare/editRequisitionProduct/' . $rstn_data_id . '/success');
                        } else {
                            redirect(base_url() . 'customerCare/editRequisitionProduct/' . $rstn_data_id . '/failed');
                        }
                    } else {
                        redirect(base_url() . 'customerCare/editRequisitionProduct/' . $rstn_data_id . '/failed');
                    }
                }
                //this condition is running when status is shipped
                elseif ($this->input->post('status') == 2) {
                    //this condition in running when user select repair option
                    if ($this->input->post('repair') == 1) {
                        $is_repaired = $this->requisition_model->is_repaired($rstn_data_id);
                        //print_r($is_repaired);exit;
                        if ($is_repaired['d'] == 2) {
                            if ($this->requisition_model->update_requisition_data($rstn_data_id, $requisition_data)) {
                                $inOut = array(
                                    'rqtn_data_id' => $rstn_data_id,
                                    'type' => 2,
                                    'date' => date('Y-m-d')
                                );
                                if ($this->requisition_model->insert_product_in_out($inOut)) {
                                    redirect(base_url() . 'customerCare/editRequisitionProduct/' . $rstn_data_id . '/success');
                                } else {
                                    redirect(base_url() . 'customerCare/editRequisitionProduct/' . $rstn_data_id . '/failed');
                                }
                            } else {
                                redirect(base_url() . 'customerCare/editRequisitionProduct/' . $rstn_data_id . '/failed');
                            }
                        } else {
                            redirect(base_url() . 'customerCare/editRequisitionProduct/' . $rstn_data_id . '/error');
                        }
                    }
                    //this condition in running when user select replace option
                    else {
                        if ($this->requisition_model->update_requisition_data($rstn_data_id, $requisition_data)) {
                            redirect(base_url() . 'customerCare/editRequisitionProduct/' . $rstn_data_id . '/success');
                        } else {
                            redirect(base_url() . 'customerCare/editRequisitionProduct/' . $rstn_data_id . '/failed');
                        }
                    }
                }
                //this condition is running when status is decline
                else {
                    //if in database status is shipped
                    if ($requisitionData['status'] == 2) {
                        if ($requisitionData['repair_or_replace'] == 1) {
                            $inOut = array(
                                'rqtn_data_id' => $rstn_data_id,
                                'type' => 1,
                                'date' => date('Y-m-d')
                            );
                            if ($this->requisition_model->insert_product_in_out($inOut)) {
                                if ($this->requisition_model->update_requisition_data($rstn_data_id, $requisition_data)) {
                                    redirect(base_url() . 'customerCare/editRequisitionProduct/' . $rstn_data_id . '/success');
                                } else {
                                    redirect(base_url() . 'customerCare/editRequisitionProduct/' . $rstn_data_id . '/failed');
                                }
                            } else {
                                redirect(base_url() . 'customerCare/editRequisitionProduct/' . $rstn_data_id . '/failed');
                            }
                        } else {
                            if ($this->requisition_model->update_requisition_data($rstn_data_id, $requisition_data)) {
                                redirect(base_url() . 'customerCare/editRequisitionProduct/' . $rstn_data_id . '/success');
                            } else {
                                redirect(base_url() . 'customerCare/editRequisitionProduct/' . $rstn_data_id . '/failed');
                            }
                        }
                    }
                    //if in database status is processing
                    elseif ($requisitionData['status'] == 1) {
                        $inOut = array(
                            'rqtn_data_id' => $rstn_data_id,
                            'type' => 2,
                            'date' => date('Y-m-d')
                        );
                        if ($this->requisition_model->insert_product_in_out($inOut)) {
                            if ($this->requisition_model->update_requisition_data($rstn_data_id, $requisition_data)) {
                                redirect(base_url() . 'customerCare/editRequisitionProduct/' . $rstn_data_id . '/success');
                            } else {
                                redirect(base_url() . 'customerCare/editRequisitionProduct/' . $rstn_data_id . '/failed');
                            }
                        } else {
                            redirect(base_url() . 'customerCare/editRequisitionProduct/' . $rstn_data_id . '/failed');
                        }
                    } else {
                        if ($this->requisition_model->update_requisition_data($rstn_data_id, $requisition_data)) {
                            redirect(base_url() . 'customerCare/editRequisitionProduct/' . $rstn_data_id . '/success');
                        } else {
                            redirect(base_url() . 'customerCare/editRequisitionProduct/' . $rstn_data_id . '/failed');
                        }
                    }
                }
            }
        } else {
            show_404();
        }
    }

    public function deleteRequisition($rqtn_id) {
        if ($this->requisition_model->delete_requisition_data($rqtn_id)) {
            $this->requisition_model->delete_requisition($rqtn_id);
            redirect(base_url() . 'customerCare/requisitionList');
        } else {
            redirect(base_url() . 'customerCare/requisitionList/failed');
        }
    }

    public function allocateExpense($id, $flag = '') {
        $data['flag'] = $flag;
        $data['title'] = 'Allocate Expense';
        $data['sections'] = $this->creation_model->get_section();
        $data['expense'] = $this->requisition_model->get_info($id);
        $data['delivery'] = $this->requisition_model->get_delivery_info($id);
        $data['rqtn_id'] = $id;
        $this->load->view('header', $data);
        $this->load->view('menu');
        $this->load->view('sidemenu');
        $this->load->view('allocate_expense', $data);
        $this->load->view('footer');
    }

    public function insertAllocateExpense($rqtn_id) {
        if ($this->input->post()) {
            $this->form_validation->set_rules('section_id', 'Section', 'xss_clean|required|trim');
            $this->form_validation->set_rules('commited_date', 'Committed Date', 'xss_clean|required|trim');
            $this->form_validation->set_rules('repair_cost', 'Repair Cost', 'xss_clean|required|trim');
            if ($this->form_validation->run() === false) {
                $this->allocateExpense($rqtn_id);
            } else {
                $data = array(
                    'rqtn_data_id' => $rqtn_id,
                    'section_id' => $this->input->post('section_id'),
                    'committed_date' => $this->input->post('commited_date'),
                    'repair_cost' => $this->input->post('repair_cost')
                );
                if ($this->requisition_model->insert_allocate_expanse($data)) {
                    redirect(base_url() . 'customerCare/allocateExpense/' . $rqtn_id . '/success');
                } else {
                    redirect(base_url() . 'customerCare/allocateExpense/' . $rqtn_id . '/failed');
                }
            }
        } else {
            show_404();
        }
    }

    public function repaired($allocate_id, $rstn_data_id) {
        $data = array(
            'is_repaired' => 2,
            'service_date' => date('Y-m-d')
        );
        if ($this->requisition_model->repaired($allocate_id, $data)) {
            redirect(base_url() . 'customerCare/allocateExpense/' . $rstn_data_id . '/repaired');
        } else {
            redirect(base_url() . 'customerCare/allocateExpense/' . $rstn_data_id . '/repairedfailed');
        }
    }
    
    public function requisitionListShowroom($flag = '') {
        $data['flag'] = $flag;
        $data['title'] = 'Requisition List';
        $session = $this->session->userdata('check');
        $show_room = $session['showroom'];
        $data['requisition'] = $this->requisition_model->getRequisitionListShowroom($show_room);//get_requisition_list()
        $this->load->view('header', $data);
        $this->load->view('menu');
        $this->load->view('sidemenu');
        $this->load->view('requisition_list_showroom');
        $this->load->view('footer');
    }
    
    public function print_req_4showroom($id, $flag = '') {
        $data['flag'] = $flag;
        $data['title'] = 'Requisition Product';
        $data['problemlist'] = $this->creation_model->get_problem();
        $data['color'] = $this->requisition_model->get_color();
        $data['product'] = $this->requisition_model->get_product_edit_info($id);
        $data['showroom'] = $this->requisition_model->get_showroom();
        $data['store'] = $this->creation_model->get_store();
        $this->load->view('header', $data);
        $this->load->view('menu');
        $this->load->view('sidemenu');
        $this->load->view('print_requisition_4showroom', $data);
        $this->load->view('footer');
    }

}

?>
