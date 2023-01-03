<?php 
    class LoginModel extends CI_Model {
        public function checkLogin($email,$password) {
            $query = $this->db->where('emai',$email)->where('password',$password)->get('dangnhap');
            return $query->result();
        }
    }
?>