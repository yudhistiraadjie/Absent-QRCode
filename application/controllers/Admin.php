<?php

class Admin extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('M_admin');
        $this->load->model('M_absen');
        $this->load->model('M_log');
        $this->load->library('user_agent');
        if($this->session->userdata('kd_jabatan') != '1'){
            redirect('CekSession');
        }
    }

    function index(){
        $tanggal_sekarang = date('Y-m-d');
        $tanggal = date('Y-m-d');
        $nik = $this->session->userdata('nik');
        $data['absen'] = $this->M_absen->cari_tanggal($tanggal, $nik)->row();

        if (empty($data['absen']->tgl)) {
            $data['muncul'] = ['','disabled'];
        } else {
            if (empty($data['absen']->jam_masuk) && (empty($data['absen']->jam_keluar))) {
                $data['muncul'] = ['','disabled'];
            } elseif (($data['absen']->jam_masuk) && ($data['absen']->jam_keluar == "00:00:00")) {
                $data['muncul'] = ['disabled',''];
            } else {
                $data['muncul'] = ['disabled','disabled'];
            }
        }

        if ($this->agent->is_mobile())
        {
            $this->load->view('admin/Form_Admin_Mobile',$data);
        } else {
            $this->load->view('admin/Form_Admin_Desktop',$data);
        }
    }

    function cari(){
        $data['bulan'] = [
            ['1','Januari'],
            ['2','Februari'],
            ['3','Maret'],
            ['4','April'],
            ['5','Mei'],
            ['6','Juni'],
            ['7','Juli'],
            ['8','Agustus'],
            ['9','September'],
            ['10','Oktober'],
            ['11','November'],
            ['12','Desember']
        ];

        $data ['gawai'] = $this->M_admin->cariData()->result();
        $this->load->view('admin/Form_Data_Pegawai',$data);
    }

    function tambahData(){
        $this->load->view('admin/Form_Input_Data_Pegawai');
    }

    function inputData(){
        $nik = $this->input->post('nik');
        $data = [
        'nik'           => $nik,
        'nama'          => $this->input->post('nama'),
        'ttl'           => $this->input->post('tgl'),
        'jenis_kelamin' => $this->input->post('jenis_kelamin'),
        'alamat'        => $this->input->post('alamat'),
        'no_tlp'        => $this->input->post('no_tlp'),
        'username'      => $this->input->post('username'),
        'password'      => md5($this->input->post('password')),
        'kd_jabatan'    => $this->input->post('kd_jabatan')
        ];
        if($data >0){
            date_default_timezone_set("Asia/Jakarta");
            $tanggal = date('Ymd');
            $jam = date('His');
            $log = [
                'id_log'    => '',
                'nik'       => $this->session->userdata('nik'),
                'waktu'     => $tanggal.$jam,
                'kegiatan'  => 'User '.$this->session->userdata('nik').' Melakukan Input Data dengan NIK '.$nik
            ];
            $this->M_log->simpanLog($log);
            $this->M_admin->inputData($data);
            redirect(base_url('Admin/cari'));
        }
    }

    function detailsData($nik){
        $data['details'] = $this->M_admin->detailsData($nik)->row();
        $this->load->view('admin/Form_Detail_Pegawai',$data);
    }

    function editData($nik){
        $data['tampil'] = $this->M_admin->detailsData($nik)->row();
        $this->load->view('admin/Form_Edit_Data_Pegawai',$data);
    }

    function cekAbsen($nik){

        $nik = $this->uri->segment(3);
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');
        
        if($nik && $bulan){
            $data['tampil_absen'] = $this->M_admin->cekAbsen($nik, $bulan, $tahun)->result();
            $data['tahun'] = $tahun;
            if ($bulan == '1') {
                $data['bulan'] = "Januari";
            } elseif ($bulan == '2') {
                $data['bulan'] = "Februari";
            } elseif ($bulan == '3') {
                $data['bulan'] = "Maret";
            } elseif ($bulan == '4') {
                $data['bulan'] = "April";
            } elseif ($bulan == '5') {
                $data['bulan'] = "Mei";
            } elseif ($bulan == '6') {
                $data['bulan'] = "Juni";
            } elseif ($bulan == '7') {
                $data['bulan'] = "Juli";
            } elseif ($bulan == '8') {
                $data['bulan'] = "Agustus";
            } elseif ($bulan == '9') {
                $data['bulan'] = "September";
            } elseif ($bulan == '10') {
                $data['bulan'] = "Oktober";
            } elseif ($bulan == '11') {
                $data['bulan'] = "November";
            } elseif ($bulan == '12') {
                $data['bulan'] = "Desember";
            }
            // print_r($data['tampil_absen']);
            // die;
            $data['nama'] = $this->M_admin->getDataPegawai($nik)->row();
            $this->load->view('admin/Form_Cek_Absen',$data);
        }
    }

    function editSave(){
        $nik = $this->input->post('nik');
        $password = md5($this->input->post('password'));
        if ($password == 'd41d8cd98f00b204e9800998ecf8427e') {
            $data = [
                'nik'           => $nik,
                'nama'          => $this->input->post('nama'),
                'ttl'           => $this->input->post('tgl'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'alamat'        => $this->input->post('alamat'),
                'no_tlp'        => $this->input->post('no_tlp'),
                'username'      => $this->input->post('username'),

                'kd_jabatan'    => $this->input->post('kd_jabatan')
            ];
        } else {
            $data = [
                'nik'           => $nik,
                'nama'          => $this->input->post('nama'),
                'ttl'           => $this->input->post('tgl'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'alamat'        => $this->input->post('alamat'),
                'no_tlp'        => $this->input->post('no_tlp'),
                'username'      => $this->input->post('username'),
                'password'      => $password,
                'kd_jabatan'    => $this->input->post('kd_jabatan')
            ];
        }
        
        if($data >0){
            date_default_timezone_set("Asia/Jakarta");
            $tanggal = date('Ymd');
            $jam = date('His');
            $log = [
                'id_log'    => '',
                'nik'       => $this->session->userdata('nik'),
                'waktu'     => $tanggal.$jam,
                'kegiatan'  => 'User '.$this->session->userdata('nik').' Melakukan Edit Data dengan NIK '.$nik. ' Menjadi Data Baru'
            ];
            $this->M_log->simpanLog($log);
            $this->M_admin->editSave($data, $nik);
            redirect(base_url('Admin/cari'));
        }
    }

    function absenMasuk(){
        $this->load->view('absen/Form_Absen_Masuk');
    }

    function absenKeluar(){
        $this->load->view('absen/Form_Absen_Keluar');
    }
}
