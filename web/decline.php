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


//change article status to declined
$query = "UPDATE articles SET status = 'declined' WHERE id = " . $_GET['id'];

$db->runQuery($query);
// log action

$db->logAction("Article " . $_GET['id'] . " declined", $db->getUserId($_SESSION['user']));


header("Location: main-clanky.php");