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
