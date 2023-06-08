<?php

$config = require base_path('config.php');
$db = new Database($config['database']);

$errors = [];
$success = '';

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
        $db->query('INSERT INTO notes(title, body) VALUES(:title, :body)', [
            'title' => $title,
            'body' => $body,
        ]);
        $success = "Note saved successfully.";
    }
}

view('notes/create.view.php', [
    'title' => 'Add note',
    'errors' => $errors,
    'success' => $success,
]);