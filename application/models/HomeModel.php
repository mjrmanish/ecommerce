<?php 
defined('BASEPATH') OR exit('No direct script allowed');

class HomeModel extends CI_Model{

    public function get_banner(){
        $q = $this->db->where('status', '1')->order_by('id', 'desc')->get('mjr_banner');
        if($q->num_rows()){
            return $q->result();
        }
        else{
            return false;
        }
    }

    public function get_category(){
        $q = $this->db->where('status', '1')->get('mjr_category');
        if($q->num_rows()){
            return $q->result();
        }
        else{
            return false;
        }
    }

    public function get_product(){
        $q = $this->db->where('status', '1')->get('mjr_product');
        if($q->num_rows()){
            return $q->result();
        }
        else{
            return false;
        }
    }

}
?>