<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('home', 'Home::index');
$routes->add('manager_dashboard', 'Manager::dashboard');
$routes->add('manager_tickets', 'Manager::ticket');
$routes->add('manager_assignment', 'Manager::assignment');
$routes->add('employee_dashboard','Employee::dashboard');
$routes->add('employee_orderHistory','Employee::orderHistory');
$routes->add('employee_orderDetails','Employee::orderDetails');