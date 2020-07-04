<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function resetPassword($id)
    {
        $this->db->update('clients', array('password' => 123), array('id' => $id));
    }
}
