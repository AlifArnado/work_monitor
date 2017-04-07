<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manual extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Workload_model');
    }

    public function index()
    {
        $this->load->model('Register_model');
        $register_model = new Register_model();
        $data['data_register'] = $register_model->get_data_ae();
        $this->load->view('manualproject/create_project_view', $data);
    }

    public function submit_create_project() {

        // load model berkas_task
        $this->load->model('BerkasTask_model');
        $berkas_task_model = new BerkasTask_model();

        $this->load->model('Project_model');
        $project_model = new Project_model();

        // load model project
        $this->load->model('Log_model');
        $log_model = new Log_model();

        $aa = $this->db->query("SELECT * FROM data_project");

        // create code_project
        $num_kode = $aa->num_rows() + 1;
        $kode_project = "KODPROJ00".$num_kode;

        $bb = $this->db->query("SELECT * FROM data_berkas_task");
        // create primary berkas task
        $num_kode_berkas_task = $bb->num_rows() + 1;
        $kode_berkas_task = "KODBER00".$num_kode_berkas_task;

        // create log id project
        $dd = $this->db->query("SELECT * FROM data_log_project");
        $num_log_project = $dd->num_rows() + 1;
        $kode_log_project = "KOD-LOG-PROJ00".$num_log_project;

        $ae_name        = $this->input->post('ae_name');
        $project_title  = $this->input->post('project_title');
        $keterangan     = $this->input->post('keterangan');
        $deadline       = $this->input->post('deadline');
        $project_type   = $this->input->post('project_type');
        $project_load   = $this->input->post('project_load');

        // print_r($this->input->post());
        // print_r($_FILES);

        $file_name = str_replace(' ','_',$_FILES['images']['name']);
        echo $file_name;

        $config['upload_path'] = './assets/uploads/';
        $config['allowed_types'] = '*';
        // $config['max_size'] = 3000;
        // $config['max_width'] = 2024;
        // $config['max_height'] = 2024;
        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('images')){
            $error = array('error' => $this->upload->display_errors());
            // print_r($error);
        }
        else{
            $data = array('upload_data' => $this->upload->data());
            // echo "<pre>";
            // print_r($data['upload_data']['file_name']);
            // echo "</pre>";
            $name_file = $data['upload_data']['file_name'];
            echo "success";
        }
        $now = date('Y-m-d');
        $now2 = date('Y-m-d H:i:s');

        $data = array(
            'kode_project' => $kode_project,
            'project_name' => $project_title,
            'project_desc' => $keterangan,
            'ae_name' => $ae_name,
            'deadline_project' => $deadline,
            'berkas_upload' => './assets/uploads/'.$name_file,
            'status_project' => 'ACTIVE',
            'project_type' => $project_type,
            'project_load' => $project_load,
            'tanggal_project' => $now
        );
        // print_r($data);

        $data_berkas_task = array(
            'kode_berkas_task' => $kode_berkas_task,
            'kode_task' => 'null',
            'kode_project' => $kode_project,
            'name_file' => $file_name,
            'tgl_upload_task' => $now2
            );
        // echo "<pre>";
        //print_r($data_berkas_task);

        // rekam log
        $data_log = array(
            'kode_log_project' => $kode_log_project,
            'kode_project' => $kode_project,
            'nama_project' => $project_title,
            'ae_name' => $ae_name,
            'status_project' => 'ACTIVE',
            'tanggal_project' => $now2
        );
        //print_r($data_log);
        $log_model->insert_log_project($data_log);

        $berkas_task_model->task_insert_data($data_berkas_task);
        $project_model->saveCreateProject($data);
        redirect(base_url().'index.php/welcome/pilih_handle/'.$kode_project.'/'.$kode_berkas_task);
    }


}

/* End of file Manual.php */
/* Location: ./application/controllers/Manual.php */
