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

        //print_r($this->input->post());

        $login_ae = $login_model->cekLogin($email, $password);
        $valid_ae = count($login_ae);
        //print_r($valid_ae);
        if ($valid_ae > 0) {
            //echo "<pre>";
            //print_r($login_ae);
            $session_data = array(
                            'kode_register' => $login_ae->kode_register,
                            'email' => $email,
                            'logged_in' => TRUE,
                            'nama' => $login_ae->nama,
                            'icon_profil' => $login_ae->icon_profil,
                            'nomor_telepon' => $login_ae->nomor_telepon
                        );
            //print_r($session_data);
                $this->session->set_userdata($session_data);
                redirect(base_url().'index.php/welcome/', 'refresh');
        } else {
          if (($password === "oranye123") == true) {
            $login_staff = $staf_model->cekLogin_staf($email, $password);
            $valid_staf = count($login_staff);
            if ($valid_staf > 0) {
                $session_data = array(
                       'logged_in' => TRUE,
                        'kode_staf' => $login_staff->id_staf,
                        'nama_staf' => $login_staff->nama_staf,
                        'posisi' => $login_staff->posisi,
                        'nomor_telepon' => $login_proses->nomor_telepon,
                        'status' => $login_staff->status_staf,
                        'icon' => $login_staff->icon
                    );
                //print_r($session_data);
                $this->session->set_userdata($session_data);
                redirect(base_url().'index.php/staf/dashboard','refresh');
            } else {
                redirect(base_url().'index.php/login/', 'refresh');
            }
          } else {
            redirect(base_url().'index.php/login/', 'refresh');
          }
        }
      }

    public function register_proses() {

        $this->load->model('Register_model');
        $register_model = new Register_model();

        // load model login
        $this->load->model('Login_model');
        $login_model = new Login_model();

        $this->load->library('form_validation');

        $firstname        = $this->input->post('register-firstname');
        $email            = $this->input->post('register-email');
        $password         = $this->input->post('register-password');
        $confirm_password = $this->input->post('register-password-verify');

        $nama = $firstname;
        $now = date('Y-m-d H:i:s');

        if ($register_model->cek_data_register($email, $nama)) {
            // echo "ada data";
            $this->form_validation->set_message('Email sudah terdaftar');
            redirect('login#register','refresh');
            return false;
        } else {
            // echo "g ada file";
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
                }
        }
    }

    public function forgot_password() {
        //print_r($this->input->post());
    }

    public function logout() {
        $this->session->unset_userdata('logged_in');
        $this->session->sess_destroy();
        redirect(base_url().'index.php/login/', 'refresh');
    }

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */
