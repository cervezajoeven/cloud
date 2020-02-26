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
        
        $this->sms_view(__FUNCTION__);
    }

    public function assigned(){
        $this->page_title = "Assigned";
        $this->data = $this->survey_model->assigned_survey($this->session->userdata('id'));
        $this->sms_view(__FUNCTION__);
    }

    public function respond($id){
        $this->data['survey_id'] = $id;
        $data['id'] = $id;

        $this->data['survey'] = $this->survey_model->get("survey",$data);
        $this->data['account_profile'] = $this->survey_model->ben_where("profile","account_id",$this->session->userdata('id'))[0];
        $this->db->select("*");
        $this->db->where("account_id",$this->data['account_profile']['account_id']);
        $this->db->where("survey_id",$id);
        $this->db->where("response_status",1);
        $query = $this->db->get("survey_sheets");
        $response = $query->result_array();
        if(!empty($response)){
            echo "<script>alert('Survey has already been responded');window.location.replace('".$this->ben_link('general/survey/assigned')."')</script>";
            
            $this->ben_view_ultraclear(__FUNCTION__);
        }else{
            $survey_data['survey_id'] = $id;
            $survey_data['account_id'] = $this->session->userdata('id');
            $this->survey_model->create_new("survey_sheets",$survey_data);
            $this->ben_view_ultraclear(__FUNCTION__);
        }
        
    }

    public function save(){
        
        $data['survey_name'] = $_REQUEST['survey_name'];
        $data['account_id'] = $this->session->userdata('id');
        $survey_id = $this->survey_model->create_new("survey",$data);

        $this->ben_redirect("general/survey/edit/".$survey_id);
    }

    public function edit($id){
        $this->data['survey_id'] = $id;
        $data['id'] = $id;
        $this->data['survey'] = $this->survey_model->get("survey",$data);
        $this->ben_view_ultraclear(__FUNCTION__);
    }

    public function update(){
        $data['id'] = $_REQUEST['id'];
        $data['sheet'] = $_REQUEST['sheet'];
        $data['assigned'] = '478,487,486,485,474,475,484,476,483,470,482,481,480,477,479,473,472,457,458,459,460,461,462,463,455,464,465,467,468,469,466,471,456,488,532,520,519,518,517,516,515,514,513,512,521,522,531,530,529,528,527,526,525,524,523,511,510,498,497,496,495,494,493,492,491,490,499,500,509,508,507,506,505,504,503,502,501,489,376,397,398,399,400,401,402,403,404,405,406,407,408,409,410,411,412,413,396,395,394,377,378,379,380,381,382,383,384,385,386,387,388,389,390,391,392,393,414,415,416,437,438,439,440,441,442,443,444,445,446,447,448,449,450,451,452,453,436,435,434,417,418,419,420,421,422,423,424,425,426,427,428,429,430,431,432,433,454,613,647,660,668,701,702,715,719,724,728,733,746,757,760,766,770,779,782,642,641,640,614,615,616,617,618,619,620,534,625,626,629,630,631,633,634,638,639,787,793,899,903,910,912,914,2083,2087,2089,2126,2127,2130,2137,2142,2147,2151,2159,2164,896,888,885,798,799,804,812,816,823,825,833,838,845,850,855,861,871,875,880,883,2277,612,533,555,556,557,558,559,560,561,562,563,564,565,566,567,568,569,570,571,554,553,552,535,536,537,538,539,540,541,542,543,544,545,546,547,548,549,550,551,572,573,594,595,596,597,598,599,600,601,602,603,604,605,606,607,608,609,610,593,592,591,574,575,576,577,578,579,580,581,582,583,584,585,586,587,588,589,590,611,168,157,156,155,154,153,152,151,150,158,159,167,166,165,164,163,162,161,160,149,148,147,136,135,134,133,132,131,130,129,137,138,146,145,144,143,142,141,140,139,128,209,198,197,196,195,194,193,192,191,199,200,208,207,206,205,204,203,202,201,190,189,188,177,176,175,174,173,172,171,170,178,179,187,186,185,184,183,182,181,180,169,127,85,74,73,72,71,70,69,68,67,75,76,84,83,82,81,80,79,78,77,66,65,64,53,52,51,50,49,48,47,46,54,55,63,62,61,60,59,58,57,56,45,126,115,114,113,112,111,110,109,108,116,117,125,124,123,122,121,120,119,118,107,106,105,94,93,92,91,90,89,88,87,95,96,104,103,102,101,100,99,98,97,86,210,334,323,322,321,320,319,318,317,316,324,325,333,332,331,330,329,328,327,326,315,314,313,302,301,300,299,298,297,296,295,303,304,312,311,310,309,308,307,306,305,294,375,364,363,362,361,360,359,358,357,365,366,374,373,372,371,370,369,368,367,356,355,354,343,342,341,340,339,338,337,336,344,345,353,352,351,350,349,348,347,346,335,293,251,240,239,238,237,236,235,234,233,241,242,250,249,248,247,246,245,244,243,232,231,230,219,218,217,216,215,214,213,212,220,221,229,228,227,226,225,224,223,222,211,292,281,280,279,278,276,275,277,274,282,283,291,290,289,288,287,286,285,284,273,272,271,261,260,259,258,257,256,255,254,253,252,262,263,264,265,266,267,270,269,268';

        $this->survey_model->update("survey",$data);
    }

    public function update_survey_sheet(){
        $data['survey_id'] = $_REQUEST['survey_id'];
        $data['respond'] = $_REQUEST['respond'];
        $data['account_id'] = $_REQUEST['account_id'];
        $data['response_status'] = 1;
        $this->db->select("*");
        $this->db->where("survey_id", $data["survey_id"]);
        $this->db->where("account_id", $data["account_id"]);
        $data['date_updated'] = date("Y-m-d H:i:s");
        $this->db->update("survey_sheets", $data);
    }

    public function upload($id){
        
        // print_r(strpos($_FILES['survey_form']['type'], "pdf"));

        if(strpos($_FILES['survey_form']['type'], "pdf")!==0){
            $tmp_name = $_FILES['survey_form']['tmp_name'];
            $file_name = $this->survey_model->id_generator("survey").".pdf";
            $dest = FCPATH."resources/uploads/survey/".$id."/".$file_name;
            if(!is_dir(FCPATH."resources/uploads/survey/".$id)){
                mkdir(FCPATH."resources/uploads/survey/".$id);
            }
            
            if(move_uploaded_file($tmp_name, $dest)){
                $data['id'] = $id;
                $data['survey_file'] = $file_name;
                $this->survey_model->update("survey",$data);
                echo "<script>alert('Successfully uploaded');window.location.replace('".$this->ben_link('general/survey/edit/'.$id)."')</script>";
            }
        }else{
            echo "<script>alert('Only PDF files are allowed');window.location.replace('".$this->ben_link('general/survey/edit/'.$id)."')</script>";
        }
        
    }

    public function delete($id){

        if($this->survey_model->delete_survey("survey",$id)){
            $this->ben_redirect("general/survey/index");
        }
    }
}
