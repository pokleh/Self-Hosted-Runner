<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->group('tasks', static function ($routes) {
    $routes->get('/', 'TaskController::index');
    $routes->get('new', 'TaskController::create');
    $routes->post('/', 'TaskController::store');
    $routes->get('(:num)', 'TaskController::show/$1');
    $routes->get('(:num)/edit', 'TaskController::edit/$1');
    $routes->post('(:num)', 'TaskController::update/$1');
    $routes->post('(:num)/delete', 'TaskController::delete/$1');
});
