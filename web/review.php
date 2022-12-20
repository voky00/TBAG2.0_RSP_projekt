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
//show review for article
$query = "SELECT * FROM reviews WHERE articleid = " . $_GET['id'];
$result = $db->runQueryWithReturn($query);
$reviews = $db->getRows($result);
//print_r($reviews);
echo "<table>";
echo "<tr><td colspan='2'><h2>Recenze</h2></td></tr>";

foreach ($reviews as $review) {
    $query = "SELECT * FROM users WHERE id = " . $review['reviewerid'];
    $result = $db->runQueryWithReturn($query);
    $reviewer = $db->getRows($result);
    $name = $reviewer[0]['firstname'] . " " . $reviewer[0]['lastname'];
    echo "<tr><td>" . $name . "</td><td>". $review['content'] ."</td></tr>";
}

echo "</table>";
// accept or reject article
echo "<table>";
echo "<tr><td><a href='approve.php?id=$id'>Schválit</a></td><td><a href='decline.php?id=$id'>Zamítnout</a></td></tr>";
echo "</table>";
//footer
require("templates/footer.php");