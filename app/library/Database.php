<?php

    /**
     * ? En esta clase se encuentran los metodos para acceder a la base de datos.
     */

    class Database {
        
        private $host = DB_HOST; 
        private $user = DB_USER;
        private $password = DB_PASSWORD; 
        private $name_database = DB_NAME;

        private $data_base_handler; // -------------- conexion
        private $statement;
        private $error;

        public function __construct() {

            $dbh = 'mysql:host=' . $this->host . ';dbname=' . $this->name_database . ';charset=utf8';
            $options = [ // ------------------- opciones conexion
                PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ];

            try {
                $this->data_base_handler = new PDO($dbh, $this->user, $this->password, $options); // --- crear concexion
                /** 
                 * ? En versiones anteriores a la 5.3.6 el codigo ';charset=utf8' no funciona. 
                 * ? El charset se selecciona de la siguiente forma: 
                 * ? $this->data_base_handler->exec('set names utf8');
                */
            } catch (PDOException $e) {
                $this->error = $e->getMessage();
                echo $this->error;
            }

        }

        public function prepare_statement($stm) {
            $this->statement = $this->data_base_handler->prepare($stm);
        }

        public function bind_parameter_with_statement($parameter, $value, $type = null) {
            if (is_null($type)) {
                switch (true) {
                    case is_int($value):
                        $type = PDO::PARAM_INT;
                        break;
                    case is_bool($value):
                        $type = PDO::PARAM_BOOL;
                        break;
                    case is_null($value):
                        $type = PDO::PARAM_NULL;
                        break;
                    default:
                        $type = PDO::PARAM_STR;
                        break;
                }
            }
            $this->statement->bindValue($parameter, $value, $type);
        }

        public function execute_statement() {
            return $this->statement->execute();
        }

        public function execute_statement_and_get_all_result() {
            $this->statement->execute();
            return $this->statement->fetchAll(PDO::FETCH_OBJ);
        }
        public function execute_statement_and_get_one_result() {
            $this->statement->execute();
            return $this->statement->fetch(PDO::FETCH_OBJ);
        }

        public function row_count() {
            return $this->statement->row_count();
        }

    }