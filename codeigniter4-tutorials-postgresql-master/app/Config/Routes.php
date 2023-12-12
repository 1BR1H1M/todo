<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes(true);

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('main');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

$routes->get('/', 'Home::main');
$routes->add('load', 'Home::loadPosts/$1');
//$routes->get('loadpageajax', 'Pageajax::loadContent/$1');
$routes->add('add', 'Home::add');
$routes->add('update', 'Home::update');
$routes->add('dellist', 'Home::dellist');
$routes->add('edit/(:num)', 'Home::edit/$1');
$routes->add('delete/(:num)', 'Home::delete/$1');
$routes->add('post/(:any)', 'Home::view/$1');

$routes->get('upimages', 'Uploads::index');
$routes->get('ptables', 'Home::main');

$routes->get('pageajax', 'Pageajax::index/$1');
$routes->get('loadpageajax', 'Pageajax::loadContent/$1');
$routes->get('pagenotajax', 'Pagenotajax::index');
//$routes->post('pagenotajax', 'Pagenotajax::index');
//$routes->get('pagenotajax/(:num)', 'Pagenotajax::index/$1');

$routes->get('ptablesnjx', 'Ptablenotajax::index');
$routes->post('ptablesnjx', 'Ptablenotajax::index');


$routes->add('login', 'Login::login');
/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need to it be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
