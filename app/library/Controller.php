<?php
    
    /**
     * ? De esta clase van a extender todos los controladores, con los metodos de esta clase van a poder acceder
     * ? al modelo (obteniendo datos de la base de datos) y la vista (pudiendo seleccionar que vista mostrar). 
     */

    class Controller {

        public function load_model($model) { // ------------------------------------------ nombre del modelo
            require_once '../app/model/' . $model . '.php'; // --------------------- include modelo
            return new $model; // ----------------------------------------- return objeto
        }

        public function load_view($view, $data = []) { // ----------------------------- vista y datos
            if (file_exists('../app/view/' . $view . '-view.php')) {
                require_once '../app/view/' . $view . '-view.php'; // ------------------------ mostrar vista
            } else {
                die('La vista no exixste');
            }
        }
        
    }