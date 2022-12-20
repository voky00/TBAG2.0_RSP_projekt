<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <title>Článek</title>
    <link rel="shortcut icon" href="icon.png"/>
    <script LANGUAGE="JavaScript">
        function confirmSubmit()
        {
            var agree=confirm("Jste si jisti, že checete článek opravdu odeslat???");
            if (agree)
                return true ;
            else
                return false ;
        }
        // -->
    </script>
    <link rel="stylesheet" href="styles/article.css">
</head>
<body>
<div>
<h1>Sepsání článku pro časopis T-BAG Science</h1>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
require('backend.php');
// check if user is logged in, redirect to login if not


// if $post is set, save article to db
if (isset($_POST['submit'])) {
    if (!isset($_SESSION['user'])) {
        header("Location: login/");
    }
    $title = $_POST['header'];
    $author = $_SESSION['user'];
    $abstract = $_POST['abstract'];
    $text = $_POST['content'];
    $status = "new";
    $action = $_POST['action'];
    //debug: print all variables

    // if action is add article, insert new article to db

    if ($action == "add") {
        // get author id
        $query = "SELECT id FROM users WHERE email = '$author'";
        $result = $db->runQueryWithReturn($query);
        $rows = $db->getRows($result);
        $author_id = $rows[0]['id'];
        $query = "INSERT INTO articles (header, abstract, content, status, votes, journalid) VALUES ('$title', '$abstract', '$text', '$status', 0, 1)";
        $db->runQuery($query);
        // get article id
        $query = "SELECT id FROM articles WHERE header = '$title'";
        $result = $db->runQueryWithReturn($query);
        $rows = $db->getRows($result);
        $article_id = $rows[0]['id'];
        // insert author id and article id to db
        $query = "INSERT INTO authors (userid, articleid, place) VALUES ('$author_id', '$article_id', '1')";
        $db->runQuery($query);
        // log action
        $db->logAction("Article $article_id added", $db->getUserId($_SESSION['user']));
        echo "<p>Článek byl úspěšně přidán do databáze.</p>";
        //redirect to gallery with author id
        header("Location: gallery.php?author=$author_id");
    }
    // if action is edit article, update article in db
    if ($action == "edit") {
        $id = $_POST['id'];
        $query = "UPDATE articles SET header = '$title', abstract = '$abstract', content = '$text' WHERE id = '$id'";
        $db->runQuery($query);
        echo "<p>Článek byl úspěšně upraven.</p>";
        //redirect to gallery with author id
        $db->logAction("Article $title edited", $author_id);
        header("Location: gallery.php?author=$author_id");
    }


    // init variables

}

$title = "";
$abstract = "";
$text = "";
// if action is edit fill the form with article data
if (isset($_GET['action']) && $_GET['action'] == "edit") {
    $id = $_GET['id'];
    $query = "SELECT * FROM articles WHERE id = '$id'";
    $result = $db->runQueryWithReturn($query);
    $rows = $db->getRows($result);
    $title = $rows[0]['header'];
    $abstract = $rows[0]['abstract'];
    $text = $rows[0]['content'];
}

//generate form

?>

<!-- article form -->

<form action="article.php" method="POST">
    <!-- header -->

    <input type="text" name="header" placeholder="Název článku" size="100" value="<?php echo $title; ?>" required><br>
    <textarea name="abstract" id="hranka_abstract" placeholder="Abstract" rows="10" cols="90"><?php echo $abstract;?></textarea>
    <textarea name="content" id="hranka" rows="22" placeholder="Text članku" cols="90"><?php echo $text; ?></textarea>
    <!-- hidden field edit or add -->
    <?php if (isset($_GET['action']) && $_GET['action'] == "edit") {
        echo "<input type='hidden' name='action' value='edit'>";
        echo "<input type='hidden' name='id' value='" . $_GET['id'] . "'>";
    } else {
        echo "<input type='hidden' name='action' value='add'>";
    } ?>
    <br>
    <input type="submit" name="submit" value="Odeslat">

</form>

</div>
<br>
</body>
</html>