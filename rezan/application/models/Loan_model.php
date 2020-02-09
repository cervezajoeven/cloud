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
                $this->db->select("*,
                        loan.id as id,
                        loan.amount as amount,
                ");
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

        public function total_loan()
        {
                $this->db->select("
                        *,
                        capital.id as id,
                        (SELECT SUM(loan.amount) FROM loan WHERE capital_id = capital.id ) as capital_used
                ");
                $this->db->join("loaner","loaner.id = capital.loaner_id");
                $this->db->where("capital.deleted",0);
                $this->db->from($this->table);
                // echo "<pre>";
                // print_r($this->db->get()->result_array());
                // exit();
                return $this->db->get()->result_array();
        }

        public function loan($id)
        {
                $this->db->select("*,
                        loan.id as id,
                        loan.amount as amount,
                ");
                $this->db->join("borrower","borrower.id = loan.borrower_id");
                $this->db->join("capital","capital.id = loan.capital_id");
                $this->db->where("loan.id",$id);
                $this->db->order_by("loan.id","desc");
                $this->db->from($this->table);
                return $this->db->get()->result_array()[0];
        }


        public function loans_list($id)
        {
                $this->db->select("
                        *,
                        loan.amount as amount,
                ");
                $this->db->join("capital","loan.capital_id = capital.id");
                $this->db->join("borrower","loan.borrower_id = borrower.id");
                $this->db->where("loan.deleted",0);
                $this->db->where("capital.id",$id);
                $this->db->from($this->table);
                // echo "<pre>";
                // print_r($this->db->get()->result_array());
                // exit();
                return $this->db->get()->result_array();
        }

        public function total_loan_list($id)
        {
                $this->db->select("
                        *,
                        SUM(loan.amount) as total_amount,
                ");
                $this->db->join("capital","loan.capital_id = capital.id");
                $this->db->join("borrower","loan.borrower_id = borrower.id");
                $this->db->where("capital.id",$id);
                $this->db->where("loan.deleted",0);
                $this->db->from($this->table);
                // echo "<pre>";
                // print_r($this->db->get()->result_array());
                // exit();
                return $this->db->get()->result_array()[0]['total_amount'];
        }


}