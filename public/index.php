 <?php 
require_once __DIR__. '/../includes/app.php';
use MVC\Router;
use Controllers\PropiedadController;


$router = new Router();

// " debuggear(PropiedadController::class); " <- esto nos da el namespace donde se encuentra esa funcion. Podremos identificar en que clase de encuantra el metodo.

$router->get('/home/inicio', [PropiedadController::class, 'inicio']);
$router->get('/home/nosotros', [PropiedadController::class, 'nosotros']);
$router->get('/home/anuncios', [PropiedadController::class, 'anuncios']);
$router->get('/home/contacto', [PropiedadController::class, 'contacto']);
$router->get('/home/blog', [PropiedadController::class, 'blog']);

$router->get('/', [PropiedadController::class, 'index']);

/* <-------------------(ADMIN)--------------------> */
// Admin Index
$router->get('/admin', [PropiedadController::class, 'index']); //visitamos /admin, tenemos un controlador asociado a esta ruta y va a llamar al metodo 'index'.
    // Propiedades
$router->get('/propiedades/crear', [PropiedadController::class, 'crear']);
$router->get('/propiedades/actualizar', [PropiedadController::class, 'actualizar']);
$router->post('/propiedades/crear', [PropiedadController::class, 'crear']);
$router->post('/propiedades/actualizar', [PropiedadController::class, 'actualizar']);
$router->post('/propiedades/eliminar', [PropiedadController::class, 'eliminar']);

// Venedores
$router->get('/vendedores/crear', [VendedorController::class, 'crear']);
$router->get('/vendedores/actualizar', [VendedorController::class, 'actualizar']);
$router->post('/vendedores/crear', [VendedorController::class, 'crear']);
$router->post('/vendedores/actualizar', [VendedorController::class, 'actualizar']);
$router->post('/vendedores/eliminar', [VendedorController::class, 'eliminar']);



$router->comprobarRutas();