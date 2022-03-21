<?php 

namespace Controllers;
use MVC\Router;
use Model\Propiedad;
use Model\Vendedor;
use Intervention\Image\ImageManagerStatic as image;

class PropiedadController{
    //este metodo es llamada desde /public/build/index.php
    public static function index(Router $router) {
        $propiedades = Propiedad::all();

        $resultado = $_GET['resultado'] ?? null;

        $router->render('propiedades/admin',[
           'propiedades' => $propiedades,
           'resultado' => $resultado
        ]);// este metodo manda a llamar a $router que hace referencia a la instanciada en /public/build/index.php, y le pasamos a render una direccion como variable al metodo.
    }

    public static function crear(Router $router) {
        
        $propiedad = new Propiedad;
        $vendedores = Vendedor::all();
        $errores = Propiedad::getErrores();


        if($_SERVER['REQUEST_METHOD'] === 'POST') {
        /* Crea una nueva instancia */
        $propiedad = new Propiedad($_POST['propiedad']); 
        /* Genera el nombre unico */
        
        $formato = $propiedad->FormatoImagen();
        $nombreImagen = md5( uniqid( rand(), true) ). $formato;
        
        $imgDirTemp = $_FILES['propiedad']['tmp_name']['imagen']; 
        if ($imgDirTemp) {
            
            $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);
            $propiedad->setImagen($nombreImagen);
        }

        /* validar la imagen  */
        $errores = $propiedad->validar();
        
        //Validar Arreglo errores - Vacio - 
        if (empty($errores)){
 
            /* crear carpeta */
            if(!is_dir(CARPETAS_IMAGENES)){
                mkdir(CARPETAS_IMAGENES);
            }
            
            //Guardar imagen en servidor
            $image->save(CARPETAS_IMAGENES . $nombreImagen);
            
            //Guarda en la BD
            $propiedad->guardar();
        }
    }

        $router->render('propiedades/crear',[
            'propiedad' => $propiedad,
            'vendedores' => $vendedores,
            'errores' => $errores
         ]);
    }

    public static function actualizar(Router $router) {
        $id = validarRedireccionar('/admin');

        $propiedad = Propiedad::find($id);
        $vendedores = Vendedor::all();
        $errores = Propiedad::getErrores();

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
        
            $args = $_POST['propiedad'];
            
            $propiedad->sincronizar($args);
            //Validacion
            $ignore_img=true;
            $errores = $propiedad->validar($ignore_img);
            
            //Subida de Archivos
            $formato = $propiedad->FormatoImagen();
            
            $nombreImagen = md5( uniqid( rand(), true) ). $formato;
    
    
            //Validacion de imagen y archivar en carpeta
            if ($_FILES['propiedad']['tmp_name']['imagen']) {
                $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);
                $propiedad->setImagen($nombreImagen);
    
                if (empty($errores)){
                    if ($_FILES['propiedad']['tmp_name']['imagen']) {
                        $image->save(CARPETAS_IMAGENES . $nombreImagen);
                    }
                    $propiedad->guardar();
                }
            }
    
        }

        $router->render('propiedades/actualizar',[
            'propiedad' => $propiedad,
            'errores' => $errores,
            'vendedores' => $vendedores
        ]);
    }

    public static function eliminar() {

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $tipo = $_POST['tipo'];
            $id = filter_var($id, FILTER_VALIDATE_INT);
    
            if($id && validarTipo($tipo)){
                $propiedad = Propiedad::find($id);
                $propiedad-> eliminar();
            }
        }
    }
}

?>      