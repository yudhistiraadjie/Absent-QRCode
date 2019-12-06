<?php

class Absen extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('M_absen');
        $this->load->model('M_log');
        $this->load->library('user_agent');
    }

    function absen_masuk(){
        
        if ($this->agent->is_mobile())
        {
            if ($this->session->userdata('kd_jabatan') == "1") {
                redirect(base_url('admin/absenMasuk'));
            } elseif ($this->session->userdata('kd_jabatan') == "2") {
                redirect(base_url('pegawai/absenMasuk'));
            }
        } else {
            redirect(base_url('absen/qrCode'));
        }
    }

    function absen_keluar(){
        
        if ($this->agent->is_mobile())
        {
            if ($this->session->userdata('kd_jabatan') == "1") {
                redirect(base_url('admin/absenKeluar'));
            } elseif ($this->session->userdata('kd_jabatan') == "2") {
                redirect(base_url('pegawai/absenKeluar'));
            }
        } else {
            redirect(base_url('absen/qrCode'));
        }
    }

    function absenKeluar($kode){
        
        date_default_timezone_set("Asia/Jakarta");
        $tanggal = date('Ymd');
        $jam = date('His');
        $kode = $this->uri->segment(3);
        $data = [
            'jam_keluar'    => $jam
        ];
        if ($data > 0) {
            // print_r($data);
            // die;
            $log = [
                'id_log'    => '',
                'nik'       => $this->session->userdata('nik'),
                'waktu'     => $tanggal.$jam,
                'kegiatan'  => 'User '.$this->session->userdata('nik').' Melakukan Absen keluar'
            ];
            $this->M_log->simpanLog($log);
            $this->M_absen->absenKeluar($data,$kode);
            if ($this->session->userdata('kd_jabatan') == 1) {
                redirect(base_url('admin'));
            } elseif($this->session->userdata('kd_jabatan') == 2) {
                redirect(base_url('pegawai'));
            }            
        }
    }

    function absenMasuk($kode){
        
        date_default_timezone_set("Asia/Jakarta");
        $tanggal = date('Ymd');
        $jam = date('His');
        $data = [
            'id_absen'      => $kode,
            'nik'           => $this->session->userdata('nik'),
            'tgl'           => $tanggal,
            'jam_masuk'     => $jam,
            'jam_keluar'    => ''
        ];
        if ($data > 0) {
            // print_r($data);
            // die;
            $log = [
                'id_log'    => '',
                'nik'       => $this->session->userdata('nik'),
                'waktu'     => $tanggal.$jam,
                'kegiatan'  => 'User '.$this->session->userdata('nik').' Melakukan Absen Masuk'
            ];
            $this->M_log->simpanLog($log);
            $this->M_absen->absenMasuk($data);
            if ($this->session->userdata('kd_jabatan') == 1) {
                redirect(base_url('admin'));
            } elseif($this->session->userdata('kd_jabatan') == 2) {
                redirect(base_url('pegawai'));
            }
        }
    }

    function qrCode(){
        $tanggal_sekarang = date('Y-m-d');
        $tanggal = date('Y-m-d');
        $nik = $this->session->userdata('nik');
        $data['absen'] = $this->M_absen->cari_tanggal($tanggal, $nik)->row();

        if (empty($data['absen']->tgl)) {
            date_default_timezone_set("Asia/Jakarta");
            $data['nik'] = $this->session->userdata('nik');
            $data['tanggal'] = date('ymd');
            $data['jam'] = date('His');
            $data['kode'] = $data['nik'].$data['tanggal'].$data['jam'];
            $this->load->view('absen/Form_QR', $data);
        } else {
            $data['kode'] = $data['absen']->id_absen;
            $this->load->view('absen/Form_QR', $data);
        }
        // $this->load->view('absen/Form_QR', $data);
        // die;
        // $data = $this->M_absen->
    }
}
?>