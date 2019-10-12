<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Schedule extends BEN_General {
    public $current_function;
    function __construct() {

        parent::__construct();
        $this->module_folder = "general";
        $this->page_title = "Schedule";
        $this->view_folder = strtolower(get_class());
        $this->load->model("version_".$this->app_version.'/general/'.'schedule_model');
    }

    public function index(){
        $this->toggled = array("my_schedule");
        $account_id = $this->session->userdata('id');
        $this->data['schedule'] = $this->schedule_model->ben_where('schedule',"account_id",$account_id);
        $this->data['sections'] = $this->schedule_model->all('section');
        
        $this->sms_view(__FUNCTION__);
    }

    public function save(){
        
        $data['account_id'] = $_REQUEST['account_id'];
        $data['schedule'] = $_REQUEST['schedule'];
        $find_data = $this->schedule_model->ben_where('schedule',"account_id",$data['account_id']);
        if(empty($find_data)){
            if($id = $this->schedule_model->create_new("schedule",$data)){
                echo "success";
            }else{
                echo "failed";
            }
        }else{
            $data['id'] = $find_data[0]['id'];
            if($id = $this->schedule_model->update("schedule",$data)){
                echo "update success";
            }else{
                echo "update failed";
            }
        }
        
        
    }

    

}
