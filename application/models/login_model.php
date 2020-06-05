<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model{
    public function login($data){
        $this->db->insert('admins',$data);
    }
    public function register($data){
        $this->db->insert('admins',$data);
    }
}
