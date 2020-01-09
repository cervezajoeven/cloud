<?php
class Attendance_model extends BEN_Model {

	public $table = "sms_grades";

	public function log($account_id){
		$this->db->select("
			*
		");
		$this->db->from("attendance");
		$this->db->join('profile', 'profile.account_id = attendance.account_id','left');
		$this->db->join('classes', 'classes.account_id = attendance.account_id','left');
		$this->db->join('section', 'section.id = classes.section_id','left');
		$this->db->join('grade', 'grade.id = section.grade_id','left');
		$this->db->where('attendance.account_id',$account_id);

		$this->db->order_by('attendance.date_created','asc');
		return $this->db->get()->result_array();
	}

}