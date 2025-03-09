<?php
require __DIR__ . '/../vendor/autoload.php';
require '../helper.php';
require '../Framework/Router.php';

use Framework\Session;

use Framework\Router;

Session::start();

$router = new Router();
$routes = require basepath('routes.php');


$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];


$router->route($uri, $method);
