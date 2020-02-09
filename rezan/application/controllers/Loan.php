<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loan extends CI_Controller {

	public $model;
	public $controller;
	public $data;
	public $table;

	function __construct(){
		parent::__construct();
		$this->model = $this->loan_model;
		$this->controller = "loan";
		$this->table = "loan";
		$this->navigation = array("transactions","loan");
	}

	public function index()
	{
		$this->data['capitals'] = $this->capital_model->all();
		$this->data['borrowers'] = $this->borrower_model->all();
		$this->data['data'] = $this->loan_model->all();
		$this->load->view('parts/header');
		$this->load->view($this->controller."/".__FUNCTION__,$this->data);
		
	}

	public function detail($id)
	{
		$this->data['capitals'] = $this->capital_model->all();
		$this->data['borrowers'] = $this->borrower_model->all();
		$this->data['loan'] = $this->loan_model->loan($id);
		$this->data['total_collection'] = $this->collection_model->total_collection($id);
		$this->data['data'] = $this->collection_model->get_loan($id);
		// echo "<pre>";
		// print_r($this->data['total_collection']);
		// exit();
		$this->load->view('parts/header');
		$this->load->view($this->controller."/".__FUNCTION__,$this->data);
		
	}

	public function save()
	{
		$data['borrower_id'] = $_REQUEST['borrower_id'];
		$data['capital_id'] = $_REQUEST['capital_id'];
		$data['amount'] = $_REQUEST['amount'];
		$data['percentage'] = $_REQUEST['percentage'];
		$data['gives_per_month'] = $_REQUEST['gives_per_month'];
		$data['term'] = $_REQUEST['term'];
		$data['gives_payable'] = $_REQUEST['gives_payable'];
		$data['gives'] = $_REQUEST['gives'];
		$data['deadline'] = $_REQUEST['deadline'];
		$data['expected_receivable'] = $_REQUEST['expected_receivable'];
		$data['interest'] = $_REQUEST['interest'];
		
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
