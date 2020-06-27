<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Forum extends CI_Controller
{
    public function index($mode = "")
    {
        $data['title'] = 'my forum';
        $data['mode'] = $mode;

        $this->load->model('forum_model', 'frmM');
        $data['news'] = $this->frmM->getNews();
        $data['comments'] = $this->frmM->news2comments($data);

        $this->load->view('client/templets/header', $data);
        $this->load->view('client/templets/nav');
        $this->load->view('client/forum/nav');
        $this->load->view('client/forum/index');
        $this->load->helper('form');
        $this->load->view('client/login');
        $this->load->view('client/register');
    }
    public function login()
    {
        $this->load->library('form_validation');
        $status = $this->form_validation->run('loginSub');
        if ($status) {
            $data = array(
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password')
            );
            $this->load->model('login_model', 'logM');
            $res = $this->logM->cliLogin($data);
            if ($res) {
                /*用户存在 */
                $this->session->set_userdata('client', $res[0]['id']);
                $this->session->set_userdata('client_name', $res[0]['username']);
                $this->index();
            } else {
                /*用户不存在 */
                echo "<script>alert('用户名或密码错误')</script>";
                $this->index("loging");
            }
        } else {
            $this->load->helper('form');
            $this->index("loging");
        }
    }
    public function logout($mode = "")
    {
        $this->session->unset_userdata('client');
        $this->index($mode);
    }
}
