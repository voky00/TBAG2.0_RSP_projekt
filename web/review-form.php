<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <title>Posouzeni clanku</title>
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
    <h1>Posouzeni clanku</h1>
    <?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    session_start();
    require('backend.php');
    // check if user is logged in, redirect to login if not


    // if $post is set, save review to db
    if (isset($_POST['submit'])) {
        if (!isset($_SESSION['user'])) {
            header("Location: login/");
        }
        $reviewer = $_SESSION['user'];
        //$status = "new";
        $review = $_POST['review'];
        $articleid = $_POST['articleid'];
        $action = $_POST['action'];

        //get reviewer id
        $query = "SELECT id FROM users WHERE email = '$reviewer'";
        $result = $db->runQueryWithReturn($query);
        $rows = $db->getRows($result);
        $reviewer_id = $rows[0]['id'];

        $query = "UPDATE reviews SET content = '$review' WHERE articleid = '$articleid' AND reviewerid = '$reviewer_id'";
        //echo $query;
        $db->runQuery($query);
        header("Location: main-review.php");


        // init variables

    }
    if (!isset($articleid)) {
        $articleid = $_GET['id'];
    }
    $title = "";
    $abstract = "";
    $text = "";
    $review = "";

    // get article
    $query = "SELECT * FROM articles WHERE id = $articleid";
    $result = $db->runQueryWithReturn($query);
    $rows = $db->getRows($result);
    $title = $rows[0]['header'];
    $abstract = $rows[0]['abstract'];
    $text = $rows[0]['content'];


    // if action is edit fill the form with article data
    if (isset($_GET['action']) && $_GET['action'] == "edit") {

    }

    $id = $_GET['id'];
    // get review from db
    $query = "SELECT * FROM reviews WHERE articleid = '$id'";
    //echo $query;
    $result = $db->runQueryWithReturn($query);
    $rows = $db->getRows($result);
    $review = $rows[0]['content'];

    if (!isset($action)) {
        $action = "add";
    }

    //show article
    echo "<h2>$title</h2>";
    echo "<p>$abstract</p>";
    echo "<p>$text</p>";

    //show review form
    echo "<form action='review-form.php' method='post'>";
    echo "<input type='hidden' name='articleid' value='$articleid'>";

    echo "<input type='hidden' name='action' value='$action'>";
    echo "<input type='hidden' name='id' value='$articleid'>";
    echo "<textarea name='review' rows='10' cols='50'>$review</textarea><br>";
    echo "<input type='submit' name='submit' value='Odeslat'>";
    echo "</form>";


    ?>

    <!-- article form -->


</div>
<br>
</body>
</html>