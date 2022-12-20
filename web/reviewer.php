<?php
//start session if not started
if (!isset($_SESSION)) {
    session_start();
}
//check if authorized
if (!isset($_SESSION['user'])) {
    header("Location: login/");
}
/** @var $db */

require("backend.php");
require("templates/header.php");
require("navigation.php");




$id = $_GET['id'];

//set reviewer to article
if (isset($_GET['reviewer'])) {
    $reviewer = $_GET['reviewer'];
    $query = "INSERT into reviews (articleid, reviewerid) VALUES ($id, $reviewer)";
    $db->runQuery($query);
    $query = "UPDATE articles SET status = 'review' WHERE id = $id";
    $db->runQuery($query);
    //$db->runQuery($query);
    //header("Location: main-clanky.php");
}


// print list of reviewers
$query = "SELECT * FROM users WHERE role = 'reviewer'";
$result = $db->runQueryWithReturn($query);
$reviewers = $db->getRows($result);
echo "<table>";
echo "<tr><td colspan='2'><h2>Recenzenti</h2></td></tr>";
foreach ($reviewers as $reviewer) {
    $name = $reviewer['firstname'] . " " . $reviewer['lastname'];
    echo "<tr><td>" . $name . "</td><td><a href='reviewer.php?reviewer=" . $reviewer['id'] . "&id=" . $id . "'>Přiřadit</a></td></tr>";
}
echo "</table>";

//footer
require("templates/footer.php");
