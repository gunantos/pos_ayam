<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/penjualan', 'Home::penjualan');
$routes->get('/ayam-masuk', 'Home::ayam_masuk');
$routes->get('/ayam-mati', 'Home::ayam_mati');
$routes->get('/omset', 'Home::omset');
$routes->get('/pengeluaran', 'Home::pengeluaran');
$routes->get('/keuangan', 'Home::keuangan');

$routes->get('/api/chart/(:any)', 'Api::chartDashboard/$1');

$routes->get('/api/(:any)', 'Api::get/$1');
$routes->get('/api/(:any)/(:num)', 'Api::get/$1/$2');
$routes->get('/api/(:any)/get', 'Api::get/$1');
$routes->get('/api/(:any)/get/(:num)', 'Api::get/$1/$2');


$routes->post('/api/(:any)/save', 'Api::save/$1');
$routes->post('/api/(:any)/save/(:num)', 'Api::save/$1/$2');

$routes->post('/api/(:any)/delete', 'Api::delete/$1');
$routes->post('/api/(:any)/delete/(:num)', 'Api::delete/$1/$2');

$routes->post('/api/(:any)/(:num)', 'Api::save/$1/$2');
$routes->post('/api/(:any)', 'Api::save/$1');