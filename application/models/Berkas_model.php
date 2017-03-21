<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berkas_model extends CI_Model {

    public function save_berkas($data) {
        if($this->db->get('data_berkas', $data)) {
            return true;
        } else {
            return false;
        }
    }


}

/* End of file Berkas_model.php */
/* Location: ./application/models/Berkas_model.php */
