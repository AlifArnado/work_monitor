<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staf_model extends CI_Model {

    public function staf_my_project($kode_staf) {
        // $this->db->where('status_task', 'Start');
        // $this->db->where('status_task', 'Proses');
        $query = $this->db->query("SELECT * FROM data_task WHERE (status_task = 'Start' OR status_task = 'Proses' OR status_task = 'Pending' OR status_task = 'Waiting Request') AND kode_staf = '$kode_staf' ORDER BY kode_task DESC");
        return $query->result();
    }

    public function select_project_transfer($kode_staf) {
        $this->db->select('*');
        $this->db->where('status_task', 'Transfer');
        $this->db->where('kode_staf', $kode_staf);
        $query = $this->db->get('data_task');
        return $query->result();
    }

    public function view_project_transfer_watting($kode_staf) {
        $query = $this->db->query("SELECT * FROM data_transfer WHERE status_transfer = 'WAITTING' AND kode_staf_received = '$kode_staf'");
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

    public function get_data_staf() {
        $this->db->select('*');
        //$this->db->where('status_staf', 'Free');
        $query = $this->db->get('data_staf');
        return $query->result();
    }

    public function update_task_transfer_waitting_request($kode_project, $kode_task, $kode_staf) {
        $this->db->set('status_task', 'Waiting Request');
        $this->db->where('kode_project', $kode_project);
        $this->db->where('kode_task', $kode_task);
        $this->db->where('kode_staf', $kode_staf);
        $this->db->update('data_task');
        $query = $this->db->get('data_task');
        return $query->result();
    }

    public function staf_update_status_full($kode_staf) {
        $this->db->set('status_staf', 'Full'); //value that used to update column
        $this->db->where('id_staf', $kode_staf); //which row want to upgrade
        $this->db->update('data_staf');  //table name
        $query = $this->db->get('data_staf');
        return $query->row();
    }

    public function insert_data_transfer($data) {
         $this->db->insert('data_transfer', $data);
        $id_project = $this->db->insert_id();
        return $id_project;
    }

    public function update_start_tranfer_waitting_transfer($kode_project, $kode_task, $kode_staf) {
        $query = $this->db->query("UPDATE data_task SET status_task = 'Waiting Request' WHERE kode_task = '$kode_task' AND kode_project = '$kode_project' AND kode_staf = '$kode_staf'");
       return $query;
    }

    public function update_data_task_baru_transfer($kode_task, $kode_project, $kode_staf, $kode_staf_transfer) {
        $this->db->query("UPDATE data_task SET kode_staf = '$kode_staf', status_task = 'Proses' WHERE kode_task = '$kode_task' AND kode_project = '$kode_project' AND kode_staf = '$kode_staf_transfer'");
        $query = $this->db->get('data_task');
        return $query->row();
    }

    public function update_status_transfer($kode_transfer, $kode_project, $kode_task, $kode_staf, $status) {
        $this->db->set('status_transfer', $status);
        $this->db->where('kode_transfer', $kode_transfer);
        $this->db->where('kode_project', $kode_project);
        $this->db->where('kode_task', $kode_task);
        $this->db->where('kode_staf_received', $kode_staf);
        $this->db->update('data_transfer');
        $query = $this->db->get('data_transfer');
        return $query->result();
    }

    public function update_data_ditolak_taks_back_start($kode_task, $kode_project, $kode_staf, $kode_staf_transfer) {
        $this->db->query("UPDATE data_task SET status_task = 'Start' WHERE kode_task = '$kode_task' AND kode_project = '$kode_project' AND kode_staf = '$kode_staf_transfer'");
        $query = $this->db->get('data_task');
        return $query->row();

    }

    public function staf_update_status_free($kode_staf) {
        $this->db->set('status_staf', 'Free');
        $this->db->where('id_staf', $kode_staf);
        $this->db->update('data_staf');
        $query = $this->db->get('data_staf');
        return $query->row();
    }

}

/* End of file Staf_model.php */
/* Location: ./application/models/staf/Staf_model.php */
