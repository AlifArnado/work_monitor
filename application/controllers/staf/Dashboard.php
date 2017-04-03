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
        $data['data_task_transfer'] = $staf_model->view_project_transfer_watting($kode_staf);
        $this->load->view('staf/home_staf_view', $data);
    }

    public function performance_staf() {
       // load model performance
       $this->load->model('staf/Performance_model');
       $performance_model = new Performance_model();

        $kode_staf = $this->session->userdata('kode_staf');
        $data['performance_staf'] = $performance_model->detail_performance_task($kode_staf);
        $this->load->view('staf/performance_staf_view', $data);
    }

    public function detail_performance_task($kode_project, $kode_staf) {
       // load model performance
       $this->load->model('staf/Performance_model');
       $performance_model = new Performance_model();

        $kode_staf = $this->session->userdata('kode_staf');
        $data['performance_task_staf'] = $performance_model->detail_performance_task_click($kode_project, $kode_staf);
        $this->load->view('staf/detail_performance_staf_view', $data);
    }

    public function detail_project($kode_project, $kode_staf, $kode_task) {
        // load project model
        $this->load->model('Project_model');
        $project_model = new Project_model();

        // load task model
        $this->load->model('Task_model');
        $task_model = new Task_model();

        $data['data_project'] = $project_model->project_view_by_id($kode_project);
        $data['data_task_order'] = $task_model->task_sort_desc($kode_project, $kode_staf);
        $data['data_task_transfer'] = $task_model->task_status_transfer_sort_desc($kode_project, $kode_staf);
        $data['data_task'] = $task_model->task_status_finish_sort_desc($kode_project, $kode_staf);
        $this->load->view('staf/task_list_staf_view', $data);
    }

    public function detail_project_transfer($kode_project, $kode_staf, $kode_task, $kode_staf_transfer) {
        // load project model
        $this->load->model('Project_model');
        $project_model = new Project_model();

        // load task model
        $this->load->model('Task_model');
        $task_model = new Task_model();

        $data['data_project'] = $project_model->project_view_by_id($kode_project);
        $data['data_task_order'] = $task_model->task_sort_desc($kode_project, $kode_staf);
        $data['data_task_transfer'] = $task_model->task_status_transfer_sort_desc($kode_project, $kode_staf_transfer);
        $data['data_task'] = $task_model->task_status_finish_sort_desc($kode_project, $kode_staf);
        $this->load->view('staf/task_list_staf_transfer_view', $data);
    }

    public function detail_task($kode_task, $kode_project) {
        // load model task
        $this->load->model('Task_model');
        $task_model = new Task_model();

        $data['data_task'] = $task_model->detail_task($kode_task);
        $data['kode_project'] = $kode_project;

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

    public function get_work($kode_task, $kode_staf, $kode_project, $handle) {

        // load model data task
        $this->load->model('staf/Staf_model');
        $staf_model = new Staf_model();

        // load model data log
        $this->load->model('Log_model');
        $log_model = new Log_model();

        $kode_task = $kode_task;
        $handle_status = $handle;

        if ($handle === "work") {
            // echo "Kerjakan Brief";
            // echo $kode_task;
            $staf_model->update_task_start_watting($kode_task);

            // tanggal start project
            $now2 = date('Y-m-d H:i:s');
            $log_model->update_start_task($kode_task, $now2);

            redirect(base_url('index.php/staf/dashboard'),'refresh');

        } if ($handle == "waitting") {
            // echo "Proses Selesai di kerjakan";
            // echo $kode_task;
            $now2 = date('Y-m-d H:i:s');
            $log_model->update_finish_taks($kode_task, $now2);

            $staf_model->update_task_watting_to_finish($kode_task);
            $query = $this->db->query("SELECT * FROM data_task WHERE (status_task = 'Start' OR status_task = 'Proses' OR status_task = 'Pending' OR status_task = 'Waiting Request') AND kode_staf = '$kode_staf'");
            $valid = $query->num_rows();

            if ($valid > 0) {
                redirect(base_url('index.php/staf/dashboard'),'refresh');
            } else {
                $staf_model->staf_update_status_free($kode_staf);
                redirect(base_url('index.php/staf/dashboard'),'refresh');
            }
        }
    }

    // function for transfer
    public function pilih_transfer($kode_project, $kode_staf, $kode_task) {

        $this->load->model('staf/Staf_model');
        $staf_model = new Staf_model();

        $this->data['kode_staf_transfer_task'] = $kode_staf;
        $this->data['kode_task'] = $kode_task;
        $this->data['kode_project'] = $kode_project;
        $this->data['data_staf'] = $staf_model->get_data_staf();
        $this->load->view('staf/pilih_handle_staf_view', $this->data);
    }

    // function untuk accept data transfer
    public function transfer_processing() {

        // load module
        $this->load->model('staf/Staf_model');
        $staf_model = new Staf_model();

        // load model log
        $this->load->model('Log_model');
        $log_model = new Log_model();

        $now2 = date('Y-m-d H:i:s');

        // echo "<pre>";
        // print_r($this->input->post());
        $kode_project = $this->input->post('kode_project');
        $kode_task = $this->input->post('kode_task');
        $kode_staf_transfer_task = $this->input->post('kode_staf_transfer_task');
        $kode_staf = $this->input->post('kode_staf');
        $status = $this->input->post('status');

        $tb_data_transfer = $this->db->query("SELECT * FROM data_transfer");
        // create primary berkas task
        $num_kode_transfer = $tb_data_transfer->num_rows() + 1;
        $kode_transfer_task = "KODTRANSFER00".$num_kode_transfer;

        $tb_data_task = $this->db->query("SELECT * FROM data_task WHERE kode_project = '$kode_project' AND kode_task = '$kode_task' AND kode_staf = '$kode_staf_transfer_task'");
        $data_task = $tb_data_task->row();
        print_r($data_task->kode_task);

        $staf_model->update_task_transfer_waitting_request($kode_project, $kode_task, $kode_staf);
        $tanggal_transfer = date('Y-m-d');
        $jam_transfer = date('H:i:s');

        // insert tabel data task
        $data_transfer = array(
                'kode_transfer' => $kode_transfer_task,
                'kode_project' => $kode_project,
                'kode_task' => $kode_task,
                'kode_staf_transfer' => $kode_staf_transfer_task,
                'kode_staf_received' => $kode_staf,
                'judul_task' => $data_task->judul_task,
                'task_request' => $data_task->task_request,
                'tanggal_transfer' => $tanggal_transfer,
                'jam_transfer' => $jam_transfer,
                'status_transfer' => 'WAITTING'
            );

        if ($status == 'Free') {

            // input data transfer
            $staf_model->insert_data_transfer($data_transfer);
            // ubah status task menjadi watting transfer
            $staf_model->update_start_tranfer_waitting_transfer($kode_project, $kode_task, $kode_staf_transfer_task);

            $log_model->update_transfer_proses($kode_task, $kode_project, $kode_staf, $now2, "WAITTING TRANSFER");
            redirect(base_url('index.php/staf/dashboard'),'refresh');
        } else {
            // input data transfer
            $staf_model->insert_data_transfer($data_transfer);
            // ubah status task menjadi watting transfer
            $staf_model->update_start_tranfer_waitting_transfer($kode_project, $kode_task, $kode_staf_transfer_task);
            $log_model->update_transfer_proses($kode_task, $kode_project, $kode_staf, $now2, "WAITTING TRANSFER");
            redirect(base_url('index.php/staf/dashboard'),'refresh');
        }
    }

    public function confirm_transfer($kode_transfer, $kode_project, $kode_staf, $kode_task, $answer, $kode_staf_transfer) {

        // load module
        $this->load->model('staf/Staf_model');
        $staf_model = new Staf_model();

        // load module log
        $this->load->model('Log_model');
        $log_model = new Log_model();

         $now2 = date('Y-m-d H:i:s');

        if ($answer == "yes") {
            echo "Yes";
            // update id staf yang menerima task , (kode_task, $kode_priject) dan status proses
            $staf_model->update_data_task_baru_transfer($kode_task, $kode_project, $kode_staf, $kode_staf_transfer);
            // status tranfer menjadi yes
            $staf_model->update_status_transfer($kode_transfer, $kode_project, $kode_task, $kode_staf, "YA");
            // update status pegawai full
            $staf_model->staf_update_status_full($kode_staf);
            $log_model->update_transfer_confirm($kode_task, $kode_project, $kode_staf, $kode_staf_transfer, $now2, "TRANSFER OKE");

            redirect(base_url('index.php/staf/dashboard'),'refresh');
        } if ($answer  == "no") {
            echo "No";
            $staf_model->update_data_ditolak_taks_back_start($kode_task, $kode_project, $kode_staf, $kode_staf_transfer);
            // status tranfer di tolak menjadi TIDAK
            $staf_model->update_status_transfer($kode_transfer, $kode_project, $kode_task, $kode_staf, "TIDAK");
            // status task transfer kembali menjadi start
            $log_model->update_transfer_confirm_no($kode_task, $kode_project, $kode_staf, $kode_staf_transfer, $now2, "TRANSFER NO");
            redirect(base_url('index.php/staf/dashboard'),'refresh');
        }
    }

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/dasboad_staf/Dashboard.php */
