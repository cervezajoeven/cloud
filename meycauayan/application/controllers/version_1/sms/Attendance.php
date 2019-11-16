<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Attendance extends BEN_General {

    public $current_function;
    function __construct() {

        parent::__construct();
        $this->module_folder = "sms";
        $this->page_title = "Attedance";
        $this->view_folder = strtolower(get_class());
        $this->load->model("version_".$this->app_version.'/sms/'.'attendance_model');

    }

    public function log(){
        $this->toggled = array("attendance","attendance_log");
        $this->data['all_data'] = $this->attendance_model->log();
        // echo "<pre>";
        // print_r($this->data['all_data']);
        // exit;
        $this->sms_view(__FUNCTION__);
    }
    public function summary(){

    }
   

}
