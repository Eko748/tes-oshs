<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'AuthController::signup');
$routes->group('auth', ['namespace' => 'App\Controllers'], function ($routes) {
    $routes->get('login', 'AuthController::login');
    $routes->post('login', 'AuthController::login');
    $routes->get('signup', 'AuthController::signup');
    $routes->post('signup', 'AuthController::signup');
    $routes->get('logout', 'AuthController::logout');
});

$routes->group('home', ['namespace' => 'App\Controllers'], function ($routes) {
    $routes->get('/', 'HomeController::index');
});

$routes->group('product', ['namespace' => 'App\Controllers'], function ($routes) {
    $routes->get('/', 'ProductController::index');
    $routes->post('store', 'ProductController::store');
    $routes->post('update', 'ProductController::update');
    $routes->delete('delete/(:num)', 'ProductController::delete/$1');
});
