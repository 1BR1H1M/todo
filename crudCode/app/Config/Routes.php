<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Crud::index');
$routes->get('/obtenerNombre/(:any)', 'Crud::obtenerNombre/$1');
$routes->get('/eliminar/(:any)', 'Crud::eliminar/$1');
$routes->post('/crear', 'Crud::crear');
$routes->post('/actualizar', 'Crud::actualizar');