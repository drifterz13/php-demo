<?php

use Core\Authenticator;
use Core\Router;

Authenticator::logout();

Router::redirect('/login');

exit();
