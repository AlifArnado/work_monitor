<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Workload_model extends CI_Model {

    public function get_DataStaf() {
        $query = $this->db->get('data_staf');
        //$data = $query->result_array();
        // echo json_encode($data);
        //$id_staf = $data['2']['id_staf'];
        //echo $id_staf;
        return $query->result();
    }

    public function getViewLoad() {
        $query = $this->db->get('data_staf');
        return $query->result();
    }

}

/* End of file Workload_model.php */
/* Location: ./application/models/Workload_model.php */
