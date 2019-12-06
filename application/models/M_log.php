<?php
class M_log extends CI_Model{
	function simpanLog($log){
		$this->db->insert('log', $log);
	}
}