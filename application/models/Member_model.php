<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member_model extends CI_Model {

    public function getMember() {
        $query_data_member = $this->db->get('data_member');
        return $query_data_member->result();
    }

}

/* End of file Member_model.php */
/* Location: ./application/models/Member_model.php */
