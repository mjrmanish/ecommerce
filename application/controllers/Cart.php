<?php
defined('BASEPATH') OR exit('No direct Script allowed');

class Cart extends CI_Controller{


    public function __construct(){
        parent:: __construct();
        $this->load->model('CartModel');
    }

    public function index(){
        $data['cart'] = $this->CartModel->get_cart();
        $data['price'] = $this->CartModel->total_price();
        $this->load->view('frontend/cart', $data);
    }

    public function add_to_cart(){
        $post = $this->input->post();
        $check = $this->CartModel->add_to_cart($post);
        if($check){
            $this->session->set_flashdata('succMsg', 'Product added to Cart');
            redirect('cart');
        }
        else{
            $this->session->set_flashdata('errMsg', 'Product already exist in Cart');
            redirect('cart');
        }
    }

    public function cart_update(){
        $post = $this->input->post();
        $check = $this->CartModel->cart_update($post);
        if($check){
            $this->session->set_flashdata('succMsg', 'Cart Update Successfully');
            redirect('cart');
        }
        else{
            $this->session->set_flashdata('errMsg', 'Cart Not Update! Please try again');
        }
    }

    public function remove_product($pro_id){
        $check = $this->CartModel->remove_product($pro_id);
        if($check){
            $this->session->set_flashdata('succMsg', 'Product Removed Successfully');
            redirect('cart');
        }
        else{
            $this->session->set_flashdata('errMsg', 'Failed to Remove Product! please try again');
            redirect('cart');
        }
    }
}


?>