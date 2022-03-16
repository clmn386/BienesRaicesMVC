 <?php 
require_once __DIR__. '/../includes/app.php';

use MVC\Router;

$router = new Router();

$router->get('/nosotros', 'funcion_nosotros');
$router->get('/propiedades', 'funcion_propiedades');
$router->get('/vendedores', 'funcion_vendedores');
$router->get('/', 'funcion_home');
$router->get('/admin', 'funcion_admin');

$router->comprobarRutas();