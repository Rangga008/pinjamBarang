<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Router\RouteCollection;
use Config\Services;

// Initialize the RouteCollection
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override(null);  // Default behavior
// or 
$routes->set404Override('Errors::show404');  // Custom handler

$routes->setAutoRoute(true); // Enable auto-routing

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// Define default route
$routes->get('/', 'Login::index');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * Environment-based routing configurations can be loaded here.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}