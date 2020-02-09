<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

	public $model;
	public $controller;
	public $data;
	public $table;
	public $navigation;
	function __construct(){
		parent::__construct();
		$this->model = $this->collection_model;
		$this->controller = "report";
		$this->table = "report";
		$this->navigation = array("report","date_reports");
	}

	public function index()
	{

		$this->data['data'] = $this->collection_model->collection_today();
		$this->data['borrowers'] = $this->borrower_model->all();
		$this->data['loans'] = $this->loan_model->all();
		$this->data['total_collection_today'] = $this->collection_model->total_collection_today();
		$this->data['total_payers_today'] = $this->collection_model->total_payers_today();
		// echo "<pre>";
		// print_r($this->data['loans']);
		// exit();
		$this->load->view('parts/header');
		$this->load->view($this->controller."/".__FUNCTION__,$this->data);
		
	}
}
