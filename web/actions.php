<?php
// udalosti
$page_title = "Udalosti";
// check session

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

// get actions

$query = "SELECT * FROM log";
$result = $db->runQueryWithReturn($query);
$actions = $db->getRows($result);

// print actions: date, user, action

echo "<table>";
echo "<tr><td colspan='3'><h2>Události</h2></td></tr>";
echo "<tr><td><b>Datum</b></td><td><b>Uživatel</b></td><td><b>Akce</b></td></tr>";
foreach ($actions as $action) {
    $query = "SELECT * FROM users WHERE id = " . $action['userid'];
    $result = $db->runQueryWithReturn($query);
    $user = $db->getRows($result);
    $name = $user[0]['firstname'] . " " . $user[0]['lastname'];
    echo "<tr><td>" . $action['ts'] . "</td><td>" . $name . "</td><td>" . $action['action'] . "</td></tr>";
}

echo "</table>";




require("templates/footer.php");