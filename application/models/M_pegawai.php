<?php
class M_pegawai extends CI_Model{
    function getDataPegawai($nik){
        $this->db->where('nik',$nik);
        return $this->db->get('user');
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
}