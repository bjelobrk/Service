<!DOCTYPE html>
<html>
<head>
<title>Servis</title>
<meta charset="UTF-8">
<link rel='stylesheet' href='css/style.css' />
</head>
<body>
<div class="drop">
<ul class="drop_menu">
<li><a href="?action=prva_strana">Početna</a>
</li>
<li><a>Usluge</a>
	<ul>
	<li><a href="?action=prikaz_usluga">Prikaz svih usluga</a></li>
	<li><a href="?action=forma_unos_usluge">Dodaj novu uslugu</a></li>
	<li><a href="?action=editovanje_usluga">Modifikacija usluga</a></li>
	</ul>
</li>
<li><a>Klijenti</a>
	<ul>
        <li><a href="?action=prikaz_klijent">Prikaz svih klijenata</a></li>
        <li><a href="?action=pretraga_klijenata">Pretraga klijenata</a></li>
	<li><a href="?action=prikaz_prvano">Pravna lica</a></li>
	<li><a href="?action=prikaz_fizicko">Fizička lica</a></li>
	<li><a href="?action=forma_unos_klijenta_pravno">Dodaj klijenta (pravno lice)</a></li>
        <li><a href="?action=forma_unos_klijenta_fizicko">Dodaj klijenta (fizičko lice)</a></li>
     
        
	</ul>
</li>
    <li><a href="?action=prikaz_radni_nalog">Lista radnih naloga</a></li>

 <div class="logout"><img src="images/gear.png"><li><a><?php $radnik=RadnikDB::getRadnikId($_SESSION['id']); echo '     '. $radnik->ime_r.' ';echo $radnik->prezime_r;?></a>
         <ul>
         <li><a href="?action=logout">Logout</a></ul></li>
   
</div>

</ul>
    
    
</div>
