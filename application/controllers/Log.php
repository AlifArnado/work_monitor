<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Log extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }

    public function index()
    {
        // laod model log
        $this->load->model('Log_model');
        $log_model = new Log_model();

        $data['log_task'] = $log_model->view_log_task();
        $data['log_project'] = $log_model->view_log_project();

       $this->load->view('log/log_view', $data);
    }

}

/* End of file Log.php */
/* Location: ./application/controllers/Log.php */
