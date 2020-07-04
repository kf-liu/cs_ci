<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function index()
    {
        if (!isset($_SESSION['admin'])) redirect(site_url('admin/login'));
        $this->load->model('forum_model', 'frmM');
        $data['clients'] = $this->frmM->getClient();
        $this->load->helper('form');
        $this->load->view('admin/templets/header', $data);
        $this->load->view('admin/templets/leftnav');
        $this->load->view('admin/user');
        $this->load->view('admin/templets/footer');
    }
    public function resetPassword($id)
    {
        $this->load->model('user_model', 'userM');
        $this->userM->resetPassword($id);
        echo "<script>window.alert('已重置id".$id."的密码');</script>";
        $this->index();
        // redirect(site_url('admin/user'));
    }
}
