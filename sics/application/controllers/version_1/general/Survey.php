<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Survey extends BEN_General {
    public $current_function;
    function __construct() {

        parent::__construct();
        $this->module_folder = "general";
        
        $this->view_folder = strtolower(get_class());
        $this->load->model("version_".$this->app_version.'/general/'.'survey_model');
    }

    public function index(){
        $this->page_title = "Survey Lists";
        $this->data = $this->survey_model->all_survey();
        // echo "<pre>";
        // print_r($this->survey_model->all_survey());
        // exit();
        $this->sms_view(__FUNCTION__);
    }

    public function save(){
        
        $data['survey_name'] = $_REQUEST['survey_name'];
        $data['account_id'] = $this->session->userdata('id');
        $this->survey_model->create_new("survey",$data);
        $this->ben_redirect("general/survey/edit");
    }

    public function edit(){
            
        $this->ben_view_ultraclear(__FUNCTION__);
    }

    public function delete($id){

        if($this->survey_model->delete_survey("survey",$id)){
            $this->ben_redirect("general/survey/index");
        }
    }
}
