<?php


$config = require base_path("config.php");
$db = new Database($config['database']);
$currentUserId = 1;

$heading = $db->query("select * from users where id={$currentUserId}")->find()['name'] . " Notes";

$query = "select * from notes where user_id = {$currentUserId}";


$notes = $db->query($query)->get();


view("notes/index.view.php", [
  'heading' => $heading,
  'notes' => $notes
]);
