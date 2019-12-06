<?php

class Login_controller extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('M_user');
        $this->load->model('M_log');
        $this->load->library('user_agent');
    }

    function index(){
        $this->load->view('login/Form_Login');  
    }

    function validasi(){
        // inisialisasi data user
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));

        // cek apakah user ada didalam database atau tidak
        $user = $this->M_user->getUser($username)->num_rows();
        if($user > 0){
            // mengambil data user dari database dan membuat objek user
            $user = $this->M_user->getUser($username)->row();
            // mencocokan data dari form login dengan data user pada database
            if($username == $user->username && $password == $user->password){
                if ($this->agent->is_mobile()) {
                    // membuat array data yg akan dimasukan kedalam session
                    $user = array(
                        'username'      => $user->username,
                        'kd_jabatan'    => $user->kd_jabatan,
                        'nama'          => $user->nama,
                        'nik'          => $user->nik
                   );
                    // membuat session    
                    $this->session->set_userdata($user);
                    date_default_timezone_set("Asia/Jakarta");
                    $tanggal = date('Ymd');
                    $jam = date('His');
                    $log = [
                        'id_log'    => '',
                        'nik'       => $this->session->userdata('nik'),
                        'waktu'     => $tanggal.$jam,
                        'kegiatan'  => 'User '.$this->session->userdata('nik').' Melakukan Login'
                    ];
                    $this->M_log->simpanLog($log);
                    $this->cekSession();
                } else{
                    $user = array(
                        'username'      => $user->username,
                        'kd_jabatan'    => $user->kd_jabatan,
                        'nama'          => $user->nama,
                        'nik'          => $user->nik
                   );
                    // membuat session    
                   $this->session->set_userdata($user);
                   $this->cekSession();
                }
            }else{
                $this->session->set_flashdata('err','username atau password salah');
                redirect('Login_controller');
            }
        }else{
            $this->session->set_flashdata('err','user tidak ditemukan');
            redirect('Login_controller');
        }
    }

    function logout(){
        if ($this->agent->is_mobile()) {
            $tanggal = date('Ymd');
            $jam = date('His');
            $log = [
                'id_log'    => '',
                'nik'       => $this->session->userdata('nik'),
                'waktu'     => $tanggal.$jam,
                'kegiatan'  => 'User '.$this->session->userdata('nik').' Melakukan Logout'
            ];
            $this->M_log->simpanLog($log);
        }
        $this->session->sess_destroy();
        // $this->session->unset_userdata();
        date_default_timezone_set("Asia/Jakarta");
        redirect('Login_controller');
    }

    function cekSession(){
        if($this->session->userdata('kd_jabatan') == '1'){
            redirect('admin');
        }else if($this->session->userdata('kd_jabatan') == '2'){
            redirect('pegawai');
        }else{
            redirect('Login_controller');
        }
    }

}