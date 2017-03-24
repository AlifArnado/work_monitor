<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Workload_model');
		$this->load->model('Member_model');
		$this->load->helper(array('form', 'url'));
        if($this->session->userdata('logged_in') !== TRUE) {
            redirect('login','refresh');
        }
	}

	public function index()
	{
        // load status Active Project
        $this->load->model('Project_model');
        $project_model = new Project_model();
        $data['data_project'] = $project_model->project_status_active();
		$this->load->view('home_view', $data);
	}

	public function create_project() {
		$data_member['member'] = $this->Member_model->getMember();
		$this->load->view('create_project_view', $data_member);
	}

	public function workload() {
		$this->data['data_staf'] = $this->Workload_model->get_DataStaf();
		$this->load->view('workload_view', $this->data);
	}

	public function timeline() {
		$this->load->view('timeline_view');
	}

    public function calender() {
        $this->load->view('calender_view');
    }

    public function input_event() {
        $this->load->view('input_event_view');
    }

    public function add_event() {
        echo "<pre>";
        print_r($this->input->post());
    }

	public function brief($kode_project) {
        // load project model
        $this->load->model('Project_model');
        $project_model = new Project_model();

        // load berkas task model
        $this->load->model('BerkasTask_model');
        $berkas_task_model = new BerkasTask_model();

        $data['data_project'] = $project_model->project_view_by_id($kode_project);
        $data['berkas_task'] = $berkas_task_model->task_berkas_get_id($kode_project);
		$this->load->view('brief_view', $data);
	}

	public function create_task() {
        // load model project
        $this->load->model('Project_model');
        $project_model = new Project_model();

        $kode_project = $this->input->post('project_id');
        $data['title_task'] = $this->input->post('title-task');
        $data['kode_project'] = $this->input->post('project_id');
        $data['data_project'] = $project_model->project_view_by_id($kode_project);
		$this->load->view('create_task_view', $data);
	}

    public function save_new_task() {

        // load model task
        $this->load->model('Task_model');
        $task_model = new Task_model();

        // load model berkas_task
        $this->load->model('BerkasTask_model');
        $berkas_task_model = new BerkasTask_model();

        $kode_project = $this->input->post('kode_project');
        $name_ae = $this->input->post('name_ae');
        $title_task = $this->input->post('title_task');
        $keterangan = $this->input->post('keterangan');
        $work_request = $this->input->post('work_request');

        $direktori = "./upload_task/";
        $aa = $this->db->query("SELECT * FROM data_task");
        $bb = $this->db->query("SELECT * FROM data_berkas_task");

        // create code_task
        $num_kode_task = $aa->num_rows() + 1;
        $kode_task = "KODTSK00".$num_kode_task;

        // create primary berkas task
        $num_kode_berkas_task = $bb->num_rows() + 1;
        $kode_berkas_task = "KODBER00".$num_kode_berkas_task;

        //echo $kode_task;
        echo "<pre>";
        print_r($this->input->post());
        print_r($_FILES);

        $file_name = str_replace(' ','_',$_FILES['task_file']['name']);
        echo $file_name;

        $config['upload_path'] = './assets/uploads/';
        $config['allowed_types'] = 'zip|rar|pdf';
        // $config['max_size'] = 3000;
        // $config['max_width'] = 2024;
        // $config['max_height'] = 2024;
        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('task_file')){
            $error = array('error' => $this->upload->display_errors());
        } else {
            $data = array('upload_data' => $this->upload->data());
            echo "success";
        }

        $now = date('Y-m-d');
        $now2 = date('Y-m-d H:i:s');

        $data_task = array(
         'kode_task' => $kode_task,
         'kode_project' => $kode_project,
         'kode_staf' => "Null",
         'judul_task' => $title_task,
         'task_request' => $name_ae,
         'task_desc' => $keterangan,
         'status_task' => "Pending",
         'waktu' => $now2,
         'tanggal_task' => $now,
         'work_request' => $work_request
        );

        $data_berkas_task = array(
            'kode_berkas_task' => $kode_berkas_task,
            'kode_task' => $kode_task,
            'kode_project' => $kode_project,
            'name_file' => $file_name,
            'tgl_upload_task' => $now2
            );

        print_r($data_task);
        print_r($data_berkas_task);

        $task_model->saveTask($data_task);
        $berkas_task_model->task_insert_data($data_berkas_task);
        redirect(base_url().'index.php/welcome/pilih_handle_task/'.$kode_project.'/'.$kode_task);
    }

    public function pilih_handle_task($kode_project, $kode_task) {
        // load model staf

        $this->data['kode_project'] = $kode_project;
        $this->data['kode_task'] = $kode_task;

        $this->data['data_staf'] = $this->Workload_model->get_DataStaf();
        $this->load->view('pilih_handle_task_view', $this->data);
    }

	public function detail_task($kode_task) {
        // load model task
        $this->load->model('Task_model');
        $task_model = new Task_model();

        $data['data_task'] = $task_model->detail_task($kode_task);

		$this->load->view('detail_task_view', $data);
	}

	public function task_list($kode_project) {
        // load project model
        $this->load->model('Project_model');
        $project_model = new Project_model();

        // load task model
        $this->load->model('Task_model');
        $task_model = new Task_model();

        $data['data_project'] = $project_model->project_view_by_id($kode_project);
        $data['data_task_order'] = $task_model->task_sort_desc($kode_project);
        $data['data_task'] = $task_model->task_status_finish_sort_desc($kode_project);

		$this->load->view('task_list_view', $data);
	}

	public function submit_create_project() {

		// load model berkas_task
        $this->load->model('BerkasTask_model');
        $berkas_task_model = new BerkasTask_model();

        $this->load->model('Project_model');
		$project_model = new Project_model();

		$aa = $this->db->query("SELECT * FROM data_project");
		//echo $aa->num_rows();
        //
		// create code_project
		$num_kode = $aa->num_rows() + 1;
		$kode_project = "KODPROJ00".$num_kode;

        $bb = $this->db->query("SELECT * FROM data_berkas_task");
        // create primary berkas task
        $num_kode_berkas_task = $bb->num_rows() + 1;
        $kode_berkas_task = "KODBER00".$num_kode_berkas_task;

		$ae_name 		= $this->input->post('ae_name');
		$project_title  = $this->input->post('project_title');
		$keterangan 	= $this->input->post('keterangan');
		$deadline 		= $this->input->post('deadline');
		$project_type   = $this->input->post('project_type');
		$project_load   = $this->input->post('project_load');
        //print_r($_FILES);
        $file_name = str_replace(' ','_',$_FILES['images']['name']);
        echo $file_name;

		$config['upload_path'] = './assets/uploads/';
		$config['allowed_types'] = 'zip|rar|pdf';
		// $config['max_size'] = 3000;
		// $config['max_width'] = 2024;
		// $config['max_height'] = 2024;
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('images')){
			$error = array('error' => $this->upload->display_errors());
			print_r($error);
		}
		else{
			$data = array('upload_data' => $this->upload->data());
			echo "<pre>";
			print_r($data['upload_data']['file_name']);
			echo "</pre>";
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
        print_r($data);

        $data_berkas_task = array(
            'kode_berkas_task' => $kode_berkas_task,
            'kode_task' => 'null',
            'kode_project' => $kode_project,
            'name_file' => $file_name,
            'tgl_upload_task' => $now2
            );
        echo "<pre>";
        print_r($data_berkas_task);

        $berkas_task_model->task_insert_data($data_berkas_task);
 		$project_model->saveCreateProject($data);
 		redirect(base_url().'index.php/welcome/pilih_handle/'.$kode_project.'/'.$kode_berkas_task);
	}

	public function pilih_staf() {
		$this->data['data_staf'] = $this->Workload_model->get_DataStaf();
		$this->load->view('pilih_staf_view', $this->data);
	}

	public function pilih_handle($kode_project, $kode_berkas_task) {
        $this->data['kode_berkas_task'] = $kode_berkas_task;
		$this->data['kode_project'] = $kode_project;
		$this->data['data_staf'] = $this->Workload_model->get_DataStaf();
		$this->load->view('pilih_handle_view', $this->data);
	}

	public function heandle_option() {

		// load model project
		$this->load->model('Project_model');
		$project_model = new Project_model();

		// load model task
		$this->load->model('Task_model');
		$task_model = new Task_model();

		// load model staf
		$this->load->model('Staf_model');
		$staf_model = new Staf_model();

        // load model berkas task
        $this->load->model('BerkasTask_model');
        $berkas_task_model = new BerkasTask_model();

		$kode_project = $this->input->post('kode_project');
        $kode_berkas_task = $this->input->post('kode_berkas_task');
		$kode_staf    = $this->input->post('kode_staf');
		$status_staf  = $this->input->post('status');

		//echo $status_staf;

		$data_task = $this->db->query("SELECT * FROM data_task");
		$total_data_task = $data_task->num_rows() + 1;
		$kode_task = "KODTSK00".$total_data_task;

		$data_project = $this->db->query("SELECT * FROM data_project WHERE kode_project = '$kode_project'");
		$value = $data_project->row_array();

        // echo "<pre>";
        // print_r($value);

		$name_ae = $value['ae_name'];
		$keterangan = $value['project_desc'];

		// echo "<pre>";
		// echo json_encode($this->input->post());


		$validasi = $data_project->num_rows();
		//echo $validasi;

		if ($validasi > 0) {
			$status_project = "ACTIVE";

			if ($status_staf === "Full") {
				// update data status project
				$project_model->update_status_project($kode_project, $status_project);

                // pending task yang didang di kerjakan
				$task_model->task_update_status_pending($kode_staf);

                // tambahkan data dalam task list
                $now = date('Y-m-d');
                $waktu_sekarang = date('Y-m-d H:i:s');

                $data_task = array(
                		'kode_task' => $kode_task,
                		'kode_project' => $kode_project,
                		'kode_staf' => $kode_staf,
                		'judul_task' => "Brief",
                		'task_request' => $name_ae,
                		'task_desc' => $keterangan,
                		'status_task' => 'Proses',
                		'waktu' => $waktu_sekarang,
                		'tanggal_task' => $now,
                		'work_request' => ""
                	);
                // echo "<pre>";
                // print_r($data_task);
               	$task_model->saveTask($data_task);
                $berkas_task_model->update_task_berkas($kode_berkas_task, $kode_task);

                echo json_encode($data_task);
                redirect(base_url().'index.php');
			} else {
				$status_staf = "Full";

                // update data staf Free menjadi Full
				$staf_model->staf_update_status_full($kode_staf);

                // update data project menjadi Active
                $project_model->update_status_project($kode_project, $status_project);

                // tambhakan data dalam task
                $now = date('Y-m-d');
                $waktu_sekarang = date('Y-m-d H:i:s');
                $data_task = array(
                		'kode_task' => $kode_task,
                		'kode_project' => $kode_project,
                		'kode_staf' => $kode_staf,
                		'judul_task' => "Brief",
                		'task_request' => $name_ae,
                		'task_desc' => $keterangan,
                		'status_task' => 'Proses',
                		'waktu' => $waktu_sekarang,
                		'tanggal_task' => $now,
                		'work_request' => ""
                	);
                // echo "<pre>";
                // echo print_r($data_task);
               	$task_model->saveTask($data_task);
                $berkas_task_model->update_task_berkas($kode_berkas_task, $kode_task);

                // echo json_encode($data_task);
                // echo "</pre>";
                redirect(base_url().'index.php');
			}
		}
	}

    public function option_staf_task() {

        // load model project
        $this->load->model('Project_model');
        $project_model = new Project_model();

        // load model task
        $this->load->model('Task_model');
        $task_model = new Task_model();

        // load model staf
        $this->load->model('Staf_model');
        $staf_model = new Staf_model();

        $kode_project = $this->input->post('kode_project');
        $kode_task = $this->input->post('kode_task');
        $kode_staf = $this->input->post('kode_staf');
        $status_staf = $this->input->post('status');
        echo $kode_project;
        echo $kode_task;

        $data_task = $this->db->query("SELECT * FROM data_task WHERE kode_task = '$kode_task'");
        $valid = $data_task->num_rows();

        if ($valid > 0) {
            $status_project = "ACTIVE";

            if ($status_staf === "Full") {
                // update data status project
                $task_model->task_update_status_proses_to_pending($kode_staf);

                // update data task (pilih staf dan status task akctive)
                $task_model->task_update_status_prses_kode_staf($kode_staf, $kode_task);

                redirect(base_url().'index.php');
            } else {
                $status_staf = "Full";

                // update data staf Free menjadi Full
                $staf_model->staf_update_status_full($kode_staf);

                // update data task (pilih staf dan status task akctive)
                $task_model->task_update_status_prses_kode_staf($kode_staf, $kode_task);

                redirect(base_url().'index.php');
            }
        }
    }

    public function profile() {
        $this->load->view('profile_view');
    }
}
