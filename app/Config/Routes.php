<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->post('/login', 'LoginLogic::index');
$routes->get('/member', 'MemberUser::index')
$routes->get('logout', 'UserController::logout', ['as' => 'logout']);
$routes->get('/admin', 'admin::index');
