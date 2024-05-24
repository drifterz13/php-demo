<?php

use Core\Database;
use Core\App;
use Core\Authenticator;

/** @var Database $db */
$db = App::resolve(Database::class);

$id = $_GET['id'];
$currentUserId = 1;

$note = $db->query('select * from notes where id = :id', ['id' => $id])->findOrFail();

Authenticator::authorize($note['user_id'] === $currentUserId);

view('notes/show', [
    'banner_title' => "Note: {$note['title']}",
    'note' => $note,
]);
