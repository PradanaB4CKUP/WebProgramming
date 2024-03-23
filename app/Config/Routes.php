<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/member', 'Member::index', ['filter' => 'khususMember']);
$routes->get('login', 'Login::index', ['filter' => 'khususTamu']);

