<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }

    public function index()
    {

    }

    public function update_profile() {
        // load model profile
        $this->load->model('Profil_model');
        $profil_model = new Profil_model();

        $kode_register = $this->input->post('kode_register');
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $nomor_telepon = $this->input->post('nomor_telepon');

        $data = array(
                'nama' => $nama,
                'email' => $email,
                'nomor_telepon' => $nomor_telepon
            );

        $profil_model->update_profile($kode_register, $data);
        redirect(base_url().'index.php/welcome/profile/', 'refresh');

        echo "<pre>";
        print_r($this->input->post());
        print_r($_FILES);
    }

}

/* End of file Profile.php */
/* Location: ./application/controllers/Profile.php */
