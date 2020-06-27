<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function index($page='index')
	{
		$data['title']='星城长沙';
        $this->heads($data);
        $this->load->view('client/'.$page);
        $this->load->view('client/templets/footer');
	}
	public function heads($data){
        $this->load->view('client/templets/header', $data);
        $this->load->view('client/templets/banner');
        $this->load->view('client/templets/nav');
	}
	public function intro()
	{
		$data['title']='长沙简介';
        $this->load->model('intro_model', 'introM');
        $data['intros'] = $this->introM->getIntro();
        $this->heads($data);
        $this->load->view('client/introduce');
        $this->load->view('client/templets/footer');
	}
	public function food()
	{
		$data['title']='吃在长沙';
        $this->heads($data);
        $this->load->view('client/food');
        $this->load->view('client/templets/footer');
	}
	public function go()
	{
		$data['title']='自助行';
        $this->heads($data);
        $this->load->view('client/go1');
        $this->load->view('client/templets/footer');
        $this->load->view('client/go2');
	}
	public function record()
	{
		$data['title']='自助行';
        $this->heads($data);
        $this->load->view('client/record');
        $this->load->view('client/templets/footer');
	}
	// public function forum()
	// {
	// 	$data['title']='my forum';
    //     $this->load->view('client/templets/header', $data);
    //     $this->load->view('client/templets/nav');
    //     $this->load->view('client/forum/nav');
    //     $this->load->view('client/forum/index');
    //     $this->load->view('client/login');
	// }
}
