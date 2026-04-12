<?php 
defined('BASEPATH') OR exit('No direct script access alowed'); 

class Product extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('CategoryModel');
    }
    public function index(){
         if($this->form_validation->run()){

         }
         else{
            $data['categories'] = $this->CategoryModel->all_category();
            $this->load->view('product', $data);
         }
    }
}

?>