<?php

use Core\App;
use Core\Authenticator;
use Core\Database;
use Core\Router;
use Core\Session;
use Http\Forms\LoginForm;

$email = $_POST['email'];
$password = $_POST['password'];

$form = new LoginForm();

if ($form->validate($email, $password)) {
    $auth = new Authenticator(App::resolve(Database::class));

    if ($auth->attempt($email, $password)) {
        Router::redirect('/');
    }

    $form->error('message', 'Invalid email or password');
}

Session::flash('errors', $form->errors());

return Router::redirect('/login');
