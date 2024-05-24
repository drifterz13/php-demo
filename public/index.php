<?php

$BASE_PATH = __DIR__ . '/../';

session_start();

require $BASE_PATH . 'Core/functions.php';

spl_autoload_register(function ($class) {
    // Convert class namespace to directory path.
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);

    require base_path("$class.php");
});

require base_path('bootstrap.php');

$router = new Core\Router();
require base_path('routes.php');

$routes = defineRoutes($router);

$path = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

$router->route($path, $method);
