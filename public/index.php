 <?php 
require_once __DIR__. '/../includes/app.php';

use MVC\Router;
use Controllers\PropiedadController;
$router = new Router();


$router->get('/propiedades/crear', [PropiedadController::class, 'crear']);
$router->get('/propiedades/actualizar', [PropiedadController::class, 'actualizar']);
$router->get('/admin', [PropiedadController::class, 'index']);

$router->comprobarRutas();