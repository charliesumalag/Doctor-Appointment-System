<?php


$router->get('/', 'HomeController@index');
$router->get('/login', 'UserController@login');
$router->get('/register', 'UserController@register');
