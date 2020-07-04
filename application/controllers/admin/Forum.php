<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Forum extends CI_Controller
{
    public function index()
    {
        if (!isset($_SESSION['admin'])) redirect(site_url('admin/login'));
        $this->load->model('forum_model', 'frmM');
        $data['news'] = $this->frmM->getNews();
        $data['comments'] = $this->frmM->news2comments($data['news']);
        $this->load->helper('form');
        $this->load->view('admin/templets/header', $data);
        $this->load->view('admin/templets/leftnav');
        $this->load->view('admin/news');
        $this->load->view('admin/templets/footer');
    }
    // 删除短讯
    public function deleteNews()
    {
        $data = array(
            'id' => $this->uri->segment(4)
        );
        $this->load->model('forum_model', 'frmM');
        $data['news'] = $this->frmM->deleteNews($data);
        redirect(site_url('admin/forum'));
    }
    // 去更新短讯
    public function goUpdate($new_id)
    {
        $data['news_id'] = $new_id;
        $this->load->model('forum_model', 'frmM');
        $data['news'] = $this->frmM->id2news($data['news_id']);
        $this->index();
        $this->load->view('admin/updateNews', $data);
    }
    // 更新短讯
    public function updateNews()
    {
        $this->load->library('form_validation');
        $status = $this->form_validation->run('newsSub');
        if ($status) {
            $data = array(
                'id' => $this->input->post('news_id'),
                'biaoti' => $this->input->post('biaoti'),
                'zhaiyao' => $this->input->post('zhaiyao'),
                'zhengwen' => $this->input->post('zhengwen'),
            );
            $this->load->model('forum_model', 'frmM');
            $this->frmM->updateNews($data);
            redirect(site_url('admin/forum'));
        } else {
            $this->load->helper('form');
            $this->goUpdate($this->input->post('news_id'));
        }
    }
    // 删除评论
    public function deleteComments()
    {
        $data = array(
            'id' => $this->uri->segment(4)
        );
        $this->load->model('forum_model', 'frmM');
        $data['news'] = $this->frmM->deleteComments($data);
        redirect(site_url('admin/forum'));
    }
    public function search($keywords = null, $news_id = null)
    {
        $data['keywords'] = $this->input->post('keywords');
        if (isset($keywords)) $data['keywords'] = urldecode($keywords);
        $this->load->model('forum_model', 'frmM');
        $data['result'] = $this->frmM->search($data['keywords']);
        $data['title'] = '"' . $data['keywords'] . '"' . " 搜索结果";
        $this->load->helper('form');
        $this->load->view('admin/templets/header', $data);
        $this->load->view('client/forum/search', $data);
        if (isset($news_id)) $this->aNews($news_id);
    }
}
