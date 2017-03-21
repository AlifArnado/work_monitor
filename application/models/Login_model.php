<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

    public function cekLogin($email, $password) {
        $this->db->select('*');
        $this->db->where('email', $email);
        $this->db->where('password', md5($password));
        $this->db->limit(1);
        $query = $this->db->get('data_register');
        return $query->row();
    }

}

/* End of file Login_model.php */
/* Location: ./application/models/Login_model.php */
