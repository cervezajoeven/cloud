<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Survey_report extends BEN_General {
    public $current_function;
    function __construct() {

        parent::__construct();
        $this->module_folder = "general";
        
        $this->view_folder = strtolower(get_class());
        $this->load->model("version_".$this->app_version.'/general/'.'survey_report_model');
    }

    public function index(){
        $this->page_title = "Survey Report";
        $this->data = $this->survey_report_model->all_survey();
        $this->sms_view(__FUNCTION__);
    }

    public function respond($id="") {
        $this->page_title = "Survey Result";
        $survey_sheets = $this->survey_report_model->survey_sheets($id);
        $this->data = $survey_sheets;
        //echo($survey_sheets[0]['respond']);
        //var_dump($survey_sheets);

        // $responses['data'] = array();
        // $array_pos = 0;
        
        // foreach ($survey_sheets as $row) {
        //     $json_respond = json_decode($row['respond']);
        //     //var_dump($json_respond);
        //     $answers_count['data'] = array();
        //     $resp_pos = 0;

        //     foreach($json_respond as $respond) {
        //         //var_dump($respond);
                
        //         if (strpos($respond->answer, '1') > -1) {
        //             if ($array_pos == 0) {
        //                 $responses['data'][] = array (
        //                     'answer_choices' => '',
        //                     'respondents' => 1,
        //                     'answers_count' =>  explode(',', $respond->answer)
        //                 );
        //             } else {
        //                 $responses['data'][$resp_pos]['respondents'] = $responses['data'][$resp_pos]['respondents'] + 1;

        //                 $answer = explode(',', $respond->answer);
        //                 $answerIdx = 0;
        //                 foreach($answer as $ans) {
        //                     $responses['data'][$resp_pos]['answers_count'][$answerIdx] = (string)((int)$responses['data'][$resp_pos]['answers_count'][$answerIdx] + (int)$ans);
        //                     $answerIdx++;
        //                 }
        //             }
                    
        //         } else {
        //             if ($array_pos == 0) {
        //                 $responses['data'][] = array (
        //                     'answer_choices' => '',
        //                     'respondents' => 0,
        //                     'answers_count' => explode(',', $respond->answer)
        //                 );
        //             }
        //         }

        //         //var_dump($responses['data']);
        //         $resp_pos++;
        //     }

        //     //var_dump($responses['data'][$array_pos]['respondents']);
            
        //     $array_pos++;
        // }
        // //var_dump($responses['data']);

        $this->ben_view_ultraclear(__FUNCTION__);
    }

    public function get_responses($id) {
        $survey = $this->survey_report_model->survey($id);
        $survey_responses = $this->survey_report_model->survey_responses($id);
        $json_sheet = json_decode($survey[0]['sheet']);
        $responses['data'] = array();
        $array_pos = 0;

        //var_dump($json_sheet[0]->type);
        
        foreach ($survey_responses as $row) {
            $json_respond = json_decode($row['respond']);
            //var_dump($json_respond);
            $answers_count['data'] = array();
            $resp_pos = 0;

            foreach($json_respond as $respond) {
                //var_dump($respond);
                
                if (strpos($respond->answer, '1') > -1) {
                    if ($array_pos == 0) {
                        $responses['data'][] = array (
                            'answer_choices' => explode(',', $json_sheet[$resp_pos]->option_labels),
                            'respondents' => 1,
                            'answers_count' =>  explode(',', $respond->answer)
                        );
                    } else {
                        $responses['data'][$resp_pos]['respondents'] = $responses['data'][$resp_pos]['respondents'] + 1;

                        $answer = explode(',', $respond->answer);
                        $answerIdx = 0;
                        foreach($answer as $ans) {
                            $responses['data'][$resp_pos]['answers_count'][$answerIdx] = (string)((int)$responses['data'][$resp_pos]['answers_count'][$answerIdx] + (int)$ans);
                            $answerIdx++;
                        }
                    }
                    
                } else {
                    if ($array_pos == 0) {
                        $responses['data'][] = array (
                            'answer_choices' => explode(',', $json_sheet[$resp_pos]->option_labels),
                            'respondents' => 0,
                            'answers_count' => explode(',', $respond->answer)
                        );
                    }
                }

                //var_dump($responses['data']);
                $resp_pos++;
            }

            //var_dump($responses['data'][$array_pos]['respondents']);
            
            $array_pos++;
        }
        //var_dump($responses['data']);

        echo json_encode($responses['data']);
    }
}
