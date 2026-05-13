<?php 
defined('BASEPATH') OR exit('No direct script allowed');

class Checkout extends CI_Controller{
    public function __construct(){
        parent:: __construct();
        if(!empty($this->session->userdata('login_id'))){

        }
        else{
            redirect('login');
        }
    }

    public function index(){
        echo "hello this is chechout page";
    }
}

?>