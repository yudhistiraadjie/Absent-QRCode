<?php

class M_absen extends CI_Model{
    function absenMasuk($data){
        $this->db->insert('absen',$data);
    }

    function absenKeluar($data,$kode){
	    $this->db->set($data);
		$this->db->where('id_absen', $kode);
		$this->db->update('absen');
    }

    function cari_tanggal($tanggal, $nik){
    	$this->db->select('*');
    	$this->db->from('absen');
    	$this->db->where('tgl', $tanggal);
    	$this->db->where('nik', $nik);
    	$this->db->limit(1);
    	return $this->db->get();
    }
}
?>