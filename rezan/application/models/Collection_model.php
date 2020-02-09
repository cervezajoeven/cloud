<?php

class Collection_model extends CI_Model {

        public $table = "collection";

        public function save($data)
        {
                $this->name = $data['name'];
                $this->db->insert($this->table, $data);
        }

        public function all()
        {
                $this->db->select("*, collection.id as id, collection.amount as amount");
                $this->db->join("loan","loan.id = collection.loan_id");
                $this->db->join("borrower","borrower.id = loan.borrower_id");
                $this->db->join("capital","capital.id = loan.capital_id");
                $this->db->where("loan.deleted",0);
                $this->db->order_by("collection.id","desc");
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

        public function get_where($where,$value)
        {
                $this->db->select("*");
                $this->db->from($this->table);
                $this->db->where($where,$value);
                return $this->db->get()->result_array()[0];
        }

        public function get_loan($id)
        {
                $this->db->select("
                        *,
                        collection.amount as amount,
                        collection.id as id,
                        collection.amount as amount,
                        collection.date_created as date_created,
                ");
                $this->db->from($this->table);
                $this->db->join('loan', 'collection.loan_id = loan.id');
                $this->db->join('borrower', 'loan.borrower_id = borrower.id');
                $this->db->where("loan_id",$id);
                return $this->db->get()->result_array();
        }

        public function total_collection($id)
        {
                $this->db->select("SUM(collection.amount) as amount");
                $this->db->from($this->table);
                $this->db->join('loan', 'collection.loan_id = loan.id');
                $this->db->join('borrower', 'loan.borrower_id = borrower.id');
                $this->db->where("loan_id",$id);
                $this->db->where("collection.deleted",0);
                return $this->db->get()->result_array()[0];
        }

        public function collection_today()
        {
                $this->db->select("*, collection.id as id, collection.amount as amount, collection.date_created as date_created");
                $this->db->join("loan","loan.id = collection.loan_id");
                $this->db->join("borrower","borrower.id = loan.borrower_id");
                $this->db->join("capital","capital.id = loan.capital_id");
                $this->db->where("loan.deleted",0);
                $this->db->where("collection.date_created >",date("Y-m-d")." 00:00:00");
                $this->db->order_by("collection.id","desc");
                $this->db->from($this->table);
                // echo "<pre>";
                // print_r($this->db->get()->result_array());
                // exit;
                return $this->db->get()->result_array();
        }

        public function total_collection_today()
        {
                $this->db->select("SUM(collection.amount) as total_amount");
                $this->db->join("loan","loan.id = collection.loan_id");
                $this->db->join("borrower","borrower.id = loan.borrower_id");
                $this->db->join("capital","capital.id = loan.capital_id");
                $this->db->where("loan.deleted",0);
                $this->db->where("collection.date_created >",date("Y-m-d")." 00:00:00");
                $this->db->order_by("collection.id","desc");
                $this->db->from($this->table);
                return $this->db->get()->result_array()[0]['total_amount'];
        }

        public function total_payers_today()
        {
                $this->db->select("*");
                $this->db->join("loan","loan.id = collection.loan_id");
                $this->db->join("borrower","borrower.id = loan.borrower_id");
                $this->db->join("capital","capital.id = loan.capital_id");
                $this->db->where("loan.deleted",0);
                $this->db->where("collection.date_created >",date("Y-m-d")." 00:00:00");
                $this->db->group_by("borrower_id");
                $this->db->order_by("collection.id","desc");
                $this->db->from($this->table);
                return $this->db->get()->result_array();
        }

}