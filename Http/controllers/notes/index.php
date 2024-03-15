<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$currentUserId = 1;

$heading = "My Notes";

$query = "select * from notes where user_id = {$currentUserId}";


$notes = $db->query($query)->get();


view("notes/index.view.php", [
  'heading' => $heading,
  'notes' => $notes
]);
