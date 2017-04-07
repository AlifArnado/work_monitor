<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register_model extends CI_Model {

    public function cek_data_register($email, $nama) {
        $qry = $this->db->get_where('data_register',array('email'=> $email));
        if ($qry->num_rows() > 0) {
            return $qry->row();
        } else {
            return false;
        }
    }

    public function saveDataRegister($data) {
        $this->db->insert('data_register', $data);
        $id_project = $this->db->insert_id();
        return $id_project;
    }

    public function get_data_ae() {
        $this->db->select('*');
        $query = $this->db->get('data_register');
        return $query->result();
    }

}

/* End of file Register_model.php */
/* Location: ./application/models/Register_model.php */
