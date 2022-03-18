<?php 
namespace Controllers;
use MVC\Router;

class PropiedadController{

    public static function index(Router $router) {
        $router->render('propiedades/admin',[
            'mensaje' => 'desde la vista',
            'otromensaje' => 'desde otra vista'
        ]);// este metodo manda a llamar a $router que hace referencia a la instanciada en /public/build/index.php, y le pasamos a render una direccion como variable al metodo.
    }

    public static function crear() {
        echo "creando...";
    }

    public static function actualizar() {
        echo "Actualizando ... ";
    }
}

?>