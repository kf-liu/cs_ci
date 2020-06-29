<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Forum extends CI_Controller
{
    // 主页
    public function index($mode = "")
    {
        $data['title'] = 'my forum';
        $data['mode'] = $mode;
        $data['card_mode'] = 'small';

        $this->load->model('forum_model', 'frmM');
        $data['news'] = $this->frmM->getNews();
        $data['comments'] = $this->frmM->news2comments($data['news']);
        $this->loadNav($data);
        $this->load->view('client/forum/index');
        $this->load->view('client/login');
        $this->load->view('client/register');
    }
    //加载头部和两条导航栏
    public function loadNav($data)
    {
        if (!isset($data['title'])) $data['title'] = "my forum";
        if (!isset($data['mode'])) $data['mode'] = "";
        if (!isset($data['card_mode'])) $data['card_mode'] = "small";
        $data['client'] = $this->getClient();

        $this->load->helper('form');
        $this->load->view('client/templets/header', $data);
        $this->load->view('client/templets/nav');
        $this->load->view('client/forum/nav');
    }
    //拉取用户信息
    public function getClient()
    {
        if (isset($_SESSION['client'])) {
            $this->load->model('forum_model', 'frmM');
            $client = $this->frmM->getClient($_SESSION['client']);
            $client[0]['like'] = $this->varchar2array($client[0]['like']);
            $client[0]['star'] = $this->varchar2array($client[0]['star']);
            return $client[0];
        }
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
    // 去更新短讯
    public function goUpdate()
    {
        $data['news_id'] = $this->uri->segment(4);
        $this->load->model('forum_model', 'frmM');
        $data['news'] = $this->frmM->id2news($data['news_id']);
        $this->index();
        $this->load->view('client/forum/updateNews', $data);
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
            $this->index();
        } else {
            $this->load->helper('form');
            $this->goUpdate($this->input->post('news_id'));
        }
    }
    // 删除短讯
    public function deleteNews()
    {
        $data = array(
            'id' => $this->uri->segment(4)
        );
        $this->load->model('forum_model', 'frmM');
        $data['news'] = $this->frmM->deleteNews($data);
        $this->index();
    }
    // 长篇彩页
    public function lnews()
    {
        $this->load->view('client/forum/lnews');
    }
    //所有资讯
    public function allNews()
    {
        $this->load->model('forum_model', 'frmM');
        $data['news'] = $this->frmM->getNews();
        $data['comments'] = $this->frmM->news2comments($data['news']);
        $data['title'] = "所有资讯";
        $data['card_mode'] = 'small';
        $this->loadNav($data);
        $this->load->view('client/forum/allNews');
    }
    //所有评论
    public function allComments()
    {
        $data['title'] = "看评论";
        $this->load->model('forum_model', 'frmM');
        $data['comments'] = $this->frmM->allComments();
        $this->loadNav($data);
        $this->load->view('client/forum/allComments');
    }
    //我的发布
    public function myNews()
    {
        if (!$this->session->userdata('client')) {
            $this->index("loging");
        } else {
            $this->load->model('forum_model', 'frmM');
            $data['news'] = $this->frmM->author2news($this->session->userdata('client'));
            $data['comments'] = $this->frmM->news2comments($data['news']);
            $data['title'] = "我的发布";
            $this->loadNav($data);
            $this->load->view('client/forum/allNews');
        }
    }
    //从评论看某一条新闻
    public function aNews()
    {
        // echo $_SERVER['HTTP_REFERER']->uri->segment(7);die;
        $data['news_id'] = $this->uri->segment(4);
        $this->load->model('forum_model', 'frmM');
        $data['news'] = $this->frmM->id2news($data['news_id']);
        $data['comments'] = $this->frmM->news2comments($data['news']);
        $this->allComments();
        $data['title'] = '资讯详情';
        $this->load->view('client/forum/aNews', $data);
    }
    //拆分like和star
    public function varchar2array($data)
    {
        $data = explode("x", $data);
        return $data;
    }

    public function uploadLike($id, $news_like, $client_like)
    {
        $news['id'] = $id;
        $news['like_count'] = $news_like;
        $this->load->model('forum_model', 'frmM');
        $this->frmM->updateNews($news);
        $client['id'] = $_SESSION['client'];
        $client['like'] = $client_like;
        $this->frmM->updateClient($client);
    }
    public function uploadStar($id, $news_star, $client_star)
    {
        $news['id'] = $id;
        $news['star_count'] = $news_star;
        $this->load->model('forum_model', 'frmM');
        $this->frmM->updateNews($news);
        $client['id'] = $_SESSION['client'];
        $client['star'] = $client_star;
        $this->frmM->updateClient($client);
    }
}
