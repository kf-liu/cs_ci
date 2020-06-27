<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Forum_model extends CI_Model
{
    public function getNews()
    {
        $data = $this->db->get('news')->result_array();
        for ($i = 0; $i < count($data); $i++) {
            $name = $this->db->where(array("id" => $data[$i]['author_id']))->get('clients')->result_array();
            $data[$i]['author_name'] = $name[0]['username'];
        }
        return $data;
    }
    public function news2comments($data)
    {
        $res = array();
        foreach ($data['news'] as $news) {
            $comment = $this->db->where(array("news_id" => $news['id']))->get('comments')->result_array();
            for ($i = 0; $i < count($comment); $i++) {
                $name = $this->db->where(array("id" => $comment[$i]['user_id']))->get('clients')->result_array();
                $comment[$i]['username'] = $name[0]['username'];
            }
            array_push($res, $comment);
        }
        return $res;
    }
    public function addNews($data)
    {
        $this->db->insert('news', $data);
    }
    public function addComments($data){
        $this->db->insert('comments', $data);
    }
}
