<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('SettingsModel');
    }
    public function pincode(){
        $this->form_validation->set_rules('pincode','pincode', 'required|trim|min_length[4]');
        $this->form_validation->set_rules('delivery_charge', 'delivery charge', 'required|trim');
        $this->form_validation->set_rules('status', 'status', 'required|trim');
        if($this->form_validation->run()){
            $post = $this->input->post();
            $check = $this->SettingsModel->add_pincode($post);
            if($check){
                $this->session->set_flashdata('successMsg', 'Pincode added successfully');
                redirect('settings/pincode');
            }
        }
        else{
            $this->load->view('pincode');
        }
    }
    public function banner(){
        if(empty($_FILES['bann_image']['name'])){
            $this->form_validation->set_rules('bann_image', 'banner image', 'required|trim');
        }
        $this->form_validation->set_rules('status', 'status', 'required|trim');
        if($this->form_validation->run()){
            $post = $this->input->post();
            $config['upload_path'] = './upload/banner/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $this->load->library('upload', $config);
            $this->upload->do_upload('bann_image');
            $post['bann_image'] = $this->upload->data('file_name');
            $check = $this->SettingsModel->add_banner($post);
            if($check){
                $this->session->set_flashdata('successMsg', 'Banner added successfully');
                redirect('settings/banner');
            }
        }
        else{
            $this->load->view('banner');
        }
    }
}



?>