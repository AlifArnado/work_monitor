<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Performance_model extends CI_Model {

    public function detail_performance_task($kode_staf) {
        $this->db->select('*');
        $this->db->where('kode_staf', $kode_staf);
        $this->db->order_by('tanggal_task', 'desc');
        $query = $this->db->get('data_task');
        return $query->result();
    }

    public function detail_performance_task_click($kode_project, $kode_staf) {
        $this->db->select('*');
        $this->db->where('kode_staf', $kode_staf);
        $this->db->where('kode_staf', $kode_staf);
        $this->db->order_by('tanggal_task', 'desc');
        $query = $this->db->get('data_task');
        return $query->result();
    }

}

/* End of file Performance_model.php */
/* Location: ./application/models/staf/Performance_model.php */
