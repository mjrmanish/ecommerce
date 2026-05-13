<?php 
defined('BASEPATH') OR exit('No direct script allowed');

class Login extends CI_Controller{
    public function __construct(){
        parent:: __construct();
        if(!empty($this->session->userdata('login_id'))){
            redirect('Checkout');
        }
        $this->load->model('LoginModel');
    }

    public function index(){
        $this->form_validation->set_rules('email', 'email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'password', 'required|trim|min_length[6]');
        if($this->form_validation->run()){
            $post = $this->input->post();
            $check = $this->LoginModel->loginAuth($post);
            if($check){
                redirect('Checkout');
            }
            else{
                $this->session->set_flashdata('errMsg', 'Wrong Credential Email and Password');
                redirect('Login');
            }
        }
        else{
            $this->load->view('frontend/login');
        }
    }
}
?>