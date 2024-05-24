<?php

use Core\App;
use Core\Authenticator;
use Core\Router;
use Core\Database;
use Core\Validator;

/** @var Database $db */
$db = App::resolve(Database::class);

$currentUserId = 1;
$errors = [];

$noteId = $_POST['noteId'];
$noteTitle = $_POST['title'];
$noteBody = $_POST['body'];

if (!Validator::string(
    val: $noteTitle,
    min: 1,
    max: 255
)) {
    $errors['title'] = 'Note title should be between 1 and 255 characters';
}

if (!Validator::string($noteBody, 1, 1000)) {
    $errors['body'] = 'Note body should be between 1 and 1,000 characters';
}

if (!empty($errors)) {
    return view('notes/create', [
        'banner_title' => 'Create note',
        'errors' => $errors
    ]);
}

try {
    $note = $db->query('SELECT * FROM notes WHERE id = :note_id', ['note_id' => $noteId])->findOrFail();
    if (!$note) {
        return Router::abort(404);
    }

    Authenticator::authorize($note['user_id'] === $currentUserId);

    $db->query('UPDATE notes SET title = :title, body = :body WHERE id = :note_id', [
        'title' => $noteTitle,
        'body' => $noteBody,
        'note_id' => $noteId
    ]);

    Router::redirect("/note?id=$noteId");
} catch (Throwable $e) {
    die($e->getMessage());
}
