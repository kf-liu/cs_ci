<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login_model extends CI_Model
{
    public function adLogin($data)
    {
        $data = $this->db->where($data)->get('admins')->result_array();
        return empty($data) ? false : $data;
    }
    public function adRegister($data)
    {
        $this->db->insert('admins', $data);
    }
    public function cliLogin($data)
    {
        $data = $this->db->where($data)->get('clients')->result_array();
        return empty($data) ? false : $data;
    }
    public function cliRegister($data)
    {
        $this->db->insert('clients', $data);
    }
}
