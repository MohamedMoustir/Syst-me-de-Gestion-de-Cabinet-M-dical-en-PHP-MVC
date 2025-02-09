<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../core/Router.php';
use Core\Router;
$router = new Router();
$router->dispatch();

