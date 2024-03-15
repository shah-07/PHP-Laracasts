<?php

use Core\App;
use Core\Database;
use Core\Validator;


$currentUserId = 1;
$db = App::resolve(Database::class);
$errors = [];


if (!Validator::string($_POST['body'], 1, 1000)) {
  $errors['body'] = 'A body is no more than 1,000 characters is required';
}

if (!empty($errors)) {
  return view("notes/create.view.php", [
    'heading' => 'Create Note',
    'errors' => $errors
  ]);
}

$db->query("INSERT INTO notes(body, user_id) VALUES(:body, :user_id)", [
  'body' => $_POST['body'],
  'user_id' => $currentUserId
]);

header('location: /notes');
die();
