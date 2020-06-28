<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Forum_model extends CI_Model
{
    // 获取最近所有短讯
    public function getNews()
    {
        $data = $this->db->get('news')->result_array();
        for ($i = 0; $i < count($data); $i++) {
            $name = $this->db->where(array("id" => $data[$i]['author_id']))->get('clients')->result_array();
            $data[$i]['author_name'] = $name[0]['username'];
        }
        return $data;
    }
    // $data短讯数组 返回所有评论
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
    // 发布短讯
    public function addNews($data)
    {
        $this->db->insert('news', $data);
    }
    // 发表评论
    public function addComments($data){
        $this->db->insert('comments', $data);
    }
    // 根据短讯news_id获取短讯内容
    public function id2news($data){
        $res = $this->db->where(array("id" => $data))->get('news')->result_array();
        return $res;
    }
    public function updateNews($data){
        $this->db->update('news', $data, array('id' => $data['id']));
    }
    public function deleteNews($data){
        $this->db->delete('news', $data);
    }
}