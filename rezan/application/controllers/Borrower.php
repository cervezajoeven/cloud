<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Borrower extends CI_Controller {

	public $model;
	public $controller;
	public $data;
	public $table;
	function __construct(){
		parent::__construct();
		$this->model = $this->borrower_model;
		$this->controller = "borrower";
		$this->table = "borrower";
		$this->navigation = array("manage","borrowers");
	}

	public function index()
	{
		$this->data['data'] = $this->borrower_model->all();
		$this->load->view('parts/header');
		$this->load->view($this->controller."/".__FUNCTION__,$this->data);
		
	}

	public function save()
	{
		$data['name'] = $_REQUEST['name'];
		
		$this->model->save($data);

		redirect(base_url($this->controller));
	}

	public function edit($id)
	{
		$this->data['borrower'] = $this->borrower_model->get($id);
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
