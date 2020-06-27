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
        $this->session->unset_userdata('admin');
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
            $res = $this->logM->adLogin($data);
            if($res){
                /*用户存在 */
                $this->session->set_userdata('admin',$data['id']);
                $this->session->set_userdata('admin_name',$data['username']);
                // echo $this->session->userdata('admin');
                $this->load->view('admin/templets/header');
                $this->load->view('admin/templets/leftnav');
                $this->load->view('admin/welcome');
                $this->load->view('admin/templets/footer');
                // $this->load->controller('admin/intro');
                // $this->intro->index();
            }else{
                /*用户不存在 */
                echo "<script>alert('用户名或密码错误')</script>";
                $this->index();
            }
        }else{
            $this->load->helper('form');
            // $this->load->view('admin/templets/header');
            // $this->load->view('admin/login');
            // $this->load->view('admin/templets/footer');
            $this->index();
        }
    }
    public function show_register(){
        $this->load->helper('form');
        $data['title'] = 'qk`admin';
        $this->load->view('admin/templets/header', $data);
        $this->load->view('admin/register');
        $this->load->view('admin/templets/footer');
        $this->session->unset_userdata('admin');
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
            $this->logM->adRegister($data);
            echo "<script>alert('注册成功')</script>";
        }else{
            $this->load->helper('form');
            // $this->load->view('admin/templets/header');
            // $this->load->view('admin/register');
            // $this->load->view('admin/templets/footer');
            $this->index();
        }
    }
}
