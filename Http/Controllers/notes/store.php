<?php

use Core\App;
use Core\Router;
use Core\Database;
use Core\Validator;

/** @var Database $db */
$db = App::resolve(Database::class);

$currentUserId = 1;
$errors = [];
$postTitle = $_POST['title'];
$postBody = $_POST['body'];

if (!Validator::string(
    val: $postTitle,
    min: 1,
    max: 255
)) {
    $errors['title'] = 'Note title should be between 1 and 255 characters';
}

if (!Validator::string($postBody, 1, 1000)) {
    $errors['body'] = 'Note body should be between 1 and 1,000 characters';
}

if (!empty($errors)) {
    return view('notes/create', [
        'banner_title' => 'Create note',
        'errors' => $errors
    ]);
}

try {
    $db->query('INSERT INTO notes (title, body, user_id) VALUES (:title, :body, :user_id)', [
        'title' => $postTitle,
        'body' => $postBody,
        'user_id' => $currentUserId
    ]);

    Router::redirect('/notes');
} catch (Throwable $e) {
    die($e->getMessage());
}
