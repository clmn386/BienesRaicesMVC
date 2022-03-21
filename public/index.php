 <?php 
require_once __DIR__. '/../includes/app.php';
use MVC\Router;
use Controllers\PropiedadController;


$router = new Router();

// " debuggear(PropiedadController::class); " <- esto nos da el namespace donde se encuentra esa funcion. Podremos identificar en que clase de encuantra el metodo.

// Propiedades
$router->get('/admin', [PropiedadController::class, 'index']); //visitamos /admin, tenemos un controlador asociado a esta ruta y va a llamar al metodo 'index'.
$router->get('/propiedades/crear', [PropiedadController::class, 'crear']);
$router->post('/propiedades/crear', [PropiedadController::class, 'crear']);
$router->get('/propiedades/actualizar', [PropiedadController::class, 'actualizar']);
$router->post('/propiedades/actualizar', [PropiedadController::class, 'actualizar']);
$router->post('/propiedades/eliminar', [PropiedadController::class, 'eliminar']);

// Venedores
$router->get('/vendedores/crear', [PropiedadController::class, 'crearVendedor']);
$router->post('/vendedores/crear', [PropiedadController::class, 'crearVendedor']);
$router->get('/vendedores/actualizar', [PropiedadController::class, 'actualizarVendedor']);
$router->post('/vendedores/actualizar', [PropiedadController::class, 'actualizarVendedor']);
$router->post('/vendedores/eliminar', [PropiedadController::class, 'eliminarVendedor']);



$router->comprobarRutas();