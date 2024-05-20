<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('home', 'Home::index');
$routes->add('manager_dashboard', 'Manager::dashboard');
$routes->add('manager_tickets', 'Manager::ticket');
$routes->add('manager_assignment', 'Manager::assignment');
$routes->add('employee_dashboard', 'Employee::dashboard');
$routes->add('employee_orderHistory', 'Employee::orderHistory');
$routes->add('employee_orderDetails', 'Employee::orderDetails');
$routes->add('admin_dashboard', 'Admin::dashboard');
$routes->add('admin_team_management', 'Admin::adminTeamManagement');
$routes->add('admin_employees_management', 'Admin::adminEmployeesManagement');
$routes->add('user_dashboard', 'User::dashboard');
$routes->add('orders_page', 'User::orders');
$routes->add('reports_page', 'User::reports');
$routes->add('login', 'Home::login');
