<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class CategoryModel extends CI_Model{
    public function add_category($post){
        $post['added_on'] = date('d M, Y');
        $post['cate_id'] = mt_rand(11111, 99999);
        $q = $this->db->insert('mjr_category', $post);
        if($q){
            return true;
        }
        else{
            return false;
        }
    }

    public function all_category(){
        $q = $this->db->where(['status'=>1, 'parent_id'=>''])->get('mjr_category');
        if($q->num_rows()){
            return $q->result();
        }
    }
    public function get_sub_cate($cate_id){
        $q = $this->db->where(['status'=>1, 'parent_id'=>$cate_id])->get('mjr_category');
        if($q->num_rows()){
            $output = '';
             foreach($q->result() as $val){
                $output.= '<option value="'.$val->cate_id.'" >'.$val->cate_name.'</option>';
             }
             echo $output;
        }
    }
}

?>