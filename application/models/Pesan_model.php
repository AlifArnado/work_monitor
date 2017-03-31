<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesan_model extends CI_Model {

    public function simpan_pesan($data) {
        $this->db->insert('data_pesan', $data);
        $id_pesan = $this->db->insert_id();
        return $id_pesan;
    }

    public function simpan_pesan_id_tersedia($kode_pesan, $kode_task , $data_pesan) {
        $this->db->insert('data_pesan', $data_pesan);
        $this->db->where('Field / comparison', $Value);

    }

    public function view_data_pesan($kode_pesan, $kode_task) {
        $this->db->select('*');
        $this->db->where('kode_pesan', $kode_pesan);
        $this->db->where('kode_task', $kode_task);
        $query = $this->db->get('data_pesan');
        return $query->result();
    }

}

/* End of file Pesan_model.php */
/* Location: ./application/models/Pesan_model.php */
