<?php 
defined('BASEPATH') OR exit('No direct script access alowed'); 

class Product extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('CategoryModel');
        $this->load->model('ProductModel');
    }
    public function index(){
        $this->form_validation->set_rules('pro_id','Product ID', 'required|trim');
        $this->form_validation->set_rules('category','Category', 'required|trim');
        $this->form_validation->set_rules('pro_name','Product Name', 'required|trim');
        $this->form_validation->set_rules('brand','Brand', 'required|trim');
        $this->form_validation->set_rules('featured','Featured', 'required|trim');
        $this->form_validation->set_rules('highlights','Highlights', 'required|trim');
        $this->form_validation->set_rules('description','Description', 'required|trim');
        $this->form_validation->set_rules('stock','Stock', 'required|trim');
        $this->form_validation->set_rules('mrp','MRP', 'required|trim');
        $this->form_validation->set_rules('selling_price','Selling Price', 'required|trim');
        if(empty($_FILES['pro_main_image']['name'])){
            $this->form_validation->set_rules('pro_main_image','Product Image', 'required|trim');
        }
        $this->form_validation->set_rules('status', 'Status', 'required|trim');

         if($this->form_validation->run()){
            $post = $this->input->post();
            $config['upload_path'] = './upload/product/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $this->load->library('upload', $config);
            $this->upload->do_upload('pro_main_image');
            $data = $this->upload->data();
            $post['pro_main_image'] = $data['file_name'];
            $result = $this->ProductModel->add_product($post);
            if($result){
                if($this->session->userdata('pro_id') != ''){
                    $this->session->unset_userdata('pro_id');
                    // $this->session->sess_destroy();
                }
                $this->session->set_flashdata('successMsg', 'Product added successfully');
                redirect('Product');
            }
            else{
                $this->session->set_flashdata('errorMsg', 'Failed to add product');
                redirect('Product');
            }
         }
         else{
            $data['categories'] = $this->CategoryModel->all_category();
            $this->load->view('product', $data);
         }
    }
}

?>