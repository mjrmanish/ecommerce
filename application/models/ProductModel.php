<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class ProductModel extends CI_Model{
    public function add_product($post){
        if(!empty($post)){
            $q = $this->db->insert('mjr_product', $post);
            if($q){
                return true;
            }
            else{
                return false;
            }
        }
    }
}


?>