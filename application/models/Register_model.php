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


        // $this->db->select('email, nama');
        // $this->db->from('data_register');
        // $this->db->where('email', $email);
        // $this->db->where('nama', $nama);
        // $this->db->limit(1);
        // $query = $this->db->get();
        // print_r($query->num_rows());
        // if($query->num_rows() == 1) {
        //     return $query->result();
        // } else {
        //     return false;
        // }
    }

    public function saveDataRegister($data) {
        $this->db->insert('data_register', $data);
        $id_project = $this->db->insert_id();
        return $id_project;
    }

}

/* End of file Register_model.php */
/* Location: ./application/models/Register_model.php */
