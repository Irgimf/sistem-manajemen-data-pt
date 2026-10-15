<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Auth::login');

// Auth Routes
$routes->get('/auth/login', 'Auth::login');
$routes->post('/auth/processLogin', 'Auth::processLogin');
$routes->get('/auth/register', 'Auth::register');
$routes->post('/auth/processRegister', 'Auth::processRegister');
$routes->get('/auth/logout', 'Auth::logout');

// Dashboard Route
$routes->get('/dashboard', 'Dashboard::index', ['filter' => 'auth']);

// Perusahaan Routes
$routes->group('perusahaan', ['filter' => 'auth'], static function ($routes) {
    $routes->get('/', 'Perusahaan::index');
    $routes->get('create', 'Perusahaan::create');
    $routes->post('store', 'Perusahaan::store');
    $routes->get('edit/(:num)', 'Perusahaan::edit/$1');
    $routes->post('update/(:num)', 'Perusahaan::update/$1');
    $routes->get('delete/(:num)', 'Perusahaan::delete/$1');
});

// SBU Routes
$routes->group('sbu', ['filter' => 'auth'], static function ($routes) {
    $routes->get('/', 'Sbu::index');
    $routes->get('detail/(:num)', 'Sbu::detail/$1');
    $routes->get('create', 'Sbu::create');
    $routes->post('store', 'Sbu::store');
    $routes->get('edit/(:num)', 'Sbu::edit/$1');
    $routes->post('update/(:num)', 'Sbu::update/$1');
    $routes->get('delete/(:num)', 'Sbu::delete/$1');

    // Projects (Pekerjaan)
    $routes->get('projects/(:num)', 'Sbu::projects/$1');
    $routes->post('storeProject/(:num)', 'Sbu::storeProject/$1');
    $routes->post('updateProject/(:num)', 'Sbu::updateProject/$1');
    $routes->get('deleteProject/(:num)', 'Sbu::deleteProject/$1');
});

// Users Routes (Admin only)
$routes->group('users', ['filter' => 'auth'], static function ($routes) {
    $routes->get('/', 'Users::index');
    $routes->get('delete/(:num)', 'Users::delete/$1');
});

// Pencarian Routes
$routes->group('pencarian', ['filter' => 'auth'], static function ($routes) {
    $routes->get('/', 'Pencarian::index');
    $routes->get('exportExcel', 'Pencarian::exportExcel');
});
