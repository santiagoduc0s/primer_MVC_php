<?php

    /**
     * ? El controlador 'Pages' esxtiende de la clase 'Controller', por lo tanto se le agrega la funcionalidades
     * ? de un controlador (load_model y load_view). Pages va a ser llamado desde el 'Core', a su vez 'init' llama
     * ? a 'core', y init es llamado por 'index', por lo tanto todas las direcciones tienen que pararse en 'index'.
     */

    class Pages extends Controller {

        public function index() { // -------------- metodo index
            echo "Entre al metodo index";
            $user = $this->load_model('User');
            $data = [ // ------------------- cargan datos
                'title' => 'Bienvenido',
                'users' => $user->get_users()
            ];
            parent::load_view('page/home', $data); // ------------- muestra vista home
        }

        public function article() { // ------------------------------ metodo article 
            echo "Entre al metodo article";
            $article = parent::load_model('Article'); // -----------carga Article
            $data = [ // ---------------------------------------carga datos
                'title' => 'Articulos',
                'products' => $article->get_articles() 
            ];
            parent::load_view('page/article', $data); // --------------- muestra vista article
        }
        
        function insert_user() {
            echo "Entre al metodo inser_user";
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $data = [ // ---------------------------------------carga datos
                    'name' => trim($_POST['name']),
                    'email' => trim($_POST['email']),
                    'phone' => trim($_POST['phone'])
                ];
                
                $user = $this->load_model('User');
                if ($user->insert_user($data)) {
                    redirection('Pages/index/');
                } else {
                    die('No se pudo agregar el usuario');
                }
            } else {
                echo "Entre al else";
                $data = [
                    'name' => '',
                    'email' => '',
                    'phone' => ''
                ];
                $this->load_view('page/insertuser', $data);
            }
        }
        
        public function edit_user($id) {
            echo "Entre al metodo edit_user";
            $user = $this->load_model('User');
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $data = [ // ---------------------------------------carga datos
                    'id' => $id,
                    'name' => trim($_POST['name']),
                    'email' => trim($_POST['email']),
                    'phone' => trim($_POST['phone'])
                ];
                if ($user->edit_user($data)) {
                    redirection('Pages/index/');
                } else {
                    die('No se pudo agregar el usuario');
                }
            } else {
                $userEdit = $user->get_user($id);
                var_dump($userEdit);
                $data = [
                    'id' => $userEdit->id,
                    'name' => $userEdit->name,
                    'email' => $userEdit->email,
                    'phone' => $userEdit->phone
                ];
                $this->load_view('page/edituser', $data);
            } 
        }
        
        public function delete_user($id) {
            echo "Entre al metodo delete_user";
            $user = $this->load_model('User');
            if ($user->delete_user($id)) {
                redirection('Pages/index/');
            } else {
                die('No se pudo borrar al usuario');
            }
        }
        
    }