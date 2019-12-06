<?php
class M_Admin extends CI_Model{
    function getDataPegawai($nik){
        $this->db->where('nik',$nik);
        return $this->db->get('user');
    }
    function cariData(){
        $this->db->select('nik, nama, jabatan');
        $this->db->from('user');
        $this->db->join('jabatan', 'jabatan.kd_jabatan = user.kd_jabatan');
        return $this->db->get();
    }
    function inputData($data){
        $this->db->insert('user',$data);
    }
    function detailsData($nik){
        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('jabatan', 'jabatan.kd_jabatan = user.kd_jabatan');
        $this->db->where('nik',$nik);
        return $this->db->get();
    }
    function cekAbsen($nik, $bulan, $tahun){
        $this->db->select('*');
        $this->db->from('absen');
        $this->db->join('user', 'user.nik = absen.nik', 'inner');
        $this->db->where('absen.nik', $nik);
        $this->db->where('month(tgl)', $bulan);
        $this->db->where('year(tgl)', $tahun);
        return $this->db->get();
    }
    function editSave($data,$nik){
        $this->db->set($data);
        $this->db->where('nik', $nik);
        $this->db->update('user');
    }
    
}