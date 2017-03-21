<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staf_model extends CI_Model {

    // public function update_status_staf($kode_staf) {
    //     $this->db->where('id_staf', $kode_staf);
    //     $query = $this->db->get('data_staf');
    //     return $query->row();
    // }

    public function staf_update_status_full($kode_staf) {
        $this->db->set('status_staf', 'Full'); //value that used to update column
        $this->db->where('id_staf', $kode_staf); //which row want to upgrade
        $this->db->update('data_staf');  //table name
        $query = $this->db->get('data_staf');
        return $query->row();
    }


}

/* End of file Staf_model.php */
/* Location: ./application/models/Staf_model.php */
