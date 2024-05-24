<?php

$errors = [];

view('registration/create', [
    'errors' => $errors,
    'email' => '',
    'password' => ''
]);
