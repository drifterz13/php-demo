<?php

use Core\Session;

function dd($val)
{
    echo '<pre>';
    var_dump($val);
    echo '</pre>';

    die();
}

function urlIs($val)
{
    return $_SERVER['REQUEST_URI'] === $val;
}

function base_path($path)
{
    return __DIR__ . '/../' . $path;
}

function view($path, $attrs = [])
{
    extract($attrs);
    require base_path('views/' . $path . '.view.php');
}

function partial($path, $attrs = [])
{
    extract($attrs);
    require base_path('views/partials/' . $path . '.view.php');
}

function old(String $key, $default = '')
{
    return Session::get('old')[$key] ?? $default;
}
