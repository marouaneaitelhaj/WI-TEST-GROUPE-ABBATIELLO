<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'auth/login';
$route['login'] = 'auth/login';
$route['logout'] = 'auth/logout';
$route['users'] = 'adminDashboard/index';
$route['createUser'] = 'adminDashboard/createUser';
$route['updateUser/(:num)'] = 'adminDashboard/updateUser/$1';
$route['deleteUser/(:num)']['delete'] = 'adminDashboard/deleteUser/$1';

$route['employees'] = 'employeesDashboard/index';
$route['createEmployee'] = 'employeesDashboard/createEmployee';
$route['updateEmployee/(:num)'] = 'employeesDashboard/updateEmployee/$1';
$route['deleteEmployee/(:num)']['delete'] = 'employeesDashboard/deleteEmployee/$1';