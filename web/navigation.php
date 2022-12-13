<?php


//$db = new Db();
// username

/** @var $role */
// load config.ini
$config = parse_ini_file('config.ini', true);

// menu template
/*
<nav>
    <ul>
        <img src="logo.png" class="logo">
        <li><a href="main-casopis.php">Časopis</a></li>
        <li><a href="main-anketa.html">Anketa</a></li>
        <li><a href="main-info.php">Informace</a></li>
        <li class="selected"><a href="gallery.php">Galerie</a></li>
        <a href="user.html"><img src="testprofile.png" class="profil"></div></a>
    </ul>
</nav>

<div class="body">
*/

// get current page
$currentPage = basename($_SERVER['PHP_SELF']);

//print main navigation
?>
<nav>
    <ul>
        <img src="logo.png" class="logo">
        <?php
        foreach ($config['navigation_main'] as $key => $value) {
            if ($currentPage == $value) {
                echo "<li class='selected'><a href='$value'>$key</a></li>";
            } else {
                echo "<li><a href='$value'>$key</a></li>";
            }
        }
        if ($role == 'author') {
            foreach ($config['navigation_author'] as $key => $value) {
                if ($currentPage == $value) {
                    echo "<li class='selected'><a href='$value'>$key</a></li>";
                } else {
                    echo "<li><a href='$value'>$key</a></li>";
                }
            }

        } elseif ($role == 'editor') {
            foreach ($config['navigation_editor'] as $key => $value) {
                if ($currentPage == $value) {
                    echo "<li class='selected'><a href='$value'>$key</a></li>";
                } else {
                    echo "<li><a href='$value'>$key</a></li>";
                }
            }
        } elseif ($role == 'admin') {
            foreach ($config['navigation_admin'] as $key => $value) {
                if ($currentPage == $value) {
                    echo "<li class='selected'><a href='$value'>$key</a></li>";
                } else {
                    echo "<li><a href='$value'>$key</a></li>";
                }
            }
        } elseif ($role == 'reviewer') {
            foreach ($config['navigation_reviewer'] as $key => $value) {
                if ($currentPage == $value) {
                    echo "<li class='selected'><a href='$value'>$key</a></li>";
                } else {
                    echo "<li><a href='$value'>$key</a></li>";
                }
            }
        }
        ?>
        <a href="login"><img src="testprofile.png" class="profil"></div></a>
    </ul>
</nav>

<div class="body">

