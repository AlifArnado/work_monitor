<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }

    public function index()
    {

    }

    public function pesan_staf() {
        // load model
        $this->load->model('Pesan_model');
        $pesan_model = new Pesan_model();
        // echo "<pre>";
        //print_r($this->input->post());

        $now2 = date('Y-m-d H:i:s');

        $kode_project = $this->input->post('kode_project');
        $kode_staf = $this->input->post('kode_staf');
        $nama_staf = $this->input->post('nama_pesan');
        $kode_task = $this->input->post('kode_task');
        $pesan = $this->input->post('pesan');

        $query = $this->db->query("SELECT * FROM data_pesan WHERE kode_task = '$kode_task'");
        $kode_pesan_in = $query->row();
        $valid = $query->num_rows();

        if ($valid > 0) {
            //echo "data ada";
            $kode_pesan = $kode_pesan_in->kode_pesan;
            $data_pesan = array(
                    'kode_pesan' => $kode_pesan,
                    'kode_task' => $kode_task,
                    'nama_pesan' => $nama_staf,
                    'isi_pesan' => $pesan,
                    'color_label' => "label-success",
                    'tanggal_pesan' => $now2
                );
            //print_r($data_pesan);
            // input pesan gunakan task pesan yang ada
            $pesan_model->simpan_pesan($data_pesan);
            redirect(base_url('index.php/staf/dashboard/detail_task/'.$kode_task.'/'.$kode_project),'refresh');

        } else {
            //echo "data tidak ada";

            // buat kode pesan
            $bb = $this->db->query("SELECT * FROM data_pesan");
            $num_kode_pesan = $bb->num_rows() + 1;
            $kode_pesan = "KODPESAN000".$num_kode_pesan;

            $data_pesan = array(
                    'kode_pesan' => $kode_pesan,
                    'kode_task' => $kode_task,
                    'nama_pesan' => $nama_staf,
                    'isi_pesan' => $pesan,
                    'color_label' => "label-success",
                    'tanggal_pesan' => $now2
                );
            $pesan_model->simpan_pesan($data_pesan);
            $data['data_pesan'] = $pesan_model->view_data_pesan($kode_pesan, $kode_task);
            redirect(base_url('index.php/staf/dashboard/detail_task/'.$kode_task.'/'.$kode_project),'refresh');
        }
    }

    public function pesan_ae() {
        // load model
        $this->load->model('Pesan_model');
        $pesan_model = new Pesan_model();
        //echo "<pre>";
        //print_r($this->input->post());

        $now2 = date('Y-m-d H:i:s');

        $kode_staf = $this->input->post('kode_register');
        $nama_pesan = $this->input->post('nama_pesan');
        $kode_task = $this->input->post('kode_task');
        $pesan = $this->input->post('pesan');

        $query = $this->db->query("SELECT * FROM data_pesan WHERE kode_task = '$kode_task'");
        $kode_pesan_in = $query->row();
        $valid = $query->num_rows();

        if ($valid > 0) {
            // echo "data ada";
            $kode_pesan = $kode_pesan_in->kode_pesan;
            $data_pesan = array(
                    'kode_pesan' => $kode_pesan,
                    'kode_task' => $kode_task,
                    'nama_pesan' => $nama_pesan,
                    'isi_pesan' => $pesan,
                    'color_label' => "label-info",
                    'tanggal_pesan' => $now2
                );
            //print_r($data_pesan);
            // input pesan gunakan task pesan yang ada
            $pesan_model->simpan_pesan($data_pesan);
            redirect(base_url('index.php/welcome/detail_task/'.$kode_task),'refresh');

        } else {
            // echo "data tidak ada";

            // buat kode pesan
            $bb = $this->db->query("SELECT * FROM data_pesan");
            $num_kode_pesan = $bb->num_rows() + 1;
            $kode_pesan = "KODPESAN000".$num_kode_pesan;

            $data_pesan = array(
                    'kode_pesan' => $kode_pesan,
                    'kode_task' => $kode_task,
                    'nama_pesan' => $nama_staf,
                    'isi_pesan' => $pesan,
                    'color_label' => "label-info",
                    'tanggal_pesan' => $now2
                );
            $pesan_model->simpan_pesan($data_pesan);
            $data['data_pesan'] = $pesan_model->view_data_pesan($kode_pesan, $kode_task);
            redirect(base_url('index.php/welcome/detail_task/'.$kode_task),'refresh');
        }
    }

}

/* End of file Pesan.php */
/* Location: ./application/controllers/Pesan.php */
