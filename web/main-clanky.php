<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
//check if authorized
if (!isset($_SESSION['user'])) {
    header("Location: login/");
}
/** @var $db */

require("backend.php");
require("templates/header.php");
require("navigation.php");

if (!isset($_GET['status'])) {
    $status = "new";
} else {
    $status = $_GET['status'];
}
$title = "Nové články";
switch ($status) {
    case "approved":
        $title = "Přijaté články";
        break;
    case "declined":
        $title = "Zamítnuté články";
        break;
    case "review":
        $title = "Články k recenzi";
        break;
    case "all":
        $title = "Všechny články";
        break;
    default:
        break;
}
// db statuses: new, reviewed, approved, declined, review
?>


<!-- html navigation: new articles, reviewing, published, rejected, all articles -->
<table>
    <tr>
        <td><a href="?status=new">Nové články</a></td>
        <td><a href="?status=review">Recenze</a></td>
        <td><a href="?status=approved">Publikované</a></td>
        <!-- zamítnuté -->
        <td><a href="?status=declined">Zamítnuté</a></td>
        <!-- všechny -->
        <td><a href="?status=all">Všechny</a></td>
    </tr>
</table>
<table class="blok" style="width: 80%;">

    <?php
    //get articles
    echo "<tr><td colspan='3'><h2>$title</h2></td></tr>";
    if ($status != "all") {
        $query = "SELECT * FROM articles WHERE status = '$status'";
    } else {
        $query = "SELECT * FROM articles";
    }

    $result = $db->runQueryWithReturn($query);
    $rows = $db->getRows($result);
    if (count($rows) == 0) {
        echo "<tr><td colspan='3'>Žádné články</td></tr>";
    }
    //print articles list:
    foreach ($rows as $row) {
        $id = $row['id'];
        $title = $row['header'];
        $status = $row['status'];
        $journal = $row['journalid'];
        $query = "SELECT * FROM journal WHERE id = $journal";
        $result = $db->runQueryWithReturn($query);
        $journal = $db->getRows($result);
        $journal = $journal[0];
        $journal = $journal['number'] . "/" . $journal['year'];

        // make actions: review, approve, decline, edit, delete
        $actions = "";
        if ($status == "new") {
            $actions .= "<a href='reviewer.php?id=$id'>Recenzent</a><br>";
        }
        if ($status == "reviewed") {
            //posudek
            $actions .= "<a href='review.php?id=$id'>Posudek</a><br>";
            //$actions .= "<a href='reviewer.php?id=$id'>Recenzent</a><br>";
            $actions .= "<a href='approve.php?id=$id'>Schválit</a><br>";
            $actions .= "<a href='decline.php?id=$id'>Zamítnout</a><br>";
        }
        if ($status == "review") {
            //posudek
            // check if review is not null
            $query = "SELECT * FROM reviews WHERE articleid = $id";
            $result = $db->runQueryWithReturn($query);
            $reviews = $db->getRows($result);
            //check content of review is not null
            $review = $reviews[0];
            $review = $review['content'];
            if ($review != null) {
                $actions .= "<a href='review.php?id=$id'>Posudek</a><br>";
                $actions .= "<a href='approve.php?id=$id'>Schválit</a><br>";
                $actions .= "<a href='decline.php?id=$id'>Zamítnout</a><br>";
            }
        }
        if ($status == "approved") {
            $actions .= "<a href='decline.php?id=$id'>Zamítnout</a><br>";
        }
        if ($status == "declined") {
            // review
            $actions .= "<a href='review.php?id=$id'>Posudek</a><br>";
            $actions .= "<a href='approve.php?id=$id'>Schválit</a><br>";
        }
        $actions .= "<a href='article.php?id=$id&action=edit'>Upravit</a><br>";
        $actions .= "<a href='delete.php?id=$id'>Smazat</a>";
        echo "<tr><td>$title</td><td>$journal</td><td>$actions</td></tr>";

        //echo "<tr><td><a href='article.php?id=$id'>$title</a></td><td><a href='article.php?action=edit&id=$id'>Upravit</a><br><a href='#'>Recenzent</a><br>Schválit<br>Odmítnout</td><td>$journal</td></tr>";
    }

    //todo
    function check_review($db, $id) {
        $query = "SELECT * FROM reviews WHERE articleid = $id";
        $result = $db->runQueryWithReturn($query);
        $reviews = $db->getRows($result);
        //check content of review is not null
        $review = $reviews[0];
        $review = $review['content'];
        if ($review != null) {
            return true;
        } else {
            return false;
        }
    }



    ?>

<!--	<tr><td><h1>Články</h1></td></tr>-->
<!--	<tr><td><a href="###">Lorem ipsum dolor sit amet. &nbsp <b>stav: čeká na schválení</b></a></td></tr>-->
<!--	<tr><td><a href="###">Ut enim ad minima veniam. &nbsp <b>stav: recenzuje se</b></a></td></tr>-->
<!--	<tr><td><a href="###">Duis ante orci, molestie v. &nbsp <b>stav: čeká na schválení úprav</b></a></td></tr>-->
<!--	<tr><td><a href="###">Duis ante orci, molestie vor sit amet. &nbsp <b>stav: čeká na schválení</b></a></td></tr>-->
<!--	<tr><td><a href="###">Ut enim ad minima veniam sit amet. &nbsp <b>stav: čeká na schválení</b></a></td></tr>-->
<!--	<tr><td><a href="###">Ut enim ad minima veniam. &nbsp <b>stav: čeká na schválení úprav</b></a></td></tr>-->
<!--	<tr><td><a href="###">Lorem ipsum ante orci, molestie v. &nbsp <b>stav: recenzuje se</b></a></td></tr>-->
<!--	<tr><td><a href="###">Duis ante orci, molestie v. &nbsp <b>stav: recenzuje se</b></a></td></tr>-->
</table>
<?
require("templates/footer.php");



