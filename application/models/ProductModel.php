<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class ProductModel extends CI_Model{
    public function add_product($post){
        if(!empty($post)){
            $product_name = $post['pro_name'];
            $post['slug'] =  $this->slug($product_name);
            $q = $this->db->insert('mjr_product', $post);
            if($q){
                return true;
            }
            else{
                return false;
            }
        }
    }

    private function slug($string){
        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9]+/', '-', $string)));
        return $slug;
    }

    public function fetch_cate($slug){
        $q = $this->db->where('slug', $slug)->get('mjr_category');
        if($q->num_rows()){
            return $q->row()->cate_id;
        }
    }

    public function fetch_product($cate_id){
        $this->db->where(['status'=>1]);
        $this->db->like(['category'=>$cate_id]);
        $this->db->or_like(['sub_category'=>$cate_id]);
        $q = $this->db->get('mjr_product');
        if($q->num_rows()){
            return $q->result();
        }
        else{
            
            return "no product found";
        }
    }
}


?>