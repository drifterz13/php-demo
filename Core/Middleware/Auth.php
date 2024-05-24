<?php

namespace Core\Middleware;

use Core\Router;

class Auth
{
    public function handle()
    {
        if (!$_SESSION['user'] ?? false) {
            Router::redirect('/login');
            exit();
        }
    }
}
