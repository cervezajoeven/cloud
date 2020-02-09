<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Collection extends CI_Controller {

	public $model;
	public $controller;
	public $data;
	public $table;
	public $navigation;
	function __construct(){
		parent::__construct();
		$this->model = $this->collection_model;
		$this->controller = "collection";
		$this->table = "collection";
		$this->navigation = array("transactions","collection");
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

	public function save()
	{
		$data['loan_id'] = $_REQUEST['loan_id'];
		$data['amount'] = $_REQUEST['amount'];
		$data['date'] = $_REQUEST['date'];
		
		$this->model->save($data);

		redirect(base_url($this->controller));
	}

	public function edit($id)
	{
		$this->data['data'] = $this->collection_model->all();
		$this->data['borrowers'] = $this->borrower_model->all();
		$this->data['loans'] = $this->loan_model->all();
		$this->load->view('parts/header');
		$this->load->view($this->controller."/".__FUNCTION__,$this->data);
	}

	public function edit_save()
	{
		$data['id'] = $_REQUEST['id'];
		$data['name'] = $_REQUEST['name'];
		$this->model->update($data);

		redirect(base_url($this->controller));
	}

	public function delete($id)
	{

		$this->model->delete($id);

		redirect(base_url($this->controller));
	}
}
