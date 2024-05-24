<?php

namespace Core\Middleware;

use Core\Router;

class Guest
{
    public function handle()
    {
        if ($_SESSION['user'] ?? false) {
            Router::redirect('/');
            exit();
        }
    }
}
