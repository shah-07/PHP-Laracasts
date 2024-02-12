<?php


$config = require("config.php");
$db = new Database($config['database']);
$currentUserId = 2;

$heading = $db->query("select * from users where id={$currentUserId}")->fetch()['name'] . " Notes";

$query = "select * from notes where user_id = {$currentUserId}";

// $id = $_GET['id'];
$notes = $db->query($query)->fetchAll();;
// dd($db);
require "views/notes.view.php";
