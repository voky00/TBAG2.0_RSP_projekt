<?php
require("backend.php");
$db = new Db();


$id = $_GET['id'];
// drop article authors from db
$query = "DELETE FROM authors WHERE articleid = $id";
$db->runQuery($query);
// drop reviews from db
$query = "DELETE FROM reviews WHERE articleid = $id";
$db->runQuery($query);
// drop article from db
$query = "DELETE FROM articles WHERE id = $id";
$db->runQuery($query);

// log action

$db->logAction("Article $id deleted", $db->getUserId($_SESSION['user']));

// Path: main-clanky.php
header("Location: main-clanky.php");