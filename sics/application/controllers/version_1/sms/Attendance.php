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

    public function log($account_id=0){
        $this->toggled = array("attendance","attendance_log");
        if($account_id!=0){
            
            $this->data['all_data'] = $this->attendance_model->log($account_id);

        }
        
        // echo "<pre>";
        // print_r($this->data['all_data']);
        // exit;
        $this->sms_view(__FUNCTION__);
    }
    public function log_ajax(){
        // $this->data['all_data'] = $this->attendance_model->log($account_id); 
        $log_ajax = array("data"=>array(
            array("dog","feguu","klj","quick","brown"),
            array("fox","jumps","over","the","lazy"),
            array("fox","jumps","over","the","lazy"),
            array("fox","jumps","over","the","lazy"),
            array("fox","jumps","over","the","lazy"),
            array("foasdx","jumps","over","the","lazy"),
            array("fox","jumps","over","the","lazy"),
            array("fox","jumps","over","the","lazy"),
            array("fox","jumps","over","the","lazy"),
            array("fox","jumps","over","the","lazy"),
            array("fox","jumps","over","the","lazy"),
            array("fox","jumps","over","the","lazy"),
            array("fox","jumps","over","the","lazy"),
            array("fox","jumps","over","the","lazy"),
            array("fox","jumps","over","the","lazy"),
            array("fox","jumps","over","the","lazy"),
            array("fox","jumps","over","the","lazy"),
            array("fox","jumps","over","the","lazy"),
            array("fox","jumps","over","the","lazy"),
            array("fox","jumps","over","the","lazy"),
            array("fox","jumps","over","the","lazy"),
            array("fox","jumps","over","the","lazy"),
            array("fox","jumps","over","the","lazy"),
            array("fox","jumps","over","the","lazy"),
            array("fox","jumps","over","the","lazy"),
            array("fox","jumps","over","the","lazy"),
            array("fox","jumps","over","the","lazy"),
            array("fox","jumps","over","the","lazy"),
            array("fox","jumps","over","the","lazy"),
            array("fox","jumps","ovssssssser","the","lazy"),
            array("fox","jumps","over","the","lazy"),
            array("fox","jumps","joeven","the","lazy"),
            array("fox","jumps","over","the","lazy"),
            array("fox","jumps","over","the","lazy"),
            array("fox","jumps","over","the","lazy"),
            array("fox","jumps","over","the","lazy"),
            array("fox","jumps","over","the","lazy"),
        ));
        // $log_ajax = array("asd","asd","asd","asd","asd");
        echo json_encode($log_ajax);
        // return json_encode($log_ajax); 
    }
   

}
