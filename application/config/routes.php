<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// $route['default_controller'] = 'auth/login';
// $route['logout'] = 'auth/logout';
$route['users'] = 'utilisateurDashboard/index';
$route['createUser'] = 'utilisateurDashboard/createUser';
$route['updateUser/(:num)'] = 'utilisateurDashboard/updateUser/$1';
$route['deleteUser/(:num)'] = 'utilisateurDashboard/deleteUser/$1';

$route['employees'] = 'EmployeesDashboard/index';
$route['createEmployee'] = 'EmployeesDashboard/createEmployee';
$route['updateEmployee/(:num)'] = 'EmployeesDashboard/updateEmployee/$1';
$route['deleteEmployee/(:num)'] = 'EmployeesDashboard/deleteEmployee/$1';