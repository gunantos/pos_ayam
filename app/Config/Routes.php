<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/penjualan', 'Home::index');
$routes->get('/ayam_masuk', 'Home::index');
$routes->get('/ayam_mati', 'Home::index');
$routes->get('/omset', 'Home::index');
$routes->get('/pengeluaran', 'Home::index');
$routes->get('/keuangan', 'Home::index');
