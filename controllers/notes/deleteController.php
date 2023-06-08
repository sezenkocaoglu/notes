<?php

$config = require(base_path('config.php'));
$db = new Database($config['database']);

$success = "";

if ($_SERVER['REQUEST_METHOD'] === 'GET'){
    $db->query('delete from notes where id=:id', ['id' => $_GET['id']]);
    
    $success = urlencode('Note deleted successfully.');
    header("Location: http://localhost:1234/notes/index?success=$success");
    exit();
}
