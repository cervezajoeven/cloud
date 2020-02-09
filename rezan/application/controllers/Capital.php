<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Capital extends CI_Controller {

	public $model;
	public $controller;
	public $data;
	public $table;
	function __construct(){
		parent::__construct();
		$this->model = $this->capital_model;
		$this->controller = "capital";
		$this->table = "capital";
		$this->navigation = array("manage","capitals");
	}

	public function index()
	{
		$this->data['loaners'] = $this->loaner_model->all();
		$this->data['data'] = $this->capital_model->total_loan();
		$this->load->view('parts/header');
		$this->load->view($this->controller."/".__FUNCTION__,$this->data);
		
	}

	public function save()
	{
		$data['amount'] = $_REQUEST['amount'];
		$data['loaner_id'] = $_REQUEST['loaner_id'];
		$data['remarks'] = $_REQUEST['remarks'];
		
		$this->model->save($data);

		redirect(base_url($this->controller));
	}

	public function edit($id)
	{
		$this->data['loaners'] = $this->loaner_model->all();
		$this->data['capital'] = $this->capital_model->get($id);
		$this->load->view('parts/header');
		$this->load->view($this->controller."/".__FUNCTION__,$this->data);
	}

	public function edit_save()
	{
		$data['id'] = $_REQUEST['id'];
		$data['amount'] = $_REQUEST['amount'];
		$data['loaner_id'] = $_REQUEST['loaner_id'];
		$data['remarks'] = $_REQUEST['remarks'];
		
		$this->model->update($data);

		redirect(base_url($this->controller));
	}

	public function delete($id)
	{

		$this->model->delete($id);

		redirect(base_url($this->controller));
	}

	public function log($id)
	{
		$this->data['loaners'] = $this->loaner_model->all();
		$this->data['loans'] = $this->loan_model->loans_list($id);
		$this->data['data'] = $this->capital_model->total_loan();
		$this->data['total_loan_list'] = $this->loan_model->total_loan_list($id);
		$this->load->view('parts/header');
		$this->load->view($this->controller."/".__FUNCTION__,$this->data);
		
	}
}
