<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Log_model extends CI_Model {

    public function insert_log_project($data) {
        $this->db->insert('data_log_project', $data);
        $query = $this->db->insert_id();
        return $query;
    }

    public function insert_log_task($data) {
        $this->db->insert('data_log_task', $data);
        $query = $this->db->insert_id();
        return $query;
    }

    public function update_start_task($kode_task, $data) {
        $this->db->set('start_time', $data);
        $this->db->set('status_log_task', "PROSES");
        $this->db->where('kode_task', $kode_task);
        $this->db->update('data_log_task');
        $query = $this->db->get('data_log_task');
        return $query->row();
    }

    public function update_finish_taks($kode_task, $data) {
        $this->db->set('end_time', $data);
        $this->db->set('status_log_task', "FINISH");
        $this->db->where('kode_task', $kode_task);
        $this->db->update('data_log_task');
        $query = $this->db->get('data_log_task');
        return $query->row();
    }

    public function view_log_task() {
        $query = $this->db->get('data_log_task');
        return $query->result();
    }

    public function view_log_project() {
        $query = $this->db->get('data_log_project');
        return $query->result();
    }

    public function update_transfer_proses($kode_task, $kode_project, $kode_staf_received, $start_time_transfer, $status) {
        $this->db->set('kode_staf_transfer', $kode_staf_received);
        $this->db->set('start_time_transfer', $start_time_transfer);
        $this->db->set('status_transfer', $status);
        $this->db->where('kode_task', $kode_task);
        $this->db->where('kode_project', $kode_project);
        $this->db->update('data_log_task');
        $query = $this->db->get('data_log_task');
        return $query->result();
    }

    public function update_transfer_confirm($kode_task, $kode_project, $kode_staf_received, $kode_staf, $end_time_transfer, $status) {
        $this->db->set('kode_staf_transfer', $kode_staf);
        $this->db->set('end_time_transfer', $end_time_transfer);
        $this->db->set('kode_staf', $kode_staf_received);
        $this->db->set('start_time', $end_time_transfer);
        $this->db->set('status_transfer', $status);
        $this->db->where('kode_task', $kode_task);
        $this->db->where('kode_project', $kode_project);
        $this->db->update('data_log_task');
        $query = $this->db->get('data_log_task');
        return $query->result();
    }

    public function update_transfer_confirm_no($kode_task, $kode_project, $kode_staf_received, $kode_staf, $end_time_transfer, $status) {
        $this->db->set('kode_staf_transfer', $kode_staf_received);
        $this->db->set('end_time_transfer', $end_time_transfer);
        $this->db->set('kode_staf', $kode_staf);
        $this->db->set('status_transfer', $status);
        $this->db->where('kode_task', $kode_task);
        $this->db->where('kode_project', $kode_project);
        $this->db->update('data_log_task');
        $query = $this->db->get('data_log_task');
        return $query->result();
    }




}

/* End of file Log_model.php */
/* Location: ./application/models/Log_model.php */
