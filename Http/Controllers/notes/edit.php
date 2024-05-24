<?php

use Core\App;
use Core\Authenticator;
use Core\Database;

/** @var Core\Database $db */
$db = App::resolve(Database::class);

$id = $_GET['id'];
$currentUserId = 1;

$note = $db->query('select * from notes where id = :id', ['id' => $id])->findOrFail();

Authenticator::authorize($note['user_id'] === $currentUserId);

view('notes/edit', [
    'banner_title' => "Edit Note",
    'note' => $note
]);
