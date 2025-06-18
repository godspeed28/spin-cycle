<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', [\App\Controllers\Pages::class, 'index']);
$routes->get('/Pages/about', [\App\Controllers\Pages::class, 'about']);
$routes->get('/Pages/services', [\App\Controllers\Pages::class, 'services']);
$routes->get('/Pages/contact', [\App\Controllers\Pages::class, 'contact']);
$routes->get('/washfold', [\App\Controllers\ServicesItemController::class, 'washfold']);
$routes->get('/expresslaundry', [\App\Controllers\ServicesItemController::class, 'expresslaundry']);
$routes->get('/drycleaning', [\App\Controllers\ServicesItemController::class, 'drycleaning']);
$routes->get('/ironingonly', [\App\Controllers\ServicesItemController::class, 'ironingonly']);
$routes->get('/Daftar', [\App\Controllers\Daftar::class, 'index']);
$routes->get('/Login', [\App\Controllers\Login::class, 'index']);
$routes->post('/Login/auth', [\App\Controllers\Login::class, 'auth']);
$routes->post('/Daftar/auth', [\App\Controllers\Daftar::class, 'auth']);
$routes->get('/Login/logout', [\App\Controllers\Login::class, 'logout']);
$routes->get('/logout', [\App\Controllers\Login::class, 'logoutAdmin']);
$routes->get('/Wash', [\App\Controllers\Wash::class, 'index']);
$routes->post('/Wash/checkout', [\App\Controllers\Wash::class, 'checkout']);
$routes->get('/OrderController', [\App\Controllers\OrderController::class, 'index']);
$routes->get('/test-download', [\App\Controllers\OrderController::class, 'generatePdf']);
$routes->get('/generate-pdf', [\App\Controllers\ReportController::class, 'generatePdf']);
$routes->get('/generate-excel', [\App\Controllers\ReportController::class, 'exportExcel']);
$routes->post('checkout/proses', [\App\Controllers\Checkout::class, 'proses']);
$routes->get('checkout/success', [\App\Controllers\Checkout::class, 'success']);

$routes->post('kirim-email', [\App\Controllers\EmailController::class, 'kirim']);

// admin
$routes->get('dashboard', [\App\Controllers\DashboardController::class, 'index']);
$routes->get('users', [\App\Controllers\UsersController::class, 'index']);
$routes->get('services', [\App\Controllers\ServicesController::class, 'index']);
$routes->get('clothes', [\App\Controllers\ClothesController::class, 'index']);
$routes->get('order', [\App\Controllers\OrderAdminController::class, 'index']);
$routes->get('report', [\App\Controllers\ReportController::class, 'index']);

// crud users
$routes->post('users/save', [\App\Controllers\UsersController::class, 'save']);
$routes->post('users/update/(:num)', [\App\Controllers\UsersController::class, 'update/$1']);
$routes->post('users/delete/(:num)', [\App\Controllers\UsersController::class, 'delete/$1']);

// crud services
$routes->post('services/save', [\App\Controllers\ServicesController::class, 'save']);
$routes->post('services/update/(:num)', [\App\Controllers\ServicesController::class, 'update/$1']);
$routes->post('services/delete/(:num)', [\App\Controllers\ServicesController::class, 'delete/$1']);

// crud clothes
$routes->post('clothes/save', [\App\Controllers\ClothesController::class, 'save']);
$routes->post('clothes/update/(:num)', [\App\Controllers\ClothesController::class, 'update/$1']);
$routes->post('clothes/delete/(:num)', [\App\Controllers\ClothesController::class, 'delete/$1']);

// API chart
$routes->get('chart/sales', [\App\Controllers\ChartController::class, 'salesData']);
$routes->get('chart/user', [\App\Controllers\ChartController::class, 'userData']);

// order manage
$routes->get('admin/orders/detail/(:num)', [\App\Controllers\OrderAdminController::class, 'detail/$1']);
$routes->post('order/update/(:num)', [\App\Controllers\OrderAdminController::class, 'update/$1']);

// profil detail & update
$routes->get('profil/detail', [\App\Controllers\ProfilController::class, 'detail']);
$routes->post('profil/update', [\App\Controllers\ProfilController::class, 'update']);

// callback
$routes->post('/checkout/callback', [\App\Controllers\Checkout::class, 'callback']);
