<?php
class Product extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if(!$this->session->userdata('check')){
            redirect(base_url().'login');
        }
        $this->load->model('product_model');
        $this->load->model('creation_model');
    }
    //this method loads view for insert category
    public function addCategory($flag = '') {
        $data['flag'] = $flag;
        $data['title'] = 'Add Category';
        $results = $this->product_model->getCategories(0);
        foreach ($results as $result) {
            $data['categories'][] = array(
                'id' => $result['id'],
                'name' => $result['name']
            );
        }
        $this->load->view('header', $data);
        $this->load->view('menu');
        $this->load->view('sidemenu');
        $this->load->view('add_category', $data);
        $this->load->view('footer');
    }
    //this method insert product category into database
    public function insertCategory() {
        if ($this->input->post()) {
            $this->form_validation->set_rules('parent', 'Parent Category', 'xss_clean|trim|required');
            $this->form_validation->set_rules('name', 'Category Name', 'xss_clean|trim|required|max_length[30]');
            if ($this->form_validation->run() === FALSE) {
                $this->addCategory();
            } else {
                $data_array = array(
                    'name' => $this->input->post('name'),
                    'parent' => $this->input->post('parent')
                );
                //this model is for inserting category to cc_product_category table 
                if ($this->product_model->insert_category($data_array)) {
                    redirect(base_url() . 'product/addCategory/success');
                } else {
                    redirect(base_url() . 'product/addCategory/failed');
                }
            }
        } else {
            show_404();
        }
    }
    //this method is for loading view for edit category
    public function editCategory($id, $flag = '') {
        $data['flag'] = $flag;
        $data['title'] = 'Edit Category';
        //this model is for getting selected category for edit
        $data['getCategory'] = $this->product_model->get_category($id);
        $results = $this->product_model->getCategories(0);
        foreach ($results as $result) {
            $data['categories'][] = array(
                'id' => $result['id'],
                'name' => $result['name']
            );
        }
        $this->load->view('header', $data);
        $this->load->view('menu');
        $this->load->view('sidemenu');
        $this->load->view('edit_category', $data);
        $this->load->view('footer');
    }
    //this method is updating category data into database
    public function updateCategory($id) {
        if ($this->input->post()) {
            $this->form_validation->set_rules('parent', 'Parent Category', 'xss_clean|trim|required');
            $this->form_validation->set_rules('name', 'Category Name', 'xss_clean|trim|required|max_length[30]');
            if ($this->form_validation->run() === FALSE) {
                $this->addCategory();
            } else {
                $data_array = array(
                    'name' => $this->input->post('name'),
                    'parent' => $this->input->post('parent')
                );
                if ($this->product_model->update_category($data_array, $id)) {
                    redirect(base_url() . 'product/editCategory/' . $id . '/success');
                } else {
                    redirect(base_url() . 'product/editCategory/' . $id . '/failed');
                }
            }
        } else {
            show_404();
        }
    }
    //this method is for deleting category
    public function deleteCategory($id) {
        if ($this->product_model->delete_category($id)) {
            redirect(base_url() . 'product/addCategory');
        } else {
            redirect(base_url() . 'product/addCategory/deletefailed');
        }
    }
    //this method loads the view for insert product into database
    public function addProduct($flag = '') {
        $data['flag'] = $flag;
        $data['title'] = 'Product Add';
        $results = $this->product_model->getCategories(0);
        foreach ($results as $result) {
            $data['categories'][] = array(
                'id' => $result['id'],
                'name' => $result['name']
            );
        }
        $data['supplier'] = $this->creation_model->get_supplier();
        $data['colorlist'] = $this->creation_model->get_color();
        $this->load->view('header', $data);
        $this->load->view('menu');
        $this->load->view('sidemenu');
        $this->load->view('add_product', $data);
        $this->load->view('footer');
    }
    //this method insert product information to cc_product table
    public function insertProduct() {
        if ($this->input->post()) {
            $this->form_validation->set_rules('category_id', 'Category', 'xss_clean|trim|required');
            $this->form_validation->set_rules('name', 'Product Name', 'xss_clean|trim|required');
            $this->form_validation->set_rules('code', 'Product Code', 'xss_clean|trim|required|max_length[30]|callback_check_code');
            $this->form_validation->set_rules('color_id', 'Color', 'xss_clean|required');
            $this->form_validation->set_rules('supplier_id', 'Supplier', 'xss_clean|required');
            $this->form_validation->set_rules('price', 'Price', 'xss_clean|required|trim');
            if ($this->form_validation->run() === FALSE) {
                $this->addProduct();
            } else {

                $data_array = array(
                    'name' => $this->input->post('name'),
                    'code' => $this->input->post('code'),
                    'category' => $this->input->post('category_id'),
                    'price' => $this->input->post('price')
                );
                //this model insert data to cc_product table and returns product id
                $product_id = $this->product_model->insert_product($data_array);
                if ($product_id) {
                    if ($this->input->post('color_id')) {

                        foreach ($this->input->post('color_id') as $color) {
                            $color_data[] = array(
                                'color_id' => $color,
                                'product_id' => $product_id
                            );
                        }
                        //this model insert product color to cc_product_color table
                        if ($this->product_model->insert_product_color($color_data)) {
                            if ($this->input->post('supplier_id')) {
                                foreach ($this->input->post('supplier_id') as $supplier) {
                                    $supplier_data[] = array(
                                        'supplier_id' => $supplier,
                                        'product_id' => $product_id
                                    );
                                }
                                //this model insert product supplier to cc_product_supplier
                                if ($this->product_model->insert_product_supplier($supplier_data)) {
                                    redirect(base_url() . 'product/addProduct/success');
                                } else {
                                    redirect(base_url() . 'product/addProduct/failed');
                                }
                            }
                        } else {
                            redirect(base_url() . 'product/addProduct/failed');
                        }
                    } else {
                        redirect(base_url() . 'product/addProduct/failed');
                    }
                } else {
                    redirect(base_url() . 'product/addProduct/failed');
                }
            }
        } else {
            show_404();
        }
    }
    //this method is for checking this product is already exists or not
    public function check_code($code) {
        $data = $this->product_model->check_coode($code);
        if ($data) {
            $this->form_validation->set_message('check_code', "This Product Code has already Exists !!!");
            return FALSE;
        } else {
            return TRUE;
        }
    }
    //this method is for showing product information list
    public function productList() {
        $data['title'] = 'Product List';
        //this model is for getting product list from cc_product
        $data['product'] = $this->product_model->get_product();
        $this->load->view('header', $data);
        $this->load->view('menu');
        $this->load->view('sidemenu');
        $this->load->view('product_list', $data);
        $this->load->view('footer');
    }
    //this method loads the view for update product information
    public function editProduct($id, $flag = '') {
        $data['flag'] = $flag;
        $data['title'] = 'Product Edit';
        //this model is for getting product information from cc_product
        $data['productinfo'] = $this->product_model->get_product_info($id);
        $data['colorinfo'] = $this->product_model->get_product_color($id);
        $data['supplierinfo'] = $this->product_model->get_product_supplier($id);
        $results = $this->product_model->getCategories(0);
        foreach ($results as $result) {
            $data['categories'][] = array(
                'id' => $result['id'],
                'name' => $result['name']
            );
        }
        $data['supplier'] = $this->creation_model->get_supplier();
        $data['colorlist'] = $this->creation_model->get_color();
        $this->load->view('header', $data);
        $this->load->view('menu');
        $this->load->view('sidemenu');
        $this->load->view('edit_product', $data);
        $this->load->view('footer');
    }
    //this method is for updating product information
    //in this model first update product code, name and category
    //then delete all related color with this product and then insert new color
    //then delete all related supplier with this product and then insert new supplier
    public function updateProduct($id){
        if ($this->input->post()) {
            $this->form_validation->set_rules('category_id', 'Category', 'xss_clean|trim|required');
            $this->form_validation->set_rules('name', 'Product Name', 'xss_clean|trim|required');
            $this->form_validation->set_rules('code', 'Product Code', 'xss_clean|trim|required|max_length[30]|callback_check_code_edit');
            $this->form_validation->set_rules('color_id', 'Color', 'xss_clean|required');
            $this->form_validation->set_rules('supplier_id', 'Supplier', 'xss_clean|required');
            if ($this->form_validation->run() === FALSE) {
                $this->addProduct();
            } else {

                $data_array = array(
                    'name' => $this->input->post('name'),
                    'code' => $this->input->post('code'),
                    'category' => $this->input->post('category_id'),
                );
                if ($this->product_model->update_product($data_array, $id)) {
                    if ($this->input->post('color_id')) {
                        //this model delete all color from  cc_product_color where color id = post[color]
                        $this->product_model->delete_product_color($id);
                        foreach ($this->input->post('color_id') as $color) {
                            $color_data[] = array(
                                'color_id' => $color,
                                'product_id' => $id
                            );
                            
                        }
                        if ($this->product_model->insert_product_color($color_data)) {
                            if ($this->input->post('supplier_id')) {
                                //this model delete all supplier from  cc_product_supplier where supplier id = post[supplier]
                                $this->product_model->delete_product_supplier($id);
                                foreach ($this->input->post('supplier_id') as $supplier) {
                                    $supplier_data[] = array(
                                        'supplier_id' => $supplier,
                                        'product_id' => $id
                                    );
                                }
                                if ($this->product_model->insert_product_supplier($supplier_data)) {
                                    redirect(base_url() . 'product/editProduct/'.$id.'/success');
                                } else {
                                    redirect(base_url() . 'product/editProduct/'.$id.'/failed');
                                }
                            }
                        } else {
                            redirect(base_url() . 'product/editProduct/'.$id.'/failed');
                        }
                    } else {
                        redirect(base_url() . 'product/editProduct/'.$id.'/failed');
                    }
                } else {
                    redirect(base_url() . 'product/editProduct/'.$id.'/failed');
                }
            }
        } else {
            show_404();
        }
    }
    //this method is for checking this product is exits or not
    public function check_code_edit($code){
        $id = $this->input->post('product_id');
        $data = $this->product_model->check_code_exits($code, $id);
        if($data){
            return TRUE;
        }else{
            $$code = $this->product_model->check_coode($code);
            if($$code){
                $this->form_validation->set_message('check_code_edit', 'This Product Code has already Exits!!!');
                return FALSE;
            }else{
                return TRUE;
            }
        }
    }

    public function get_product_color_data($product_id = '')
    {
        $get_data = $this->product_model->get_product_color_data($product_id);
        if($get_data)
        {
            echo $get_data;
        }
        else
            echo 'false';
    }
    
    public function repaired($start='',$end='') {
        $start = $this->input->get('start_date');
        $end = $this->input->get('end_date');
        $data['title'] = 'Product Repaired List ';
        $data['product'] = $this->product_model->get_product_repaired($start,$end);
        $this->load->view('header', $data);
        $this->load->view('menu');
        $this->load->view('sidemenu');
        $this->load->view('product_list_repaired', $data);
        $this->load->view('footer');
    }
    
    public function replaced($start='',$end='') {
        $start = $this->input->get('start_date');
        $end = $this->input->get('end_date');
        $data['title'] = 'Product Replaced List';
        $data['product'] = $this->product_model->get_product_replaced($start,$end);
        $this->load->view('header', $data);
        $this->load->view('menu');
        $this->load->view('sidemenu');
        $this->load->view('product_list_replaced', $data);
        $this->load->view('footer');
    }
    


}

?>
