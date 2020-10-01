<?php

    /**
     * ? Esta clase es la que toma la informacion de la URL, en base a esta informacion el sistema seleciona 
     * ? que controlador traer, que metodo utilizar, y que parametros pasar.
     */

    class Core {

        protected $currentController = 'Pages';
        protected $currentMethod = 'index';
        protected $parameters = [];

        public function __construct() {

            $url = $this->getUrl(); // --------------- info de la url
            var_dump($url);

            if (!empty($url)) { // --------------------- hay info?
                
                if (file_exists('../app/controller/' . ucwords(strtolower($url[0])) . '.php')) {
                    $this->currentController = ucwords(strtolower($url[0])); // -------- guardar controlador
                    unset($url[0]);
                }
            }    
            
            require_once '../app/controller/' . $this->currentController . '.php'; // ------- include controlador
            $this->currentController = new $this->currentController; // -------instancia del controlador

            if (isset($url[1])) { // ---------------------- hay metodo?
                if (method_exists($this->currentController, $url[1])) {
                    $this->currentMethod = $url[1]; // ---------------------- guardar metodo
                }
                unset($url[1]);
            }

            $this->parameters = $url ? array_values($url) : []; // -------------- hay parametros?
            
            call_user_func_array(
                [
                    $this->currentController, // ------------------- controlador [0]
                    $this->currentMethod // ----------------- metodo del controlador [1] 
                ],
                $this->parameters // -------------------- parametros del metodo [0, 1...]
            );

        }

        public function getUrl() {
            if(isset($_GET['url'])) { // ----------------- localhost/aprendiendo_mvc/['url']
                $url = rtrim($_GET['url'], '/');
                $url = filter_var($url, FILTER_SANITIZE_URL);
                $url = explode('/', $url); // ------------------- [0, 1...]
                return $url;
            }
        }

    } 