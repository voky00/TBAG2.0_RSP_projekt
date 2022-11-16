<?php
// display all errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require("backend.php");
echo "Hello World";

$db = new Db();

if (isset($_GET['author'])) {
    /* sample query
    * SELECT * FROM `authors` AS auth
    * JOIN articles AS art
    * ON art.id = auth.articleid
    * WHERE auth.userid = 3;
    */
    $author = $_GET['author'];
    $query = "SELECT * FROM authors AS auth JOIN articles AS art ON art.id = auth.articleid WHERE auth.userid = $author";
    $result = $db->runQueryWithReturn($query);
    $articles = $db->getRows($result);
    $page_title = "Články autora";
    unset($journals);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM articles WHERE journalid = $id";
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

    foreach($articles as $article) {
        echo "<div class='article'>";
        echo "<h2>" . $article['header'] . "</h2>";
        echo "<p>" . $article['abstract'] . "</p>";
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
        echo "</div>";
    }
}

function makeActions($id) {
    echo "<div class='actions'>";
    echo "<a href='article.php?id=" . $id . "'>Číst</a>";
    echo " | ";
    echo "<a href='article.php?id=" . $id  . "&action=pdf'>Stáhnout PDF</a>";
    echo " | ";
    echo "<a href='article.php?id=" . $id . "&action=vote'>Hlasovat pro článek</a>";
    echo "</div>";

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