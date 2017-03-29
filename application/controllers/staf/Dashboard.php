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

    public function detail_project($kode_project) {
        // load project model
        $this->load->model('Project_model');
        $project_model = new Project_model();

        // load task model
        $this->load->model('Task_model');
        $task_model = new Task_model();

        $data['data_project'] = $project_model->project_view_by_id($kode_project);
        $data['data_task_order'] = $task_model->task_sort_desc($kode_project);
        $data['data_task'] = $task_model->task_status_finish_sort_desc($kode_project);
        $this->load->view('staf/task_list_staf_view', $data);
    }

    public function detail_task($kode_task) {
        // load model task
        $this->load->model('Task_model');
        $task_model = new Task_model();

        $data['data_task'] = $task_model->detail_task($kode_task);

        $this->load->view('staf/detail_task_staf_view', $data);
    }

    public function brief_staf($kode_project) {
        // load project model
        $this->load->model('Project_model');
        $project_model = new Project_model();

        // load berkas task model
        $this->load->model('BerkasTask_model');
        $berkas_task_model = new BerkasTask_model();

        $data['data_project'] = $project_model->project_view_by_id($kode_project);
        $data['berkas_task'] = $berkas_task_model->task_berkas_get_id($kode_project);
        $this->load->view('staf/brief_staf_view', $data);
    }

    public function get_work($kode_task, $handle) {

        // load model data task
        $this->load->model('staf/Staf_model');
        $staf_model = new Staf_model();

        $kode_task = $kode_task;
        $handle_status = $handle;

        if ($handle === "work") {
            // echo "Kerjakan Brief";
            // echo $kode_task;
            $staf_model->update_task_start_watting($kode_task);
            redirect(base_url('index.php/staf/dashboard'),'refresh');

        } if ($handle == "waitting") {
            // echo "Proses Selesai di kerjakan";
            // echo $kode_task;
            $staf_model->update_task_watting_to_finish($kode_task);
            redirect(base_url('index.php/staf/dashboard'),'refresh');
        }
    }


}

/* End of file Dashboard.php */
/* Location: ./application/controllers/dasboad_staf/Dashboard.php */
