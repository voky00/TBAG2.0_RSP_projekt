<?php

if (!isset($_SESSION)) {
    session_start();
}
//check if authorized
if (!isset($_SESSION['user'])) {
    header("Location: login/");
}
/** @var $db */

require("backend.php");

//change article status to approved
$query = "UPDATE articles SET status = 'approved' WHERE id = " . $_GET['id'];

$db->runQuery($query);

$db->logAction("Article " . $_GET['id'] . " approved", $db->getUserId($_SESSION['user']));

header("Location: main-clanky.php");
