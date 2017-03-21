<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        if($this->session->userdata('logged_in') !== TRUE) {
            redirect('login','refresh');
        }
    }

    public function index()
    {
        $this->load->model('staf/Staf_model');
        $staf_model = new Staf_model();

        $kode_staf = $this->session->userdata('kode_staf');

        $data['data_task'] = $staf_model->staf_my_project($kode_staf);
        $this->load->view('staf/home_staf_view', $data);
    }

    public function performance_staf() {
        $this->load->view('staf/performance_staf_view');
    }


}

/* End of file Dashboard.php */
/* Location: ./application/controllers/dasboad_staf/Dashboard.php */
