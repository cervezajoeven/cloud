<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$this->load->view('parts/header');
		$this->load->view('index');
		$this->load->view('parts/footer');
	}

	public function borrow()
	{
		$this->load->view('parts/header');
		$this->load->view(__FUNCTION__,$view_data);
		$this->load->view('parts/footer');
	}

	public function capital()
	{
		$this->load->view('parts/header');
		$this->load->view(__FUNCTION__);
		$this->load->view('parts/footer');
	}

	
}
