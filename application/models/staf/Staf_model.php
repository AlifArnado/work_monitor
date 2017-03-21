<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staf_model extends CI_Model {

    public function staf_my_project($kode_staf) {
        $this->db->select('*');
        $this->db->where('kode_staf', $kode_staf);
        $query = $this->db->get('data_task');
        return $query->result();
    }

    public function myproject() {
        $this->db->select('*');
        $query = $this->db->get('data_task');
        return $query->result();
    }

}

/* End of file Staf_model.php */
/* Location: ./application/models/staf/Staf_model.php */
