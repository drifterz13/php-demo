<?php

function defineRoutes(Core\Router $router)
{
    $router->get('/', 'index.php');
    $router->get('/about', 'about.php');
    $router->get('/contact', 'contact.php');

    $router->get('/notes', 'notes/index.php')->only('auth');
    $router->get('/note', 'notes/show.php');
    $router->post('/notes', 'notes/store.php');
    $router->get('/note/create', 'notes/create.php');
    $router->delete('/note', 'notes/delete.php');
    $router->get('/note/edit', 'notes/edit.php');
    $router->patch('/note', 'notes/update.php');

    $router->get('/register', 'registration/create.php')->only('guest');
    $router->post('/register', 'registration/store.php');
    $router->get('/login', 'session/create.php')->only('guest');
    $router->post('/session', 'session/store.php')->only('guest');
    $router->delete('/session', 'session/delete.php')->only('auth');

    return $router->getRoutes();
};
