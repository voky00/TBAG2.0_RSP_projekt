<?php

//get data from $_POST

$db = new Db();

$email = $_POST['email'];
$password = $_POST['password'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$role = "reader";

//hash password
$hash = password_hash($password, PASSWORD_DEFAULT);

//insert into database
$query = "INSERT INTO users (email, password, firstname, lastname, role) VALUES ('$email', '$hash', '$firstname', '$lastname', '$role')";
