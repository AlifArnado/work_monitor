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

    // update waitting untuk proses staf
    public function update_task_start_watting($kode_task) {
        $this->db->set('status_task', 'Proses'); //value that used to update column
        $this->db->where('kode_task', $kode_task); //which row want to upgrade
        $this->db->update('data_task');  //table name
        $query = $this->db->get('data_task');
        return $query->row();
    }

    // update proses to finish
    public function update_task_watting_to_finish($kode_task) {
        $this->db->set('status_task', 'Finish'); //value that used to update column
        $this->db->where('kode_task', $kode_task); //which row want to upgrade
        $this->db->update('data_task');  //table name
        $query = $this->db->get('data_task');
        return $query->row();
    }

}

/* End of file Staf_model.php */
/* Location: ./application/models/staf/Staf_model.php */
