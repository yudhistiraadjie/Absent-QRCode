<?php

class Input_pegawai extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('M_input_pegawai');
    }

    function index(){
        $data = 
        $this->load->view('pegawai/Form_Input_Pegawai',$data);
    }


}