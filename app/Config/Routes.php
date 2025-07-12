<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Dashboard::index', ['filter' => 'auth']); // Dashboard, wajib login

// Auth
$routes->get('/auth/login', 'Auth::login');
$routes->post('/auth/processLogin', 'Auth::processLogin');
$routes->get('/auth/register', 'Auth::register');
$routes->post('/auth/processRegister', 'Auth::processRegister');
$routes->get('/auth/logout', 'Auth::logout');

// Dashboard
$routes->get('/dashboard', 'Dashboard::index', ['filter' => 'auth']);

// Categories (kategori)
$routes->group('categories', ['filter' => 'auth'], function($routes) {
    $routes->get('/', 'Categories::index');
    $routes->get('create', 'Categories::create');
    $routes->post('store', 'Categories::store');
    $routes->get('edit/(:num)', 'Categories::edit/$1');
    $routes->post('update/(:num)', 'Categories::update/$1');
    $routes->get('delete/(:num)', 'Categories::delete/$1');
});


// Expenses (pengeluaran)
$routes->get('/expenses', 'Expenses::index', ['filter' => 'auth']);
$routes->get('/expenses/create', 'Expenses::create', ['filter' => 'auth']);
$routes->post('/expenses/store', 'Expenses::store', ['filter' => 'auth']);
$routes->get('/expenses/edit/(:num)', 'Expenses::edit/$1', ['filter' => 'auth']);
$routes->post('/expenses/update/(:num)', 'Expenses::update/$1', ['filter' => 'auth']);
$routes->get('/expenses/delete/(:num)', 'Expenses::delete/$1', ['filter' => 'auth']);
$routes->get('/analytics', 'Expenses::chart', ['filter' => 'auth']);