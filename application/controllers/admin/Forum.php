<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Forum extends CI_Controller
{
    public function news()
    {
        $this->load->model('forum_model', 'frmM');
        $data['news'] = $this->frmM->getNews();
        $data['comments'] = $this->frmM->news2comments($data['news']);
        $this->load->view('admin/templets/header', $data);
        $this->load->view('admin/templets/leftnav');
        $this->load->view('admin/news');
        $this->load->view('admin/templets/footer');
    }
}
