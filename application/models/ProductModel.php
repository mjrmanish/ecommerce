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
}


?>