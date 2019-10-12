<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends BEN_General {

    function __construct() {

        parent::__construct();
        $this->module_folder = "general";
        $this->page_title = "Dashboard";
        $this->view_folder = "dashboard";
    }

    public function index(){
        $this->data['banner_data'] = $this->banner_model->all('banner');
        $this->data['announcement_data'] = $this->announcement_model->announcement_account_profile();
        $this->ben_view(__FUNCTION__);
    }

    public function sms_index(){
        $this->data['banner_data'] = $this->banner_model->all('banner');
        $this->data['announcement_data'] = $this->announcement_model->announcement_account_profile();
        $this->sms_view(array("view"=>"sms_index"));
        
    }

    public function about_us(){
        $this->ben_view(__FUNCTION__);
    }

    public function contact_us(){
        $this->ben_view(__FUNCTION__);
    }

    public function portal(){
        $this->ben_view(__FUNCTION__);
    }

    public function admission(){
        
        $this->ben_view_ultraclear(__FUNCTION__);

    }


}
