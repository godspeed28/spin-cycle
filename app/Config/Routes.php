<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', [\App\Controllers\Pages::class, 'index']);
$routes->get('/Pages/about', [\App\Controllers\Pages::class, 'about']);
$routes->get('/Pages/contact', [\App\Controllers\Pages::class, 'contact']);
