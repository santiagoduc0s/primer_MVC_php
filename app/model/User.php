<?php

    class User {

        private $db;
        
        public function __construct() {
            $this->db = new Database;
        }
        
        public function get_user($id) {
            $stm = 'SELECT * FROM user WHERE id = :id';
            $this->db->prepare_statement($stm);
            $this->db->bind_parameter_with_statement(':id', $id, PDO::PARAM_INT);
            $result = $this->db->execute_statement_and_get_one_result();
            return $result;
        }

        public function get_users() {
            $stm = 'SELECT * FROM user';
            $this->db->prepare_statement($stm);
            $result = $this->db->execute_statement_and_get_all_result();
            return $result;
        }

        public function insert_user($data) {
            $stm = 'INSERT INTO user (name, email, phone) VALUES (:name, :email, :phone)';
            $this->db->prepare_statement($stm);
            $this->db->bind_parameter_with_statement(':name', $data['name']);
            $this->db->bind_parameter_with_statement(':email', $data['email']);
            $this->db->bind_parameter_with_statement(':phone', $data['phone']);
            if ($this->db->execute_statement()) {
                return true;
            } else {
                return false;
            }
        }
        
        public function edit_user($data) {
            $stm = 'UPDATE user SET name = :name, email = :email, phone = :phone WHERE id = :id';
            $this->db->prepare_statement($stm);
            $this->db->bind_parameter_with_statement(':id', $data['id'], PDO::PARAM_INT);
            $this->db->bind_parameter_with_statement(':name', $data['name']);
            $this->db->bind_parameter_with_statement(':email', $data['email']);
            $this->db->bind_parameter_with_statement(':phone', $data['phone']);
            if ($this->db->execute_statement()) {
                return true;
            } else {
                return false;
            }
        }
        
        public function delete_user($id) {
            $stm = 'DELETE FROM user WHERE id = :id';
            $this->db->prepare_statement($stm);
            $this->db->bind_parameter_with_statement(':id', $id);
            if ($this->db->execute_statement()) {
                return true;
            } else {
                return false;
            }
        }

    } 