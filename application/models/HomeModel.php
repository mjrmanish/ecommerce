<?php 
defined('BASEPATH') OR exit('No direct script allowed');

class HomeModel extends CI_Model{

    public function get_row_details($condition = array(), $table){
        $q = $this->db->where($condition)->get($table);
        if($q->num_rows()){
            return $q->row();
        }
        else{
            return false;
        }
    }

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
        $q = $this->db->where('status', '1')->order_by('id', 'asc')->get('mjr_category');
        if($q->num_rows()){
            return $q->result();
        }
        else{
            return false;
        }
    }

    public function get_product(){
        $q = $this->db->where('status', '1')->order_by('id', 'asc')->get('mjr_product');
        if($q->num_rows()){
            return $q->result();
        }
        else{
            return false;
        }
    }

    public function get_category_name($cate_id){
        $category_name = $this->db->where(array('cate_id'=>$cate_id, 'status'=>'1'))->order_by('id', 'asc')->get('mjr_category');
        if($category_name->num_rows()){
            return $category_name->row();
        }
        else{
            return false;
        }
    }


}
?>