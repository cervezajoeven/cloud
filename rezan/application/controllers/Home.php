<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Public_Controller {

    public function __construct()
    {
        parent::__construct();
    }


	public function index()
	{
		// print_r($this->session->userdata());
		// print_r("SHET");
		$this->load->view('public/home', $this->data);
	}
}
