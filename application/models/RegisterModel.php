<?php 
defined('BASEPATH') OR exit('No direct script allowed');

class RegisterModel extends CI_Model{
    public function register($post){
        $data['user_id'] = mt_rand(11111,99999);
        $data['username'] = $post['name'];
        $data['email'] = $post['email'];
        $data['password'] = password_hash($post['password'], PASSWORD_BCRYPT);
        $data['status'] = 1;
        $data['ip'] = $_SERVER['REMOTE_ADDR'];
        if($this->db->insert('mjr_users', $data)){
            return true;
        }
        else{
            return false;
        }
    }
}

?>