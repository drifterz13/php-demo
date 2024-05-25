<?php

use Core\Session;
use Core\ValidationException;

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

try {
    $router->route($path, $method);
} catch (ValidationException $exception) {
    Session::flash('errors', $exception->errors);
    Session::flash('old', $exception->old);

    $router::redirect($router->prevUrl());
}

Session::unflash();
