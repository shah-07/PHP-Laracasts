<?php


$config = require("config.php");
$db = new Database($config['database']);
$currentUserId = 1;

$heading = $db->query("select * from users where id={$currentUserId}")->find()['name'] . " Notes";

$query = "select * from notes where user_id = {$currentUserId}";

// $id = $_GET['id'];
$notes = $db->query($query)->get();
// dd($db);
require "views/notes/index.view.php";
