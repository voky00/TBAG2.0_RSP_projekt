<?php
require 'backend.php';
/** @var TYPE_NAME $db */
// Get the ID from the URL
$id = $_GET['id'];

// Get article from DB
$query = "SELECT * FROM articles WHERE id = $id";

$result = $db->runQueryWithReturn($query);
$article = $db->getRows($result);

$title = $article[0]['header'];
$abstract = $article[0]['abstract'];
$content = $article[0]['content'];

// get authors
$authors = $db->getAuthors($id);

// get action

if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = "view";
}

if ($action == 'pdf') {
    // wkhtmltopdf

    echo passthru("wkhtmltopdf http://vspj.website/rsp/web/view.php?id=$id /tmp/$id.pdf");
    // send file to user
    header('Content-Type: application/pdf');
    header('Content-Disposition: attachment; filename="article.pdf"');
    readfile("/tmp/$id.pdf");
    exit;

}

if ($action == 'vote') {


    // get previous url
    $previous = $_SERVER['HTTP_REFERER'];

    // update votes count
    $query = "UPDATE articles SET votes = votes + 1 WHERE id = $id";
    $db->runQuery($query);

    // redirect back to previous page
    header("Location: $previous");
    exit;



}

?>

<html lang="cs">
<head>
    <meta charset="UTF-8">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="styles/view.css">
</head>
<body>
<div class="container">
    <h1><?php echo $title; ?></h1>
    <?php
    foreach ($authors as $author) {
        echo "<span class='author'>" . $author['firstname'] . " " . $author['lastname'] . "</span>";
    }
    ?>

    <p class="abstract"><?php echo $abstract; ?></p>
    <p><?php echo $content; ?></p>
</div>
</body>
</html>
