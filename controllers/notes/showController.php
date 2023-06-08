<?php

$config = require(base_path('config.php'));
$db = new Database($config['database']);

$note = $db->query('select * from notes where id=:id', ['id' => $_GET['id']])->findOrFail();

view('notes/show.view.php', [
    'title' => htmlspecialchars($note['title']),
    'note' => $note,
]);