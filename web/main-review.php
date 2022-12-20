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
//get reviewer id
$query = "SELECT * FROM users WHERE email = '" . $_SESSION['user'] . "'";
$result = $db->runQueryWithReturn($query);
$rows = $db->getRows($result);
$reviewer = $rows[0]['id'];


$title = "Nové články";
if ($status == "reviewed") {
    $title = "Posouzené články";
}


// db statuses: new, reviewed, approved, declined, review
?>


<!-- html navigation: new articles, reviewing, published, rejected, all articles -->
<table>
    <tr>
        <td><a href="?status=new">Nové články k posouzeni</a></td>
        <td><a href="?status=reviewed">Posouzené članky</a></td>
    </tr>
</table>
<table class="blok" style="width: 80%;">

    <?php
    //get articles
    echo "<tr><td colspan='3'><h2>$title</h2></td></tr>";
    if ($status != "reviewed") {
        // get articles by reviewer id
        /* sample query
        SELECT * FROM `articles` as art
        JOIN reviews as r ON art.id = r.articleid
        WHERE r.reviewerid = 27 AND r.status = 'review'
        */
        $query = "SELECT * FROM articles as art
        JOIN reviews as r ON art.id = r.articleid
        WHERE r.reviewerid = $reviewer AND art.status = 'review'";
    } else {
        $query = "SELECT * FROM articles as art
        JOIN reviews as r ON art.id = r.articleid
        WHERE r.reviewerid = $reviewer";

    }
    //echo $status;
    //echo $query;
    $result = $db->runQueryWithReturn($query);
    $rows = $db->getRows($result);
    if (count($rows) == 0) {
        echo "<tr><td colspan='3'>Žádné články</td></tr>";
    }
    //print articles list:
    //echo $status;
    foreach ($rows as $row) {
        $id = $row['id'];
        $title = $row['header'];
        //$status = $row['status'];
        $journal = $row['journalid'];
        $query = "SELECT * FROM journal WHERE id = $journal";
        $result = $db->runQueryWithReturn($query);
        $journal = $db->getRows($result);
        $journal = $journal[0];
        $journal = $journal['number'] . "/" . $journal['year'];
        // get article id
        $articleid = $row['articleid'];

        // make actions: review, approve, decline, edit, delete
        $actions = "";
        $actions .= "<a href='review-form.php?id=$articleid'>Posudek</a><br>";
        //print_r($row);
        //echo "<br>" . $status . "<br>";

        if ($status == "new") {
            echo "<tr><td>$title</td><td>$journal</td><td>$actions</td></tr>";
        }
        if ($status == "reviewed" && $row['content'] != "") {
            echo "<tr><td>$title</td><td>$journal</td><td>$actions</td></tr>";
        }

        //echo "<tr><td>$title</td><td>$journal</td><td>$actions</td></tr>";

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



