<?php

class Capital_model extends CI_Model {

        public $table = "capital";

        public function save($data)
        {
                $this->name = $data['name'];
                $this->db->insert($this->table, $data);
        }

        public function all()
        {
                $this->db->select("*,capital.id as id");
                $this->db->join("loaner","loaner.id = capital.loaner_id");
                $this->db->where("capital.deleted",0);
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

        public function total_loan()
        {
                $this->db->select("
                        *,
                        capital.id as id,
                        (SELECT SUM(loan.amount) FROM loan WHERE capital_id = capital.id AND loan.deleted = 0) as capital_used
                ");
                $this->db->join("loaner","loaner.id = capital.loaner_id");
                $this->db->where("capital.deleted",0);
                $this->db->from($this->table);
                // echo "<pre>";
                // print_r($this->db->get()->result_array());
                // exit();
                return $this->db->get()->result_array();
        }

        public function loans()
        {
                $this->db->select("
                        *,
                        capital.id as id,
                ");
                $this->db->join("loaner","loaner.id = capital.loaner_id");
                $this->db->where("capital.deleted",0);
                $this->db->from($this->table);
                // echo "<pre>";
                // print_r($this->db->get()->result_array());
                // exit();
                return $this->db->get()->result_array();
        }

}