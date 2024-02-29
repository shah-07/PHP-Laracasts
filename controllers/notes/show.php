<?php


$currentUserId = 1;

$config = require base_path("config.php");
$db = new Database($config['database']);


$note = $db->query(
  "select * from notes where id = :id",
  ['id' => $_GET['id']]
)->findOrFail();

authorize($note['user_id'] === $currentUserId);


view("notes/show.view.php", [
  'heading' => 'My Notes',
  'note' => $note
]);
