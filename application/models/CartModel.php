<?php 
defined('BASEPATH') OR exit('No direct script allowed');

class CartModel extends CI_Model{
    public function get_userid(){
        return $this->session->userdata('user_id');
    }

    public function get_cart(){
        $q = $this->db->where('user_id', $this->get_userid())->get('mjr_cart');
        if($q->num_rows()){
            $result = $q->result();
            return $result;
        }
        else{
            return false;
        }
    }

    public function add_to_cart($post){
        $user_id = $this->get_userid();
        $exist = $this->db->where(['pro_id'=>$post['pro_id'], 'user_id'=>$user_id])->get('mjr_cart');
        if($exist->row()){
            echo "Product Already Exist in Cart";
        }
        else{
            $q = $this->db->select('pro_name, selling_price, slug, pro_main_image')->where('pro_id', $post['pro_id'])->get('mjr_product');
            if($q->num_rows()){
                $pro_details = $q->row();
                $data['user_id'] = $user_id;
                $data['cart_id'] = mt_rand(11111,99999);
                $data['pro_id'] = $post['pro_id'];
                $data['pro_name'] = $pro_details->pro_name;
                $data['pro_qty'] = $post['pro_qty'];
                $data['pro_price'] = $pro_details->selling_price;
                $data['slug'] = $pro_details->slug;
                $data['pro_image'] = $pro_details->pro_main_image;
                $this->db->insert('mjr_cart', $data);
                return true;
            }
            else{
                return false;
            }
        }
    }

    public function cart_update($post){
        $count = count($post['pro_id']);
        for($i=0; $i<$count; $i++){
            $this->db->where(['user_id'=>$this->get_userid(), 'pro_id'=>$post['pro_id'][$i]])->update('mjr_cart', ['pro_qty'=>$post['up_qty'][$i]]);
        }
        return true;
    }

    public function remove_product($pro_id){
        $q = $this->db->where(['user_id'=>$this->get_userid(), 'pro_id'=>$pro_id])->delete('mjr_cart');
        if($q){
            return true;
        }
        else{
            return false;
        }
    }

    public function total_price(){
        $q = $this->db->select('sum(pro_price) as total_price')->where(['user_id'=>$this->get_userid()])->get('mjr_cart');
        if($q->num_rows()){
            $total = $q->row()->total_price;
            if($total > 499){
                return array('subtotal'=>$total, 'total'=>$total, 'delivery'=>0);
            }
            else{
                return array('subtotal'=>$total, 'total'=>$total+50, 'delivery'=>50);
            }
        }
        else{
            return false;
        }
    }
}

?>