<?php

use Core\Router;
use Core\Database;
use Core\App;
use Core\Authenticator;

/** @var Database $db */
$db = App::resolve(Database::class);

$id = $_POST['id'];
$currentUserId = 1;

$note = $db->query('select * from notes where id = :id', ['id' => $id])->findOrFail();

Authenticator::authorize($note['user_id'] === $currentUserId);

$db->query('delete from notes where id = :id', ['id' => $id]);

Router::redirect('/notes');
