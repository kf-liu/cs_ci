<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function index()
	{
		$data['title']='qk`长沙';
		$this->load->view('client/templets/header',$data);
		$this->load->view('client/home');
		$this->load->view('client/templets/footer');
	}
}
