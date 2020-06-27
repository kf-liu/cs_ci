<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Intro_model extends CI_Model
{
    public function getIntro()
    {
        $data = $this->db->get('intro')->result_array();
        return $data;
    }
    public function update($data)
    {
        $this->db->update('intro', $data, array('cid' => $data['cid']));
    }
    public function insert($data)
    {
        $this->db->insert('intro', $data);
    }
    public function delete($data)
    {
        $this->db->delete('intro', $data);
    }
}