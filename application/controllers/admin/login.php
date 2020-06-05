<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function index()
    {
        $this->load->helper('form');
        $data['title'] = 'qk`admin';
        $this->load->view('admin/templets/header', $data);
        $this->load->view('admin/login');
        $this->load->view('admin/templets/footer');
    }
    public function submit()
    {
        $this->load->library('form_validation');
        // $this->form_validation->set_rules('username','用户名','required');
        // $this->form_validation->set_rules('password','密码','required');
        // $this->form_validation->set_rules('yanzheng','验证码','required');
        $status = $this->form_validation->run('loginSub');
        if ($status) {
            $data=array(
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password')
            );
            $this->load->model('login_model','logM');
            $this->logM->login($data);
        }else{
            $this->load->helper('form');
            $this->load->view('admin/templets/header');
            $this->load->view('admin/login');
            $this->load->view('admin/templets/footer');
        }
    }
    public function show_register(){
        $this->load->helper('form');
        $data['title'] = 'qk`admin';
        $this->load->view('admin/templets/header', $data);
        $this->load->view('admin/register');
        $this->load->view('admin/templets/footer');
    }
    public function register()
    {
        $this->load->library('form_validation');
        $status = $this->form_validation->run('loginSub');
        if ($status) {
            $data=array(
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password')
            );
            $this->load->model('login_model','logM');
            $this->logM->register($data);
        }else{
            $this->load->helper('form');
            $this->load->view('admin/templets/header');
            $this->load->view('admin/register');
            $this->load->view('admin/templets/footer');
        }
    }
}
