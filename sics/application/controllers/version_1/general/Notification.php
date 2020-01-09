<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notification extends BEN_General {
    public $current_function;
    function __construct() {

        parent::__construct();
        $this->module_folder = "general";
        $this->page_title = "Notification";
        $this->view_folder = strtolower(get_class());
        
    }

    public function text_blast(){
        // echo "<pre>";
        // print_r($this->section_model->all("section"));
        // exit();
        $this->data['sections'] = $this->section_model->sections();
        $this->sms_view(__FUNCTION__);
    }

    public function text_blast_send(){
        $sms_message = $_REQUEST['sms_message'];
        
        $this->db->where('account_type_id', 4);
        $this->db->select("*");

        $the_accounts = $this->account_model->accounts("account");

        foreach ($the_accounts as $key => $value) {
            $data = array(
                'account_id' => $value['id'],
                'sms_message' => $sms_message,
                'sms_number' => $value['guardian_contact_number'],
                'sms_status' => "FOR SENDING",
            );

            $this->account_model->create_new("sms_notification",$data);
        }
        
    }
}
