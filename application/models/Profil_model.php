<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil_model extends CI_Model {

    public function update_profile($kode_register ,$data) {
        $this->db->where('kode_register', $kode_register);
        $this->db->update('data_register', $data);
        $query = $this->db->get('data_register');
        return $query->row();
    }
}

/* End of file Profil_model.php */
/* Location: ./application/models/Profil_model.php */
