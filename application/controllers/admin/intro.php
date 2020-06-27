<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Intro extends CI_Controller
{
    public function index()
    {
        if (!$this->session->userdata('admin')) exit('您尚未登录');
        $this->load->model('intro_model', 'introM');
        $data['intros'] = $this->introM->getIntro();
        $this->load->view('admin/templets/header');
        $this->load->view('admin/templets/leftnav');
        $this->load->view('admin/intro', $data);
        $this->load->view('admin/templets/footer');
    }
    public function update()
    {
        if (!$this->session->userdata('admin')) exit('您尚未登录');
        $data = array(
            'cid' => $this->input->post('cid'),
            'cname' => $this->input->post('cname'),
            'cintro' => $this->input->post('intro')
        );
        $this->load->model('intro_model', 'introM');
        $this->introM->update($data);
        // echo "<script>alert('更新成功')</script>";
        $data['suc'] = "修改成功";
        $this->load->view('admin/templets/suc', $data);
        $this->index();
        // echo '<script language="JavaScript">location.href="'.site_url('admin/intro/index').'";</script>;';
    }
    public function newIntro()
    {
        if (!$this->session->userdata('admin')) exit('您尚未登录');
        $data = array(
            'cname' => $this->input->post('cname')
        );
        $this->load->model('intro_model', 'introM');
        $this->introM->insert($data);
        $data['suc'] = "添加成功";
        $this->load->view('admin/templets/suc', $data);
        $this->index();
    }
    public function delIntro()
    {
        if (!$this->session->userdata('admin')) exit('您尚未登录');
        $data = array(
            'cid' => $this->input->post('selected')
        );
        $this->load->model('intro_model', 'introM');
        $this->introM->delete($data);
        $data['suc'] = "删除成功";
        $this->load->view('admin/templets/suc', $data);
        $this->index();
    }
}
