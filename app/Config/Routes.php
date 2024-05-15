<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('admin_dashboard', 'Home::index');
$routes->add('admin_dashboard', 'Home::index');