<?php

class M_user extends CI_Model{
    function getUser($username){
        $this->db->where('username',$username);
        return $this->db->get('user');
    }
}