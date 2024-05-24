<?php

use Core\Validator;
use Core\App;
use Core\Database;
use Core\Router;

$email = $_POST['email'];
$password = $_POST['password'];

if (!Validator::email($email)) {
    $errors['email'] = 'Please provide an invalid email';
}

if (!Validator::string($password, 7, 255)) {
    $errors['password'] = 'Password must be at least 7 characters long';
}

if (!empty($errors)) {
    return view('registration/create', [
        'errors' => $errors,
        'email' => $email,
        'password' => $password
    ]);
}

/** @var Database $db */
$db = App::resolve(Database::class);

$user = $db->query('SELECT * FROM users WHERE email = :email', [
    'email' => $email
])->find();

if ($user) {
    Router::redirect('/login');
    exit();
} else {
    $db->query('INSERT INTO users (email, password) VALUES (:email, :password)', [
        'email' => $email,
        'password' => password_hash($password, PASSWORD_DEFAULT)
    ]);

    $_SESSION['user'] = [
        'email' => $email,
    ];

    Router::redirect('/');
    exit();
}
