<?php 

namespace Controllers;
use MVC\Router;

class PropiedadController{

    public static function index(Router $router) {
        $router->render('propiedades/admin');

    }

    public static function crear() {
        echo "creando...";
    }

    public static function actualizar() {
        echo "Actualizando ... ";
    }
}

?>