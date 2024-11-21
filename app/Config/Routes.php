<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true); // Set to true if you want to enable auto-routing

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// Default route
$routes->get('/', 'Home::index');

//mahasiswa
$routes->get('/mahasiswa', 'MahasiswaController::index');
$routes->get('/mahasiswa/(:segment)/detail', 'MahasiswaController::detail/$1');
$routes->get('/mahasiswa/tambah', 'MahasiswaController::create');
$routes->post('/mahasiswa/tambah', 'MahasiswaController::store');
$routes->get('/mahasiswa/(:segment)/edit', 'MahasiswaController::edit/$1');
$routes->post('/mahasiswa/(:segment)/edit', 'MahasiswaController::update/$1');
$routes->get('/mahasiswa/(:segment)/hapus', 'MahasiswaController::delete/$1');

//jurusan
$routes->get('/jurusan', 'JurusanController::index');
$routes->post('/jurusan/tambah', 'JurusanController::store');
$routes->post('/jurusan/(:segment)/edit', 'JurusanController::update/$1');
$routes->post('/jurusan/(:segment)/hapus', 'JurusanController::delete/$1');

//operator

/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * Additional routing can be added here as needed.
 */
