<?php
require("../backend.php");

$db = new Db();

// create list of 10 random names
$names = array("John", "Mary", "Peter", "Ivana", "Martin", "Barbora", "Jana", "Petr", "Josef", "Eva");

// create list of 10 random last names
$lastnames = array("Smith", "Doe", "Parker", "Kent", "Wayne", "Stark", "Rogers", "Romanoff", "Odinson", "Maximoff");

// create 10 random users: {firstname, lastname, email, role, password}
$users = array();
for ($i = 0; $i < 10; $i++) {
    $user = array();
    $user['firstname'] = $names[rand(0, 9)];
    $user['lastname'] = $lastnames[rand(0, 9)];
    $user['email'] = $user['firstname'] . $user['lastname'] . '@gmail.com';
    $user['role'] = 'author';
    $user['password'] = password_hash('heslo', PASSWORD_DEFAULT);
    $users[] = $user;
}

// insert users into database
foreach ($users as $user) {
    $query = "INSERT INTO users (firstname, lastname, email, role, password) VALUES ('" . $user['firstname'] . "', '" . $user['lastname'] . "', '" . $user['email'] . "', '" . $user['role'] . "', '" . $user['password'] . "')";
    $db->runQuery($query);
}

//$authors = array();
