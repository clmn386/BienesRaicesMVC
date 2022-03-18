<?php
namespace MVC;


class Router {
   
    public $rutasGET = [];
    public $rutasPOST = [];

    public function get($url, $fn) {
        $this->rutasGET[$url] = $fn;
    }

    public function comprobarRutas() {
        $urlActual = $_SERVER['PATH_INFO'] ?? '/';
        $metodo = $_SERVER['REQUEST_METHOD'];

        if($metodo === 'GET') {
            $fn = $this->rutasGET[$urlActual] ?? null; 
        }
        if($fn){
            //La url existe y hay una funcion asociada.
            call_user_func($fn, $this); // call_user_func es una funcion que nos va permitir llamar una funcion cuando no sabemos como de llama esa funcion, caso de $fn que es dinamica.
        }else {
            echo "ERROR 404...";
        } 
    }

    //Muestra una vista
    public function render($view, $datos = []) {

        foreach($datos as $key => $value ) {
            $$key = $value; // declaramos key como variable de variable, al pasar muchos datos no hay forma de saber que nombre tendran esas variables
        }

        ob_start(); // inicia una almacenamiento en memoria de la vista ala que le estamos dando render 
        include __DIR__."/views/$view.php"; // cuando $router hace el llamado a este metodo, vemos que tiene asociado una ruta y le agregamos la variable $view para hacerlo reutilizable.
        $contenido = ob_get_clean(); // limpia buffer

        include __DIR__."/views/layout.php";
    }
}