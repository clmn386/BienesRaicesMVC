<?php

define('TEMPLATE_URL', __DIR__ . '/templates'); // concatenamos la constante __DIR__ con nuestra archivo, para permitir que php defina el mismo donde encontrar el o los archivos.
define('FUNCIONES_URL', __DIR__ . 'funciones.php'); // de esta manera podemos hacer codigo portable, porque los distintos S.O tienen directorios diferentes.
define('CARPETAS_IMAGENES', $_SERVER['DOCUMENT_ROOT'] . '/imagenes/');


function incluirTemplate($nombre, $inicio=false){   
include TEMPLATE_URL . "/${nombre}.php"; // <-- require 'app.php';


}
function autenticado(){
    session_start();

    if(!$_SESSION['login']) {
        header('Location: /');
    }
}

function debuggear($a) {
    echo "<pre>";
    var_dump($a);
    echo "</pre>";
    exit;
}

//Escapa Sanitizar el html
function san($html) : string {
    $san = htmlspecialchars($html);                     
    return $san;
}

function validarTipo($tipo){
    $tipos=['propiedad','vendedor'];

    return in_array($tipo, $tipos);
}

function mostrarNotificacion($codigo) {
    $mensaje = '';

    switch($codigo) {
        case 1:
            $mensaje = 'Creado Correctamente';
            break;
        case 2:
            $mensaje = 'Actualizado Correctamente';
            break;
        case 3:
            $mensaje = 'Eliminado Correctamente';
            break;
        default:
            $mensaje = false;
            break;
    }
    return $mensaje;
}

function validarRedireccionar(string $url) {
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if(!$id) {
        header("Location: ${url}");
    }
    return $id;
}
