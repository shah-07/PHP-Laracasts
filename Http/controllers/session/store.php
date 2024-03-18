<?php

use Core\Authenticator;
use Core\Session;
use Http\Forms\LoginForm;

// var_dump("I have been posted");
$email = $_POST['email'];
$password = $_POST['password'];


//validate the form inputs.
$form = new LoginForm();

if ($form->validate($email, $password)) {
  if ((new Authenticator)->attempt($email, $password)) {
    redirect('/');
  }
  $form->error('email', 'No matching account found for that email address and password.');
}

Session::flash('errors', $form->errors());

redirect('/login');
