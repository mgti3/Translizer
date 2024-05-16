<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('home', 'Home::index');
$routes->add('manager_dashboard', 'Manager::dashboard');
$routes->add('manager_tickets', 'Manager::ticket');
$routes->add('manager_assignment', 'Manager::assignment');