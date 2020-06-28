<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Forum extends CI_Controller
{
    // 主页
    public function index($mode = "")
    {
        $data['title'] = 'my forum';
        $data['mode'] = $mode;

        $this->load->model('forum_model', 'frmM');
        $data['news'] = $this->frmM->getNews();
        $data['comments'] = $this->frmM->news2comments($data);

        $this->load->helper('form');
        $this->load->view('client/templets/header', $data);
        $this->load->view('client/templets/nav');
        $this->load->view('client/forum/nav');
        $this->load->view('client/forum/index');
        $this->load->view('client/login');
        $this->load->view('client/register');
    }
    // 登录
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
    // 登出
    public function logout($mode = "")
    {
        $this->session->unset_userdata('client');
        $this->index($mode);
    }
    public function register()
    {
        $this->load->library('form_validation');
        $status = $this->form_validation->run('loginSub');
        if ($status) {
            $data = array(
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password')
            );
            $this->load->model('login_model', 'logM');
            $this->logM->cliRegister($data);
            echo "<script>alert('注册成功 请登录')</script>";
            $this->index("loging");
        } else {
            $this->load->helper('form');
            $this->index("registering");
        }
    }
    // 添加短讯
    public function addNews()
    {
        if (!$this->session->userdata('client')) {
            $this->index("loging");
        } else {
            $this->load->library('form_validation');
            $status = $this->form_validation->run('newsSub');
            if ($status) {
                $data = array(
                    'biaoti' => $this->input->post('biaoti'),
                    'zhaiyao' => $this->input->post('zhaiyao'),
                    'zhengwen' => $this->input->post('zhengwen'),
                    'author_id' => $this->session->userdata('client'),
                    'author_name' => $this->session->userdata('client_name'),
                );
                $this->load->model('forum_model', 'frmM');
                $this->frmM->addNews($data);
                $this->index();
            } else {
                $this->load->helper('form');
                $this->index();
            }
        }
    }
    // 评论短讯
    public function addComments()
    {
        if (!$this->session->userdata('client')) {
            $this->index("loging");
        } else {
            $this->load->library('form_validation');
            $status = $this->form_validation->run('commentsSub');
            if ($status) {
                $data = array(
                    'news_id' => $this->input->post('news_id'),
                    'user_id' => $this->session->userdata('client'),
                    'username' => $this->session->userdata('client_name'),
                    'words' => $this->input->post('comments')
                );
                $this->load->model('forum_model', 'frmM');
                $this->frmM->addComments($data);
                $this->index();
            } else {
                $this->load->helper('form');
                $this->index();
            }
        }
    }
    public function goUpdate()
    {
        $data['news_id'] = $this->uri->segment(4);
        $this->load->model('forum_model', 'frmM');
        $data['news'] = $this->frmM->id2news($data['news_id']);
        $this->index();
        $this->load->view('client/forum/updateNews', $data);
    }
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
            $this->index();
        } else {
            $this->load->helper('form');
            $this->goUpdate($this->input->post('news_id'));
        }
    }
    public function deleteNews()
    {
        $data = array(
            'id' => $this->uri->segment(4)
        );
        $this->load->model('forum_model', 'frmM');
        $data['news'] = $this->frmM->deleteNews($data);
        $this->index();
    }
}
