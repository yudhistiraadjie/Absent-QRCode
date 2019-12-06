<?php

class CekSession extends CI_Controller{

	function::__construct(){
		parent::__construct();
		$this->load->library('user_agent');
	}

    function index(){
        if($this->session->userdata('kd_jabatan') == '1'){
            redirect('admin');
        }else if($this->session->userdata('kd_jabatan') == '2'){
            redirect('pegawai');
        }else{
            redirect('Login_controller');
        }
    }

}
