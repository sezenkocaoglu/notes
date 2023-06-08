<?php

$config = require(base_path('config.php'));
$db = new Database($config['database']);

$success = '';
$errors = [];

$note = $db->query('select * from notes where id=:id', ['id' => $_GET['id']])->findOrFail();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $title = $_POST['title'];
    $body = $_POST['body'];


    $title = trim($title);
    if(strlen($title) == 0) {
        $errors['title'] = "Title can not be empty!";
    } elseif (strlen($title) > 45) {
        $errors['title'] = "Title can not be more than 45 characters!";
    }

    $body = trim($body);
    if(strlen($body) == 0) {
        $errors['body'] = "Note can not be empty!";
    } elseif (strlen($body) > 255) {
        $errors['body'] = "Notes can not be more than 45 characters!";
    }

    if (empty($errors)) {
        $db->query('update notes set title=:title, body=:body where id=:id', [
            'title' => $title,
            'body' => $body,
            'id' => $_GET['id'],
        ]);
        $success = "Note updated successfully.";
        $noteNew = $db->query('select * from notes where id=:id', ['id' => $_GET['id']])->findOrFail();

        view('notes/show.view.php', [
            'title' => $noteNew['title'],
            'note' => $noteNew,
            'success' => $success,
        ]);

        return;
    }
}

view('notes/edit.view.php', [
    'title' => 'Edit note',
    'note' => $note,
    'errors' => $errors,
]);