<?php 
defined('BASEPATH') OR exit('No direct script allowed');

class Home extends CI_Controller{
    public function __construct(){
        parent::__construct();
        if(empty($this->session->userdata('login_id'))){
            if(empty($this->session->userdata('user_id'))){
                $this->session->set_userdata('user_id', mt_rand(11111,99999));
            }
        }

        $this->load->model('HomeModel');
    }

    public function index(){
        $data['banner'] = $this->HomeModel->get_banner();
        $data['category'] = $this->HomeModel->get_category();
        $data['product'] = $this->HomeModel->get_product();
        $data['get_cate'] = $this->HomeModel->get_category_nav();
        $this->load->view('frontend/index', $data);
    }

    public function product_details($slug){
        $table = "mjr_product";
        $product_details['product'] = $this->HomeModel->get_row_details(array('slug'=>$slug, 'status'=>'1'), $table);
        $this->load->view('frontend/product-details', $product_details);
    }
}


?>