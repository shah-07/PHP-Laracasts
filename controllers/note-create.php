<?php

require 'Validator.php';
$config = require 'config.php';
$db = new Database($config['database']);
$currentUserId = 1;


$heading = "Create Note";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $errors = [];

  if (!Validator::string($_POST['body'], 1, 1000)) {
    $errors['body'] = 'A body is no more than 1,000 characters is required';
  }

  if (empty($errors)) {
    $db->query("INSERT INTO notes(body, user_id) VALUES(:body, :user_id)", [
      'body' => $_POST['body'],
      'user_id' => $currentUserId
    ]);
  }
}

require("views/note-create.view.php");
