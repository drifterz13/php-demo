<?php

use Core\App;
use Core\Authenticator;
use Core\Database;
use Core\Router;
use Http\Forms\LoginForm;

$form = LoginForm::validate($attributes = [
    'email' => $_POST['email'],
    'password' => $_POST['password']
]);

$signedIn = (new Authenticator(App::resolve(Database::class)))
    ->attempt($attributes['email'], $attributes['password']);

if (!$signedIn) {
    $form->error('message', 'Invalid email or password')->throw();
}

Router::redirect('/');
