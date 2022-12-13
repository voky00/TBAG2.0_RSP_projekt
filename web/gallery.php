<?php
// display all errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();



$author = $_GET['author'];
if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
}


require("backend.php");
$is_author = false;



// check if author authorized and is author of this arcticles
if (isset($_SESSION['user']) && isset($_GET['author'])) {
    //$query = "SELECT * FROM users WHERE email = '" . $_SESSION['user'] . "'";
    //$query = "SELECT * FROM users WHERE id = $author AND email = $user";
    $query = "SELECT * FROM users WHERE id = $author AND email = '$user'";
    //echo $query;
    $result = $db->runQueryWithReturn($query);
    $rows = $db->getRows($result);
    echo "user: " . $user;
    print_r($rows);
    //$query = "SELECT * FROM users WHERE id = $author";
    //$result = $db->runQueryWithReturn($query);
    //$rows = $db->getRows($result);
    // F U U U U U C K !
    if ($db->countRows($result) == 1) {
        // compare author id with session id
        if ($rows[0]['id'] == $author) {
            $is_author = true;
        }
        //echo "is author";
        //$is_author = true;
    }
}




if (isset($_GET['author'])) {
    /* sample query
    * SELECT * FROM `authors` AS auth
    * JOIN articles AS art
    * ON art.id = auth.articleid
    * WHERE auth.userid = 3 AND art.status = 'approved'
    */
    $author = $_GET['author'];
    $query = "SELECT * FROM authors AS auth JOIN articles AS art ON art.id = auth.articleid WHERE auth.userid = $author AND art.status = 'approved'";
    $result = $db->runQueryWithReturn($query);
    $articles = $db->getRows($result);
    $page_title = "Články autora";
    unset($journals);
}

if (isset($_GET['author']) && $db->getRole($user) == "author") {
    // show articles of author
    $query = "SELECT * FROM authors AS auth JOIN articles AS art ON art.id = auth.articleid WHERE auth.userid = $author";
    $result = $db->runQueryWithReturn($query);
    $articles = $db->getRows($result);
    $page_title = "Články";
    unset($journals);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM articles WHERE journalid = $id AND status = 'approved'";
    $result = $db->runQueryWithReturn($query);
    $articles = $db->getRows($result);
    $page_title = "Články";
} elseif (!isset($articles)) {
    $query = "SELECT * FROM journal ORDER BY id ASC";
    $result = $db->runQueryWithReturn($query);
    $journals = $db->getRows($result);
    $page_title = "Časopisy";
}

//display header
require("templates/header.php");
require("navigation.php");
//debug
//echo $db->getRole($user);
//print_r($journals);
if (isset($journals)) {
    echo "<table>";
    $i = 0;
    foreach ($journals as $journal) {
        if ($i % 4 == 0) {
            echo "<tr>";
        }
        echo "<td class='blok'><a href='gallery.php?id=" . $journal['id'] . "'> č. " . $journal['number'] . " " . $journal['year'] . "</a></td>";
        if ($i % 4 == 3) {
            echo "</tr>";
        }
        $i++;
    }
    echo "</table>";
}

if (isset($articles)) {
    echo "<table>";
    foreach($articles as $article) {


        /*

        <table>
	<tr><td class="blok" colspan="2">
		<h1>INFO</h1>
Jedná se o webovou verzi známého vědeckého časopisu TBAG Science
Časopis TBAG Science je vědecký časopis, který za krátkou dobu jeho existování nasbíral
několik ocenění na vědeckém poli, byl založen v roce 2012. Náš časopis se snaží vytvořit
skvělé příležitosti pro nové spisovatele a autory. V našem časopise se dozvíte o aktuálním dění ve světě vědy,
o zajímavých teoriích a objevech.
</td></tr>

         */
        //if author is logged in show article status and allow to change it
        if ($is_author) {
            // get article status
            $query = "SELECT status FROM articles WHERE id = " . $article['id'];
            $result = $db->runQueryWithReturn($query);
            $status = $db->getRows($result);
            $status = $status[0]['status'];
        }
        // print row if not author
        if (!$is_author) {
            echo "<tr><td class='blok' colspan='2'><h1>" . $article['header'] . "</h1>" . $article['abstract'];
        }
        else {
            // print row if author
            // print status
            $id = $article['id'];
            echo "<tr><td class='blok' colspan='2'><h5>Stav clanku: " . i18n_status($status) . "</h5><h5><a href='article.php?id=$id&action=edit'>Upravit</a></h5><h1>" . $article['header'] . "</h1>" . $article['abstract'];
        }

        $authors = $db->getAuthors($article['id']);
        echo "<p>";
        foreach($authors as $author) {
            echo '<a href="gallery.php?author=' . $author['id'] . '">' . $author['firstname'] . ' ' . $author['lastname'] . '</a>';
            if ($author != end($authors)) {
                echo ", ";
            }
        }
        echo "</p>";
        makeActions($article['id']);
        echo "</td></tr>";
    }
    echo "</table>";
}
if (isset($_GET['author']) && count($articles) < 1) {
    echo "<h1>Nejsou zde žádné články</h1>";
    $role = $db->getRole($user);
    if (isset($_SESSION['user']) && $role == 'author') {
        echo "<p><a href='add.php'>Přidat článek</a></p>";
    }
}

function makeActions($id, $authorid = null) {
    echo "<div class='actions'>";
    echo "<a href='view.php?id=" . $id . "' target='_blank'>Číst</a>";
    echo " | ";
    echo "<a href='view.php?id=" . $id  . "&action=pdf'>Stáhnout PDF</a>";
    echo " | ";
    echo "<a href='view.php?id=" . $id . "&action=vote'>Hlasovat pro článek</a>";
    // todo: add editing of own articles for authors
    // todo: add editing of articles for editors, adiministrators
    echo "</div>";
}

function i18n_status($status) {
    switch ($status) {
        case 'approved':
            return 'Schváleno';
        case 'declined':
            return 'Zamítnuto';
        case 'new':
            return 'Čeká na schválení';
        case 'review':
            return 'Čeká na recenzi';
    }
    return $status;
}

//display footer
require("templates/footer.php");

/*
<table>
<tr>
		<td class="blok"><a href="###">časopis 2021</a></td>
		<td class="blok"><a href="###">časopis 2020</a></td>
		<td class="blok"><a href="###">časopis 2019</a></td>
		<td class="blok"><a href="###">časopis 2018</a></td>
	</tr>

	<tr>
		<td class="blok"><a href="###">časopis 2017</a></td>
		<td class="blok"><a href="###">časopis 2016</a></td>
		<td class="blok"><a href="###">časopis 2015</a></td>
		<td class="blok"><a href="###">časopis 2014</a></td>
	</tr>


</table>


 */