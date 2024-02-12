<?php


$config = require("config.php");
$db = new Database($config['database']);


$heading = $db->query("select * from users where id=2")->fetch()['name'] . " Notes";

$query = "select * from notes where user_id = 2";

// $id = $_GET['id'];
$notes = $db->query($query)->fetchAll();;
// dd($db);
require "views/notes.view.php";
