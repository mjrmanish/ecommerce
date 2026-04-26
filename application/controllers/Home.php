<?php 
defined('BASEPATH') OR exit('No direct script allowed');

class Home extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('HomeModel');
    }

public function index(){
    $data['banner'] = $this->HomeModel->get_banner();
    $data['category'] = $this->HomeModel->get_category();
    $data['product'] = $this->HomeModel->get_product();
    $this->load->view('frontend/index', $data);
}
}


?>