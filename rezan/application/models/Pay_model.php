<?php

class Pay_model extends CI_Model {

        public $name;
        public $table = "capital";

        public function save($data)
        {
                $this->name = $data['name'];
                $this->db->insert('loaner', $this);
        }

        public function all($data)
        {
                $this->name = $data['name'];
                $this->db->select("*");
                $this->db->from("loaner");
                print_r($this->db->get("loaner")->result_array());
                
        }

        // public function update_entry()
        // {
        //         $this->title    = $_POST['title'];
        //         $this->content  = $_POST['content'];
        //         $this->date     = time();

        //         $this->db->update('entries', $this, array('id' => $_POST['id']));
        // }

}