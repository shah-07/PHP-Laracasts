<?php
use Core\App;
use Core\Database;
use Core\Validator;

$email = $_POST['email'];
$password = $_POST['password'];

//validate the form inputs.
$errors = [];
if (!Validator::email($email)) {
  $errors['email'] = 'Please provide a valid email address';
}
if (!Validator::string($password, 7, 255)) {
  $errors['password'] = 'Please provide a password at least seven characters';
}
if (!empty($errors)) {
  return view('registration/create.view.php', [
    'errors' => $errors,
    'email' => $email,
    'password' => $password,
  ]);
}

$db = App::resolve(Database::class);
//check if the accout already exists
$user = $db->query('select * from users where email = :email', [
  'email' => $email,
])->find();

if ($user) {
  //then someone with that email already exists and has an account
  //if yes, redirect to a login page
  header('location: /login');
  exit();
} else {
  //if not, save one to the database, and then log the user in, and redirect.
  $db->query('INSERT INTO users(email, password) VALUES(:email, :password)', [
    'email' => $email,
    'password' => password_hash($password, PASSWORD_BCRYPT),
  ]);


  header('location: /login');
  exit();
}
