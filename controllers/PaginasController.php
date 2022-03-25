<?php 
namespace Controllers;

use Model\Propiedad;
use MVC\Router;

class PaginasController{

    public static function index(Router $router){
        $propiedades = Propiedad::get(3);
        $inicio = true;

        $router->render('paginas/index', [
            'propiedades'=>$propiedades,
            'inicio' => $inicio,
        ]);
    }
        
    public static function nosotros(Router $router){
        $router->render('paginas/nosotros',  [
        ]); 
    }
    
    public static function propiedades(Router $router){
        $propiedades = Propiedad::get(9);

        $router->render('paginas/propiedades',  [
            'propiedades'=>$propiedades,
        ]); 
        

    }

    public static function propiedad(Router $router){
        $id = validarRedireccionar('/');
        $propiedad = propiedad::find($id);

        $router->render('paginas/propiedad',  [
            'propiedad'=>$propiedad,
        ]); 


    }

    public static function blog(Router $router){
        $router->render('paginas/blog',  [
        ]); 

    }

    public static function entrada(Router $router){
        $router->render('paginas/entrada',  [
        ]); 

    }

    public static function contacto(Router $router){
        $router->render('paginas/contacto',  [
        ]); 

    }



}



?>