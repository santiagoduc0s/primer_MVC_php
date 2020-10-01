<?php

    /**
     * ? Detro de Article (modelo) están las metodos que se que se van a conectar a la base de datos. Los 
     * ? controladores van a instanciar estas clases para así acceder a sus metodos y mostrar la informacion
     * ? en las vistas. 
     */

    class Article {

        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        public function get_articles() {
            $this->db->prepare_statement("SELECT * FROM article");
            return $this->db->execute_statement_and_get_all_result();
        }
        
    }