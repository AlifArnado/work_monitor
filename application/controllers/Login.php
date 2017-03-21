<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
    }

    public function index()
    {
        $this->load->view('login_register_view', TRUE);
    }

    public function login_proses() {
        // load model login
        $this->load->model('Login_model');
        $login_model = new Login_model();

        // load model staf
        $this->load->model('Staf_model');
        $staf_model = new Staf_model();

        $email = $this->input->post('login-email');
        $password = $this->input->post('login-password');
        $posisi = $this->input->post('posisi');

        if ($posisi == "AE") {

            $data_register = $login_model->cekLogin($email, $password);
                if ($login_model->cekLogin($email, $password)) {
                    //echo "data ada";
                    $session_data = array(
                            'kode_register' => $data_register->kode_register,
                            'email' => $email,
                            'logged_in' => TRUE,
                            'nama' => $data_register->nama,
                            'icon_profil' => $data_register->icon_profil,
                            'nomor_telepon' => $data_register->nomor_telepon
                        );
                    $this->session->set_userdata($session_data);
                    redirect(base_url().'index.php/welcome/', 'refresh');
                } else {
                    redirect(base_url().'index.php/login/', 'refresh');
                }

        } else if ($posisi == "STAF") {
            $data_staf = $staf_model->cekLogin_staf($email);
            if ($staf_model->cekLogin_staf($email)) {
                echo "data ada";
                $session_data = array(
                       'logged_in' => TRUE,
                        'kode_staf' => $data_staf->id_staf,
                        'nama_staf' => $data_staf->nama_staf,
                        'status' => $data_staf->status_staf,
                        'icon' => $data_staf->icon
                    );
                //print_r($session_data);
                $this->session->set_userdata($session_data);
                redirect(base_url().'index.php/staf/dashboard','refresh');
            } else {
                //echo "data tidak ada";
                redirect(base_url().'index.php/login/', 'refresh');
            }
        } else {
            redirect(base_url().'index.php/login/', 'refresh');
       }


    }

    public function register_proses() {

        $this->load->model('Register_model');
        $register_model = new Register_model();

        $firstname        = $this->input->post('register-firstname');
        $lastname         = $this->input->post('register-lastname');
        $email            = $this->input->post('register-email');
        $password         = $this->input->post('register-password');
        $confirm_password = $this->input->post('register-password-verify');

        $nama = $firstname." ".$lastname;
        $now = date('Y-m-d H:i:s');

        if ($register_model->cek_data_register($email)) {
            //echo "ada data";;
        } else {
            //echo "g ada file";
            $data_register = array(
                'nama' => $nama,
                'password' => md5($password),
                'confirm_pasword' => $confirm_password,
                'email' => $email,
                'nomor_telepon' => 'Not Set',
                'icon_profil' => 'default.jpg',
                'tanggal_daftar' => $now
            );
            $register_model->saveDataRegister($data_register);
            redirect('login','refresh');
        }
    }

    public function forgot_password() {
        print_r($this->input->post());
    }

    public function logout() {
        $this->session->unset_userdata('logged_in');
        $this->session->sess_destroy();
        redirect(base_url().'index.php/login/', 'refresh');
    }

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */
