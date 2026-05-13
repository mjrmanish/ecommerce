<?php 
defined('BASEPATH') OR exit('No direct script allowed');

class Register extends CI_Controller{
    public function __construct(){
        parent:: __construct();
        $this->load->model('RegisterModel');
    }
    public function index(){
        $this->form_validation->set_rules('name', 'full name', 'required|trim|min_length[3]');
        $this->form_validation->set_rules('email', 'email', 'required|trim|valid_email|is_unique[mjr_users.email]', ['is_unique'=>'This email already exists']);
        $this->form_validation->set_rules('password', 'password', 'required|trim|min_length[6]');
        if($this->form_validation->run()){
            $post = $this->input->post();
            $check = $this->RegisterModel->register($post);
            if($check){
                $this->session->set_flashdata('succMsg','User Register Successfully. Please Login');
                redirect('Login');
            }
        }
        else{
            $this->load->view('frontend/register');
        }
    }
}

?>