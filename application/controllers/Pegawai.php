<?php

class Pegawai extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('M_absen');
        $this->load->model('M_pegawai');
        $this->load->library('user_agent');
        if($this->session->userdata('kd_jabatan') != '2'){
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
            } else{
                $data['muncul'] = ['disabled','disabled'];
            }
        }

        if ($this->agent->is_mobile())
        {
            $this->load->view('pegawai/Form_Pegawai_Mobile',$data);
        } else {
            $this->load->view('pegawai/Form_Pegawai_Desktop',$data);
        }
    }
    function absenMasuk(){
        $this->load->view('absen/Form_Absen_Masuk');
    }

    function absenKeluar(){
        $this->load->view('absen/Form_Absen_Keluar');
    }

    function cekAbsen(){
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
        $this->load->view('pegawai/Form_Cek_Absensi',$data);
    }

    function tampilAbsen($nik){
        $nik = $this->uri->segment(3);
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');
        
        if($nik && $bulan){
            $data['tampil_absen'] = $this->M_pegawai->cekAbsen($nik, $bulan, $tahun)->result();
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
            $data['nama'] = $this->M_pegawai->getDataPegawai($nik)->row();
            $this->load->view('pegawai/Form_Tampil_Absen',$data);
        }
    }
}
