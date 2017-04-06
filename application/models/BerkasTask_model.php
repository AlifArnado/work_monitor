<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BerkasTask_model extends CI_Model {

    public function task_berkas_get_id($kode_project) {
        $this->db->where('kode_project', $kode_project);
        $this->db->order_by('kode_task', 'desc');
        $query = $this->db->get('data_berkas_task');
        return $query->result();
    }

    public function task_insert_data($data) {
        $this->db->insert('data_berkas_task', $data);
        $id_insert = $this->db->insert_id();
        return $id_insert;
    }

    public function update_task_berkas($kode_berkas_task, $kode_task) {
        $this->db->set('kode_task', $kode_task);
        $this->db->where('kode_berkas_task', $kode_berkas_task);
        $this->db->update('data_berkas_task');
        $query = $this->db->get('data_berkas_task');
        $return = $query->row();
    }

}

/* End of file BerkasTask_model.php */
/* Location: ./application/models/BerkasTask_model.php */
