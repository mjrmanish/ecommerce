<?php 
defined('BASEPATH') OR exit('No direct script allowed');

class Login extends CI_Controller{

    public function index(){
        $this->load->view('frontend/login');
    }
}
?>