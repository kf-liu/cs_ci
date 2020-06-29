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
    //$data短讯数组 返回所有评论
    public function news2comments($data)
    {
        $res = array();
        foreach ($data as $news) {
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
    public function addComments($data)
    {
        $this->db->insert('comments', $data);
    }
    // 根据短讯news_id获取短讯内容
    public function id2news($data)
    {
        $res = $this->db->where(array("id" => $data))->get('news')->result_array();
        return $res;
    }
    //更新短讯
    public function updateNews($data)
    {
        $this->db->update('news', $data, array('id' => $data['id']));
    }
    //删除短讯
    public function deleteNews($data)
    {
        $this->db->delete('news', $data);
    }
    //查询作者的全部短讯
    public function author2news($data)
    {
        $res = $this->db->where(array("author_id" => $data))->get('news')->result_array();
        return $res;
    }
    // 获取最近所有评论
    public function allComments()
    {
        $data = $this->db->get('comments')->result_array();
        for ($i = 0; $i < count($data); $i++) {
            $name = $this->db->where(array("id" => $data[$i]['user_id']))->get('clients')->result_array();
            $data[$i]['user_name'] = $name[0]['username'];
            $news = $this->db->where(array("id" => $data[$i]['news_id']))->get('news')->result_array();
            $data[$i]['news_biaoti'] = $news[0]['biaoti'];
        }
        return $data;
    }
    // 根据id获取my所有评论 $data为user_id
    public function myComments($data)
    {
        $data = $this->db->where(array("user_id" => $data))->get('comments')->result_array();
        for ($i = 0; $i < count($data); $i++) {
            $name = $this->db->where(array("id" => $data[$i]['user_id']))->get('clients')->result_array();
            $data[$i]['user_name'] = $name[0]['username'];
            $news = $this->db->where(array("id" => $data[$i]['news_id']))->get('news')->result_array();
            $data[$i]['news_biaoti'] = $news[0]['biaoti'];
        }
        return $data;
    }
    //根据id获取我的收藏
    public function myStar($data)
    {
        $user_data = $this->getClient($data);
        $user_star = $this->varchar2array($user_data[0]['star']);
        $res = array();
        foreach ($user_star as $u) {
            $news = $this->db->where(array("id" => $u))->get('news')->result_array();
            array_push($res, $news[0]);
        }
        return $res;
    }
    //根据id获取我的点赞
    public function myLike($data)
    {
        $user_data = $this->getClient($data);
        $user_star = $this->varchar2array($user_data[0]['like']);
        $res = array();
        foreach ($user_star as $u) {
            $news = $this->db->where(array("id" => $u))->get('news')->result_array();
            array_push($res, $news[0]);
        }
        return $res;
    }
    //根据id拉取用户信息
    public function getClient($data)
    {
        $res = $this->db->where(array("id" => $data))->get('clients')->result_array();
        return $res;
    }
    //更新用户信息
    public function updateClient($data)
    {
        $this->db->update('clients', $data, array('id' => $data['id']));
    }
    //拆分like和star
    public function varchar2array($data)
    {
        $data = explode("x", $data);
        return $data;
    }
    public function search($keywords)
    {
        $res = $this->db->like('biaoti', $keywords, 'both')->get('news')->result_array();
        p($res);
        die;
    }
}
