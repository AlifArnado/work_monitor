<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Task_model extends CI_Model {

    public function getTask() {
        $query = $this->db->get('data_task');
        return $query->result();
    }

    public function saveTask($data_task) {
        $this->db->insert('data_task', $data_task);
        $id_task = $this->db->insert_id();
        return $id_task;
    }

    // function edit status task pending dengan kode staf
    public function task_update_status_pending($kode_staf) {
        $this->db->set('status_task', "Pending"); //value that used to update column
        $this->db->where('kode_staf', $kode_staf); //which row want to upgrade
        $this->db->update('data_task');  //table name
        $query = $this->db->get('data_task');
        return $query->row();
    }

    public function task_update_status_proses_to_pending($kode_staf) {
        $this->db->set('status_task', "Pending"); //value that used to update column
        $this->db->where('kode_staf', $kode_staf); //which row want to upgrade
        $this->db->where('status_task', 'Proses');
        $this->db->update('data_task');  //table name
        $query = $this->db->get('data_task');
        return $query->row();
    }

    public function task_update_status_prses_kode_staf($kode_staf, $kode_task) {
        $this->db->set('status_task', 'Proses');
        $this->db->set('kode_staf', $kode_staf);
        $this->db->where('kode_task', $kode_task);
        $this->db->update('data_task');
        $query = $this->db->get('data_task');
        return $query->row();
    }

    public function task_sort_desc($kode_project) {
        $this->db->select('*');
        $this->db->where('kode_project', $kode_project);
        $this->db->order_by('kode_task', 'desc');
        $query = $this->db->get('data_task');
        return $query->result();
    }

    public function task_status_finish_sort_desc($kode_project) {
        $this->db->select('*');
        $this->db->where('kode_project', $kode_project);
        $this->db->where('status_task', "Finish");
        $this->db->order_by('kode_task', 'desc');
        $query = $this->db->get('data_task');
        return $query->result();
    }

    public function detail_task($kode_task) {
        $this->db->select('*');
        $this->db->where('kode_task', $kode_task);
        $query = $this->db->get('data_task');
        return $query->result();
    }



}

/* End of file Task_model.php */
/* Location: ./application/models/Task_model.php */
