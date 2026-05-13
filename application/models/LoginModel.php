<?php 
defined('BASEPATH') OR exit('No direct script allowed');

class LoginModel extends CI_Model{


    public function loginAuth($post){
        $email = $post['email'];
        $pass = $post['password'];
        $q = $this->db->where(['email'=>$email, 'status'=>1])->get('mjr_users');
        if($q->num_rows()){
            $arr = $q->row();
            $db_pass = $arr->password;
            $userid = $arr->user_id;
            $username = $arr->username;
            if(password_verify($pass, $db_pass)){
                $this->session->set_userdata('login_id', $userid);
                $this->session->set_userdata('username', $username);
                $this->db->where('user_id', $this->session->userdata('user_id'))->update('mjr_cart', ['user_id'=>$userid]);
                return true;
            }
            else{
                return false;
            }
        }
        else{
            return false;
        }

        // $this->db->insert('mjr_users', $data);
    }
}

?>