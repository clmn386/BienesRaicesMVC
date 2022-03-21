<?php 
namespace Controllers;
use MVC\Router;
use Model\Vendedor;
use Intervention\Image\ImageManagerStatic as image;


class VendedorController{

    public static function crear(Router $router) {

        $vendedor = new Vendedor;
        
        $errores = Vendedor::getErrores();
        
        if($_SERVER['REQUEST_METHOD']==='POST') {
            // Nueva Instacia
            $vendedor = new Vendedor($_POST['vendedor']);
        
            //Validar que no hay campos vacios
            $errores = $vendedor->validar();
            
            //no hay errores
            if(empty($errores)){
                $vendedor->guardar();
            }
        }
        $router->render('vendedores/crear',[
            'vendedor' => $vendedor,
            'errores' => $errores,

        ]);
    }

    public static function actualizar(Router $router) {
        $id = validarRedireccionar('/admin');

            $vendedor = Vendedor::find($id);
            //Arreglo con mensaje de errores
            $errores = Vendedor::getErrores();

            if($_SERVER['REQUEST_METHOD']==='POST') {
                // asignar valor
                $args = $_POST['vendedor'];
                //sincronizar Obj en memoria con lo que usuario escribio
                $vendedor->sincronizar($args);
                // validacion
                $errores = $vendedor->validar();
            
                if(empty($errores)){
                    $vendedor->guardar();
                }
            }
        $router->render('vendedores/actualizar',[
            'vendedor' => $vendedor,
            'errores' => $errores,

        ]);

    }

    public static function eliminar(Router $router) {

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $tipo = $_POST['tipo'];
            $id = filter_var($id, FILTER_VALIDATE_INT);
    
            if ($tipo==="vendedor") {
                $propiedad = Vendedor::find($id);
                $propiedad-> eliminar();
            }
        }
    }
    
}

?>