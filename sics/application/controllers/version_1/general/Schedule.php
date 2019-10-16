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

    public function index($grade=""){
        $this->toggled = array("my_schedule");
        $account_id = $this->session->userdata('id');
        $this->data['schedule'] = $this->schedule_model->ben_where('schedule',"account_id",$account_id);
        $this->lesson_model->optimize_lessons();
        $this->data['lesson_schedule'] = $this->lesson_model->lesson_schedule(urldecode($grade));
        // print_r("<pre>");
        // print_r(count($this->data['lesson_schedule']));
        // print_r(urldecode($grade));
        // exit;
        $color_array = array("#1b7d36","#32a852","#09541e","#163d20");
        foreach ($this->data['lesson_schedule'] as $lesson_schedule_key => $lesson_schedule_value) {
            $lesson_schedule_json[$lesson_schedule_key] = new stdClass();
            $lesson_schedule_json[$lesson_schedule_key]->title = html_entity_decode($lesson_schedule_value['lesson_name']);
            $lesson_schedule_json[$lesson_schedule_key]->start = date("c",strtotime($lesson_schedule_value['start_date']));
            $lesson_schedule_json[$lesson_schedule_key]->end = date("c",strtotime($lesson_schedule_value['end_date']));
            $lesson_schedule_json[$lesson_schedule_key]->allDay = false;
            $lesson_schedule_json[$lesson_schedule_key]->color = $color_array[rand(0,2)];
        }
        // print_r($lesson_schedule_json);
        // exit();
        $this->data['lesson_schedule'] = json_encode($lesson_schedule_json);

        // {
        //     "title": "Test - Zamboanga",
        //     "start": "2019-09-22T21:00:00.000Z",
        //     "end": "2019-09-25T07:30:00.000Z",
        //     "allDay": false,
        //     "color": "#D81689",
        //     "section_id": "12",
        //     "section": "Zamboanga",
        //     "topic": "Test"
        // }
        // exit();
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
