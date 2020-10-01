<?php

    /**
     * ? En este archivo se van a incluir todos los archivos que componen el curpo del sistema. Config, cuneta 
     * ? con constantes y configuraciones que se utilizan en todo el sistema ? El 'Core' (encargado de procesar
     * ? la informacion dentro de la 'url'), 'Controller' (padre de todos los controladores, tiene 
     * ? las funciones para cargar las vistas y los modelos), Database (tiene los metodos para conectarse a la 
     * ? base de datos, con este el modelo puede hacer peticiones a la base).
     */

    require_once '../app/config/config.php';
    require_once '../app/helper/url_helper.php';
    require_once '../app/library/Database.php';
    require_once '../app/library/Controller.php';
    require_once '../app/library/Core.php';
    