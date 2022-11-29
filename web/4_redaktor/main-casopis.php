<?php
 
$user = 'slaby06';
$password = 'Tis*445577';
 
$database = 'slaby06';


$servername='localhost';
$mysqli = new mysqli($servername, $user,
                $password, $database);
 
if ($mysqli->connect_error) {
    die('Connect Error (' .
    $mysqli->connect_errno . ') '.
    $mysqli->connect_error);
}
 

$sql = " SELECT * FROM textarea_value";
$result = $mysqli->query($sql);
$mysqli->close();
?>


<!DOCTYPE html>
<html lang="cs">
 
<head>
    <meta charset="UTF-8">
    <title>Clanky</title>

    <style>
        body{
            background-color: #90E0EF;
        }
        table {
            width: 85%;
            font-size: large;
            margin-left: auto;
            margin-right: auto;
            border-spacing: 70px;
        }
 
        h1 {
            text-align: center;
            color: black;
            font-size: 50px;
            font-family: sans-serif;
        }
 
        td {
            background-color: #48CAE4;
            border: 1px solid black;
            border-radius: 30px;
            font-size: 25px;
            font-family: sans-serif;
        }
 
        th,
        td {
            font-weight: bold;
            border: 1px solid #90E0EF;
            padding: 10px;
            text-align: center;
        }
 
        td {
            font-weight: lighter;
        }
        nav {
            top: 0;
            position: fixed;
            float: left;
            width: 110%;
            background-color: #0077B6;
        }
        nav .logo {
            position: absolute;
            width: 130px;
            height: 65px;
            left: 2%;
            padding: 5px;
        }
        nav .profil {
            position: absolute;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            right: 2%;
            padding: 12px;
        }
        nav ul {
            margin-top: 0;
            margin-bottom: 0;
            margin-left: 25%;
            width: 60%;
            list-style-type: none;
        }
        nav ul li {
            display: inline-block;
            padding: 20px;
            font-size: 30px;
        }
        nav ul li:hover {
            background-color: #00B4D8;
        }
        nav ul li a {
            color: #03045E;
        }
        nav ul li:hover a {
            color: white;
        }
        .selected {
            background-color: #0096C7;
        }

    </style>
</head>
 
<body>
<nav>
    <ul>
        <img src="../src/logo.png" class="logo">
        <li class="selected"><a href="main-casopis.php">Časopis</a></li>
        <li><a href="main-info.html">Informace</a></li>
        <li><a href="main-galerie.html">Galerie</a></li>
        <a href="user.html"><img src="../src/testprofile.png" class="profil"></div></a>
    </ul>
</nav>
<br><br><br>
    <section>
        <table>
            <?php
                while($rows=$result->fetch_assoc())
                {
            ?>


            <tr>
                <td><?php echo $rows['textarea_content'];?></td>
            </tr>

            <?php
                }
            ?>
        </table>
    </section>
</body>
 
</html>