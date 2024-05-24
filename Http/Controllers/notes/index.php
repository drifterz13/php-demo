<?php

use Core\App;

/** @var Core\Database $db */
$db = App::resolve(Core\Database::class);

$notes  = $db->query('select * from notes where user_id = :user_id', ['user_id' => 1])->findAll();

view('notes/index', [
    'banner_title' => 'My notes',
    'notes' => $notes,
]);
