<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('home', 'Home::index');
// $routes->add('manager_dashboard', 'Manager::dashboard');
// $routes->add('manager_tickets', 'Manager::ticket');
// $routes->add('manager_assignment', 'Manager::assignment');
// $routes->add('employee_dashboard', 'Employee::dashboard');
// $routes->add('employee_orderHistory', 'Employee::orderHistory');
// $routes->add('employee_orderDetails', 'Employee::orderDetails');
// $routes->add('employee_viewDoc', 'Employee::viewDoc');
// $routes->add('admin_dashboard', 'Admin::dashboard');
// $routes->add('admin_employees_management', 'Admin::adminEmployeesManagement');
// $routes->add('user_dashboard', 'User::dashboard');
// $routes->add('orders_page', 'User::orders');
// $routes->add('reports_page', 'User::reports');
// $routes->add('login', 'Home::login');
// $routes->add('register', 'Home::register');
// $routes->add('landing', 'Home::landing');
// $routes->add('employee_translationUpload', 'Employee::employee_translationUpload');
// $routes->add('employee_viewTranslation', 'Employee::employee_viewTranslation');
// $routes->add('user_viewTranslation', 'User::user_viewTranslation');
// $routes->post('Home/signup', 'User::signup');
// $routes->post('admin_employees_management', 'Admin::addEmployee');
// $routes->add('admin_team_management', 'Admin::addTeam');

// Public Routes (no filters)
$routes->get('home', 'Home::index');
$routes->add('login', 'Home::login');
$routes->add('register', 'Home::register');
$routes->add('landing', 'Home::landing');
$routes->add('oops', 'Home::oops');
$routes->get('logout', 'Home::logout');


// Admin Routes (assuming admin user type is 1)
$routes->group('', ['filter' => 'auth:0'], function ($routes) {
    $routes->add('admin_dashboard', 'Admin::dashboard');
    $routes->add('admin_employees_management', 'Admin::adminEmployeesManagement');
    $routes->post('admin_employees_management', 'Admin::addEmployee');
    $routes->add('admin_team_management', 'Admin::addTeam');
});

// Manager Routes (assuming manager user type is 2)
$routes->group('', ['filter' => 'auth:4'], function ($routes) {
    $routes->add('manager_dashboard', 'Manager::dashboard');
    $routes->add('manager_tickets', 'Manager::ticket');
    $routes->add('manager_assignment', 'Manager::assignment');
});

// Employee Routes (assuming employee user type is 3)
$routes->group('', ['filter' => 'auth:1'], function ($routes) {
    $routes->add('employee_dashboard', 'Employee::dashboard');
    $routes->add('employee_orderHistory', 'Employee::orderHistory');
    $routes->add('employee_orderDetails', 'Employee::orderDetails');
    $routes->add('employee_viewDoc', 'Employee::viewDoc');
    $routes->add('employee_translationUpload', 'Employee::employee_translationUpload');
    $routes->add('employee_viewTranslation', 'Employee::employee_viewTranslation');
});

// User Routes (assuming general user type is 4)
$routes->group('', ['filter' => 'auth:2'], function ($routes) {
    $routes->add('user_dashboard', 'User::dashboard');
    $routes->add('orders_page', 'User::orders');
    $routes->add('reports_page', 'User::reports');
    $routes->add('user_viewTranslation', 'User::user_viewTranslation');
    $routes->add('submit', 'User::submitOrder');
    $routes->add('reportSubmit', 'User::reportSubmit');
    $routes->add('userDashboard_load', 'User::Information');
});
