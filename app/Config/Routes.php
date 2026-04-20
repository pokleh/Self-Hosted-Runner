<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('login', 'AuthController::login');
$routes->post('login', 'AuthController::attemptLogin');
$routes->post('logout', 'AuthController::logout');

$routes->group('tasks', ['filter' => 'auth'], static function ($routes) {
    $routes->get('/', 'TaskController::index');
    $routes->get('new', 'TaskController::create');
    $routes->post('/', 'TaskController::store');
    $routes->get('(:num)', 'TaskController::show/$1');
    $routes->get('(:num)/edit', 'TaskController::edit/$1');
    $routes->post('(:num)', 'TaskController::update/$1');
    $routes->post('(:num)/delete', 'TaskController::delete/$1');
    $routes->post('(:num)/comments', 'TaskController::storeComment/$1');
    $routes->post('(:num)/comments/(:num)', 'TaskController::updateComment/$1/$2');
    $routes->post('(:num)/comments/(:num)/delete', 'TaskController::deleteComment/$1/$2');
});
