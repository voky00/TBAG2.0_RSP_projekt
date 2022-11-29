<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

require("backend.php");
require("templates/header.php");
require("navigation.php");

?>
<body>

<nav>
<ul>
  <img src="../src/logo.png" class="logo">
  <li><a href="main-casopis.html">Časopis</a></li>
  <li><a href="main-info.html">Informace</a></li> 
  <li><a href="main-galerie.html">Galerie</a></li>
  <li class="selected"><a href="main-clanky.html">Články</a></li>
<a href="user.html"><img src="../src/testprofile.png" class="profil"></div></a>
</ul>
</nav>

<div class="body">
<table class="blok" style="width: 80%;">
	<tr><td><h1>Články</h1></td></tr>
	<tr><td><a href="###">Lorem ipsum dolor sit amet. &nbsp <b>stav: čeká na schválení</b></a></td></tr>
	<tr><td><a href="###">Ut enim ad minima veniam. &nbsp <b>stav: recenzuje se</b></a></td></tr>
	<tr><td><a href="###">Duis ante orci, molestie v. &nbsp <b>stav: čeká na schválení úprav</b></a></td></tr>
	<tr><td><a href="###">Duis ante orci, molestie vor sit amet. &nbsp <b>stav: čeká na schválení</b></a></td></tr>
	<tr><td><a href="###">Ut enim ad minima veniam sit amet. &nbsp <b>stav: čeká na schválení</b></a></td></tr>
	<tr><td><a href="###">Ut enim ad minima veniam. &nbsp <b>stav: čeká na schválení úprav</b></a></td></tr>
	<tr><td><a href="###">Lorem ipsum ante orci, molestie v. &nbsp <b>stav: recenzuje se</b></a></td></tr>
	<tr><td><a href="###">Duis ante orci, molestie v. &nbsp <b>stav: recenzuje se</b></a></td></tr>
</table>
</div>

<footer>
<div class="text">
	<b> © 2022 </b>
</div>
</footer>




</body>

</html>