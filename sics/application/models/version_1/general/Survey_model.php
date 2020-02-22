<?php
class Survey_model extends BEN_Model {

	public $table = "survey";

	public function all_survey(){

        $this->db->select('*,survey.date_created as date_created, survey.id as id');
        $this->db->from('survey');
        $this->db->join('profile', 'profile.account_id = survey.account_id','left');
        $this->db->where('survey.deleted',0);
        $this->db->order_by('survey.date_created',"desc");

        $query = $this->db->get();

        $return = $query->result_array();
        return $return;
    }

    public function delete_survey($table,$id){
        $data['id'] = $id;
        $data['deleted'] = 1;
        
        $this->db->where('id',$id);
        $this->survey_model->update($table,$data);
        return true;
    }
	
}
