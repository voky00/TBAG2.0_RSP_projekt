<?php

// check if session is started
if (!isset($_SESSION)) {
    session_start();
}

// get role
if (isset($_SESSION['role'])) {
    $role = $_SESSION['role'];
} else {
    $role = "guest";
}
require("backend.php");
require("templates/header.php");
require("navigation.php");


?>
<table>
	<tr><td class="blok" colspan="2">
		<h1>INFO</h1>
Jedná se o webovou verzi známého vědeckého časopisu TBAG Science
Časopis TBAG Science je vědecký časopis, který za krátkou dobu jeho existování nasbíral 
několik ocenění na vědeckém poli, byl založen v roce 2012. Náš časopis se snaží vytvořit 
skvělé příležitosti pro nové spisovatele a autory. V našem časopise se dozvíte o aktuálním dění ve světě vědy,
o zajímavých teoriích a objevech. 
</td></tr>

	<td class="blok">
<h2>ŠÉFREDAKTOR</h2>
Jan Houska<br>
jan.houska@TBAG.cz<br>
Tel: 705 222 635<br>

<h2>REDAKTOŘI</h2>
Monika Clonová -  monika.clonova@TBAG.cz<br>
Oliver Janšura -  oliver.jansura@TBAG.cz<br>
Jana Šaclová -  jana.saclova@TBAG.cz<br>
Teodor Lee -  teodor.lee@TBAG.cz<br>
Radek Vostrý -  radek.vostrý@TBAG.cz<br>

<h2>GRAFICI</h2>
Rudolf Král - rudolf.král@TBAG.cz<br>
Eliška Jánská - eliska.janska@TBAG.cz<br>

<h2>RECENZENTI</h2>
Leonard Šťastný, Tomáš Jedno, Filip Kousal, Marie Dvorská<br>
</td>
<td class="blok">
<h2>AUTOŘI</h2>
Jednotlivý autoři jsou napsáni pod jednotlivými články.<br>

<h2>Jazyková úprava</h2>
Evžen Vratký, Ema Hodová, Emili Štěpánková <br>

<h2>FOTOGRAF</h2>
Petr Párkrů<br>

<h2>KONTAKTY</h2>
Email: info@TBAG.cz<br>
Telefon: 798 999 665<br>
Sídlo: Imaginární Ulice 123, Pelhřimov 235 52, Česká republika<br>
</td>
</tr>

<tr><td class="blok">
Vydavatel a nakladatelství<br>
TBAG News<br>
Sídlo: Stravova 232, Praha 3, 456 38, Česká republika<br>
</td></tr>

</table>
</div>
<?php
require("templates/footer.php");