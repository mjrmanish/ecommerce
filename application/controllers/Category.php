<?php 
defined('BASEPATH') OR exit('No direct script access alowed'); 

class Category extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('CategoryModel');
    }
    public function index(){
        $this->form_validation->set_rules('cate_name','category name', 'required|trim|min_length[4]');
        $this->form_validation->set_rules('status', 'status', 'required|trim');
        if($this->form_validation->run()){
            $post = $this->input->post();
            $check = $this->categoryModel->add_category($post);
            if($check){
                $this->session->set_flashdata('successMsg', 'Data inserted');
                redirect('category');
            }
        }
        else{
            $data['categories'] = $this->CategoryModel->all_category();
            $this->load->view('category',$data);
        }
    }
}

?>