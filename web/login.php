<?php
//error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


/** @var $db */
//start session
session_start();
require("backend.php");

require("templates/header.php");
require("navigation.php");
// print login form
if (!isset($_SESSION['user'])) {
    echo "<form action='login.php' method='post'>
        <input type='text' name='username' placeholder='Username'>
        <input type='password' name='password' placeholder='Password'>
        <input type='submit' name='submit' value='Login'>
    </form>";
} else {
    echo "You are logged in as " . $_SESSION['user'];
}

//process post data
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    // password_verify($password, $hash)
    $query = "SELECT * FROM users WHERE email = '$username'";
    $result = $db->runQueryWithReturn($query);
    $rows = $db->getRows($result);
    if (count($rows) == 1) {
        $hash = $rows[0]['password'];
        if (password_verify($password, $hash)) {
            $_SESSION['user'] = $username;
            header("Location: gallery.php");
        } else {
            echo "Wrong password";
        }
    } else {
        echo "Wrong username";
    }
}


// footer
require("templates/footer.php");


