<?php

use Core\App;
use Core\Database;
use Http\Forms\LoginForm;

$db = App::resolve(Database::class);

$email = $_POST['email'];
$password = $_POST['password'];


//validate the form inputs.
$form = new LoginForm();

if (!$form->validate($email, $password)) {
  return view('session/create.view.php', [
    'errors' => $form->errors(),
    'email' => $email,
    'password' => $password,
  ]);
}


//match the credentials
$user = $db->query('select * from users where email = :email', [
  'email' => $email,
])->find();

if ($user) {
  if (password_verify($password, $user['password'])) {
    login([
      "email" => $email,
    ]);

    header("location: /");
    exit;
  }
}

return view('session/create.view.php', [
  'errors' => [
    'email' => 'No matching account found for that email address and password.'
  ],
  'email' => $email,
  'password' => $password,
]);