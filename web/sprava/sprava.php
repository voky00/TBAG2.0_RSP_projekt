<?php

require("../backend.php");

   if (isset($_GET['deleteuser'])) {
     $user = $_GET['deleteuser'];
      $dotaz = " DELETE FROM users WHERE id = '$user' ";
      $db->runQuery($dotaz);
       header('location:sprava.php?account=true');
  }
   if(isset($_GET['updateuser'])){
      $user = $_GET['updateuser'];
     $firstname = $_POST['firstname'];
     $lastname =$_POST['lastname'];
     $email =$_POST['email'];
     $role = $_POST['role'];
      $dotaz = " UPDATE users SET firstname='$firstname', lastname='$lastname', email='$email',role='$role' WHERE id = '$user' ";
      $db->runQuery($dotaz);
       header('location:sprava.php?account=true');
}
   if(isset($_GET['updatewebcontent'])){
      $id = $_GET['updatewebcontent'];
      $title = $_POST['title'];
      $content =$_POST['content'];
      $shown =$_POST['shown'];
      $dotaz = " UPDATE pages SET title='$title', content='$content', shown='$shown' WHERE id = '$id' ";
      $db->runQuery($dotaz);
       header('location:sprava.php?info=true');
}
function Galeri(){
   $db = new Db();
   echo "<TABLE>";

echo "<tr style='background-color: lightgrey;'>
<td>id</td>
<td>header</td>
<td>abstract</td>
<td>content</td>
<td>votes</td>
<td>journalid</td>
<td>status</td>
</tr>";
 $j=0;
for($i=1; $i < 999; $i++){
   $dotaz = " SELECT * FROM articles WHERE id = '$i' ";
   $res = $db->runQueryWithReturn($dotaz);
   $res = $res->fetch_assoc();

   if($res!=NULL){
       $j++;
   if($j%2==0)
   echo "<tr style='background-color: lightgrey;'>
    <td>".$res['id']."</td>
   <td>".$res['header']."</td>
   <td>".$res['abstract']."</td>
   <td>".$res['content']."</td>
   <td>".$res['votes']."</td>
   <td>".$res['journalid']."</td>
   <td>".$res['status']."</td>
   </tr>";
   else
   echo "<tr>
    <td>".$res['id']."</td>
   <td>".$res['header']."</td>
   <td>".$res['abstract']."</td>
   <td>".$res['content']."</td>
   <td>".$res['votes']."</td>
   <td>".$res['journalid']."</td>
   <td>".$res['status']."</td>
   </tr>";
   }
}
   echo "</TABLE>";
}
function Info(){
   $db = new Db();
   echo "<TABLE>";

echo "<tr style='background-color: lightgrey;'>
<td>id</td>
<td>title</td>
<td>content</td>
<td>shown</td>
<td></td>
</tr>";
 $j=0;
for($i=1; $i < 999; $i++){
   $dotaz = " SELECT * FROM pages WHERE id = '$i' ";
   $res = $db->runQueryWithReturn($dotaz);
   $res = $res->fetch_assoc();

   if($res!=NULL){
       $j++;
   if($j%2==0)
   echo "<tr style='background-color: lightgrey;'>
   <td>".$res['id']."</td>
   <td>".$res['title']."</td>
   <td>".$res['content']."</td>
   <td>".$res['shown']."</td>
   <td><a href='?webContentUpdate=".$i."'>update<a></td>
   </tr>";
   else
   echo "<tr>
   <td>".$res['id']."</td>
   <td>".$res['title']."</td>
   <td>".$res['content']."</td>
   <td>".$res['shown']."</td>
   <td><a href='?webContentUpdate=".$i."'>update<a></td>
   </tr>";
   }
}
   echo "</TABLE>";
}
function webContentUpdate(){
   $db = new Db();
$id = $_GET['webContentUpdate'];

$dotaz = " SELECT * FROM pages WHERE id = '$id' ";
   $res = $db->runQueryWithReturn($dotaz);
   $res = $res->fetch_assoc();

echo "<form style='margin-left:20%' action='sprava.php?updatewebcontent=".$id."' method='post' id='webContent'>
ID: ".$id."<br>
title:
<input size='50' type='text' name='title' value='".$res['title']."' ><br>
content<br>
<textarea rows='10' cols='150' name='content' form='webContent'>
".$res['content']."</textarea><br>
shown:  
<select name = 'shown'>  
  <option value='0'>0</option> 
  <option value='1'>1</option>  
  <option value='2'>2</option>  
  <option value='3'>3</option>  
  <option value='4'>4</option>    
</select> <br>
<input type='submit' value='Upravit'>
</form>";


}
function AccountUpdate(){
$user = $_GET['accountUpdate'];

echo "<form action='sprava.php?updateuser=".$user."' method='post'>
ID: ".$user."<br>
Jméno: <input type='text' name='firstname'><br>
Příjmení: <input type='text' name='lastname'><br>
Email: <input type='text' name='email'><br>
Role:  
<select name = 'role'>  
  <option value='reader'>reader</option> 
  <option value='author'>author</option>  
  <option value='editor'>editor</option>  
  <option value='reviewer'>reviewer</option>  
  <option value='admin'>admin</option>    
</select>  <br><br>
<input type='submit' value='Upravit'>
</form>";


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
   <td><a href='?accountUpdate=".$i."'>update<a></td>
   <td><a href='?deleteuser=".$i."'>delete<a></td>
   </tr>";
   else
   echo "<tr>
   <td>".$res['id']."</td>
   <td>".$res['firstname']."</td>
   <td>".$res['lastname']."</td>
   <td>".$res['email']."</td>
   <td>".$res['role']."</td>
   <td><a href='?accountUpdate=".$i."'>update<a></td>
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
  if (isset($_GET['accountUpdate'])) {
    AccountUpdate();
  }
  if (isset($_GET['webContentUpdate'])) {
    webContentUpdate();
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
   
   position: fixed;
   height: 100%;
   width: 15%;
   background-color: lightgray;
}
.top{
   z-index: -1;
   position: fixed;
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
    left: 16%;
}
table {
  border-spacing: 0;

}
th, td {
  padding: 5px;
}
td{
   padding-right: 20px;
   padding-left: 20px;
}
   </style>

