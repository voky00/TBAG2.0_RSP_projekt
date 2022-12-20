<?php

//check session user
if (isset($_SESSION['user'])) {
    $username = $_SESSION['user'];
// check user role
    $query = "SELECT role FROM users WHERE email = '$username'";
    /** @var $db */
    $result = $db->runQueryWithReturn($query);
    $rows = $db->getRows($result);
    $role = $rows[0]['role'];
}
else {
    $role = "guest";
}



?>

<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="utf-8" />
    <title><?php /** @var $page_title */
        echo $page_title; ?>
    </title>
    <link rel="shortcut icon" href="icon.png"/>
    <link rel="stylesheet" type="text/css" href="styles/style.css">
</head>

<body>


