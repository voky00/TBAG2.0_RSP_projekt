<?php

require("../backend.php");

   if (isset($_GET['deleteuser'])) {
     $db = new Db();
     $user = $_GET['deleteuser'];
      $dotaz = " DELETE FROM users WHERE id = '$user' ";
      $db->runQuery($dotaz);
       header('location:sprava.php?account=true');
  }

function Galeri(){
  // $db = new Db();
  // $dotaz = " SELECT * FROM articles GROUP BY  ";
  // $res = $db->runQueryWithReturn($dotaz);
  // $res = $res->fetch_assoc();
}
function Info(){
   $db = new Db();
   $dotaz = " SELECT * FROM pages WHERE id = '1' ";
   $res = $db->runQueryWithReturn($dotaz);
   $res = $res->fetch_assoc();
   echo $res['content'];
}
function Account(){
   $db = new Db();




echo "<TABLE>";

echo "<tr style='background-color: lightgrey;'>
<td>id</td>
<td>firstname</td>
<td>lastname</td>
<td>email</td>
<td>role</td>
<td></td>
</tr>";
$select = "SELECT * FROM users";
$result = mysqli_query($db->getConn(), $select);
 if(mysqli_num_rows($result) > 0){
   $j=0;
for ($i=1; $i < 999; $i++) { 

   $dotaz = " SELECT * FROM users WHERE id = '$i' ";
   $res = $db->runQueryWithReturn($dotaz);
   $res = $res->fetch_assoc();
   if ($res != NULL){
      $j++;
   if($j%2==0)
   echo "<tr style='background-color: lightgrey;'>
   <td>".$res['id']."</td>
   <td>".$res['firstname']."</td>
   <td>".$res['lastname']."</td>
   <td>".$res['email']."</td>
   <td>".$res['role']."</td>
   <td><a href='?deleteuser=".$i."'>delete<a></td>
   </tr>";
   else
   echo "<tr>
   <td>".$res['id']."</td>
   <td>".$res['firstname']."</td>
   <td>".$res['lastname']."</td>
   <td>".$res['email']."</td>
   <td>".$res['role']."</td>
   <td><a href='?deleteuser=".$i."'>delete<a></td>
   </tr>";
}


}}
echo "</TABLE>";

}
?>
<!DOCTYPE html>
<html lang="cs">
<head>
   
   <meta charset="utf-8" />
   <title>TBAG Science - správa</title>
   <link rel="stylesheet" type="text/css" href="style.css">
   <link rel="shortcut icon" href="../src/icon.png"/>
</head>
<body>

<div class="menu">
<ul>
   <h2>Web kontent</h2> 
  <a href="?galeri=true" >Galerie</a><br>
  <a href="?info=true" >Informace</a><br>
</ul>
<br>
<ul>
   <h2>Správa</h2>
  <a href="?account=true" >Účty</a><br>
</ul>
</div>


 <div class="top"></div>   

<div class="content">
   <?php
      if (isset($_GET['galeri'])) {
    Galeri();
  }
if (isset($_GET['info'])) {
    Info();
  }
if (isset($_GET['account'])) {
    Account();
  }
   ?>
</div>



 <!-- 
    <a href="sprava.html" style="position: fixed;top: 2%;right: 2%;">Odhlásit se</a>
-->
 




</body>
</html>






<style>

   body, html{
   margin:0;
   padding:0;
}

body{
font-size: 20px;
}
.menu{
   
   position: absolute;
   height: 100%;
   width: 15%;
   background-color: lightgray;
}
.top{
   z-index: -1;
   position: absolute;
   top: 0;
   background-color: lightgray;
   width: 100%;
   height: 5%;
}
a{
   text-decoration: none;
   color: black;
}
a:hover{
   color: red;
}
.content{
    position: absolute;
    top: 20%;
    left: 20%;
}
table {
  border-spacing: 0;

}
th, td {
  padding: 5px;
}
td{
   padding-right: 75px;
   padding-left: 75px;
}
   </style>

