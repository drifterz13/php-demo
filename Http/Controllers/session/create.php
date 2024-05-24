<?php

$errors = [];

view('session/create', [
    'email' => '',
    'password' => '',
    'errors' => $errors
]);
