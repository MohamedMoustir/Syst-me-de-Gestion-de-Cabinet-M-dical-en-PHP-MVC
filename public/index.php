<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../core/Router.php';
use Core\Router;
$router = new Router();
$router->dispatch();

// require('../app/View/auth/register.php');
error_reporting(E_ALL);
ini_set('display_errors', 1);
