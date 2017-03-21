<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project_model extends CI_Model {

    public function saveCreateProject($data) {
        $this->db->insert('data_project', $data);
        $id_project = $this->db->insert_id();
        return $id_project;
    }

    public function list_data_project() {
        $query = $this->db->get('data_project');
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public function update_status_project($kode_project, $status_project) {
        $this->db->set('status_project', $status_project); //value that used to update column
        $this->db->where('kode_project', $kode_project); //which row want to upgrade
        $this->db->update('data_project');  //table name
        $query = $this->db->get('data_project');
        return $query->row();
    }

    public function project_status_active() {
        $this->db->select('*');
        $this->db->where('status_project', "ACTIVE");
        $query = $this->db->get('data_project');
        return $query->result();
    }

    public function project_view_by_id($kode_project) {
        $this->db->select('*');
        $this->db->where('kode_project', $kode_project);
        $query = $this->db->get('data_project');
        return $query->result();
    }

    public function berkas_original($kode_project) {
        $this->db->select('berkas_upload');
        $this->db->where('kode_project', $kode_project);
        $query = $this->db->get('data_project');
        return $query;
    }


}

/* End of file Project_model.php */
/* Location: ./application/models/Project_model.php */
