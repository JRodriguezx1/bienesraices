<?php

require_once __DIR__.'/../includes/app.php';

use Controllers\logincontroller;
use Controllers\paginascontroller;
use MVC\Router;
use Controllers\propiedadcontroller;  //carpeta/nombre de la clase
use Controllers\vendedorcontroller;

$router = new Router();

//propiedades  admin, crear, actualizar, eliminar  -----PRIVADO-----
$router->get('/admin', [propiedadcontroller::class, 'index']); //cundo se visite la url /admin llaman al metodo index de la clase propiedadcontroller
$router->get('/propiedades/crear', [propiedadcontroller::class, 'crear']);
$router->post('/propiedades/crear', [propiedadcontroller::class, 'crear']);
$router->get('/propiedades/actualizar', [propiedadcontroller::class, 'actualizar']);
$router->post('/propiedades/actualizar', [propiedadcontroller::class, 'actualizar']);
$router->post('/propiedades/eliminar', [propiedadcontroller::class, 'eliminar']);

//vendedores
$router->get('/vendedores/crear', [vendedorcontroller::class, 'crear']);
$router->post('/vendedores/crear', [vendedorcontroller::class, 'crear']);
$router->get('/vendedores/actualizar', [vendedorcontroller::class, 'actualizar']);
$router->post('/vendedores/actualizar', [vendedorcontroller::class, 'actualizar']);
$router->post('/vendedores/eliminar', [vendedorcontroller::class, 'eliminar']);


//paginas principales ----PUBLICAS----
$router->get('/', [paginascontroller::class, 'index_principal']);
$router->get('/nosotros', [paginascontroller::class, 'nosotros']);
$router->get('/anuncios', [paginascontroller::class, 'todos_anuncios']);
$router->get('/detalleanuncio', [paginascontroller::class, 'detalle_anuncio']);
$router->get('/blog', [paginascontroller::class, 'blog']);
$router->get('/entrada', [paginascontroller::class, 'entrada_blog']);
$router->get('/contacto', [paginascontroller::class, 'contacto']);
$router->post('/contacto', [paginascontroller::class, 'contacto']);

//login autenticacion
$router->get('/login', [logincontroller::class, 'login']);  //metodo para mostrar el formulario
$router->post('/login', [logincontroller::class, 'login']); //metodo para enviar el formulario
$router->get('/cerrarsesion', [logincontroller::class, 'logout']);

$router->comprobar_rutas();