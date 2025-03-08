<?php


$router->get('/', 'HomeController@index');
$router->get('/login', 'UserController@login');
$router->get('/accountdetails', 'UserController@register');
$router->get('/createaccount', 'UserController@createAccount');
$router->get('/admindashboard', 'AdminDashboard@index');


$router->post('/signup', 'UserController@handleSignup');
