<?php

$heading = "My Notes";
$currentUserId = 2;

$config = require("config.php");
$db = new Database($config['database']);


$note = $db->query(
  "select * from notes where id = :id",
  ['id' => $_GET['id']]
)->fetch();

if (!$note) {
  abort(Response::NOT_FOUND);
}
if ($note['user_id'] !== $currentUserId) {
  abort(Response::FORBDDEN);
}

require "views/note.view.php";
