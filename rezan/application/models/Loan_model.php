<?php

class Loan_model extends CI_Model {

        public $table = "loan";

        public function save($data)
        {
                $this->name = $data['name'];
                $this->db->insert($this->table, $data);
        }

        public function all()
        {
                $this->db->select("*,loan.id as id,loan.amount as amount");
                $this->db->join("borrower","borrower.id = loan.borrower_id");
                $this->db->join("capital","capital.id = loan.capital_id");
                $this->db->where("loan.deleted",0);
                $this->db->order_by("loan.id","desc");
                $this->db->from($this->table);
                return $this->db->get()->result_array();
        }

        public function get($id)
        {
                $this->db->select("*");
                $this->db->from($this->table);
                $this->db->where("id",$id);
                return $this->db->get()->result_array()[0];
        }

        public function update($data)
        {
                $this->db->where("id",$data['id']);
                $this->db->update($this->table,$data);
        }

        public function delete($id)
        {       
                $data['id'] = $id;
                $data['deleted'] = 1;

                $this->db->where("id",$id);
                if($this->db->update($this->table,$data)){
                        return true;
                }
                return false;
                
        }

}