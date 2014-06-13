<?xml version="1.0" encoding="UTF-8" ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="hr" lang="hr" dir="ltr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width">
    <title>Početna</title>
<link href="stil.css" rel="stylesheet" type="text/css" />
<link href="grid.css" rel="stylesheet" type="text/css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script>

<!--Twitter bootstrap-->
<link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />

</head>
<body>
        <div class="header">
       
	   <div class="header-left">
	  <a href="index.php"><img src="images/logo.png" style="height:40px; float:left; margin-right: 10px;"> <h2>Vacator</h2></a>
            </div>
			
			 <div class="header-right">
			  <?php 
			 session_start();
			 //ako je user logiran ne prikazuje se prijava i registracija
	 if (!isset($_SESSION['korisnickoime'])){
	 echo'<a href="prijava.php">Prijava</a> <a href="registracija.php">Registracija </a>';
	 }
	echo'<a href="predaj-oglas.php">Predaj oglas</a>';
		
		
		//ako je user logiran ispisuje njegovo ime i gumb za odjavu
		if (isset($_SESSION['korisnickoime'])){
		if (!empty($_SESSION['korisnickoime'])){
		echo 'Bok, <a href="profil.php?user='.$_SESSION['korisnickoime'].'">'.$_SESSION['korisnickoime'].'</a>';
		echo '<a href="odjava.php"><img src="images/logout.png" style="margin-left: 10px;"></a>';
		}
		}
		?> 
            </div>
</div>

<!--COVER-->
<div class="column-24 cover">
		<div class="cover-search">
		<div class="cover-search-in">
		<h2>Pronađite mjesto za odmor</h2>
		<form action="index.php" method="get">
		Mjesto <input type="text" name="mjesto" placeholder="Grad">
 Min broj osoba <select name="osoba">
<option value="1">1 osoba</option>
<option value="2">2 osobe</option>
<option value="3">3 osobe</option>
<option value="4">4 osobe</option>
<option value="5">5 osoba</option>
<option value="6">6 osoba</option>
<option value="7">7 osoba</option>
<option value="8">8+ osoba</option>
</select>
<input type="submit" value="Traži" class="btn">
		</form>
		</div>
		</div>
		</div>
		
		
		
        <div class="content">

		<div class="row">	
		
		<?php if (!isset($_GET['mjesto'],$_GET['osoba'])){ ?>
		<div class="kategorija-apartmani">
		<a href="oglasi.php?kategorija=1"><h3>Apartmani</h3></a>
		</div>
		
		<div class="kategorija-hoteli">
		<a href="oglasi.php?kategorija=2"><h3>Hoteli</h3></a>
		</div>
		
		<div class="kategorija-hosteli">
		<a href="oglasi.php?kategorija=3"><h3>Hosteli</h3></a>
		</div>
		
		<div class="kategorija-kampovi">
		<a href="oglasi.php?kategorija=4"><h3>Kampovi</h3></a>
		</div>
		
		<div class="kategorija-ostalo">
		<a href="oglasi.php?kategorija=5"><h3>Ostalo</h3></a>
		</div>
		<?php } 
		else{
		$mjesto = $_GET["mjesto"];
$mjesto = stripslashes($mjesto);
$mjesto = mysql_real_escape_string($mjesto);

$osoba = $_GET["osoba"];
$osoba = stripslashes($osoba);
$osoba = mysql_real_escape_string($osoba);
		
//Podaci za spajanje na bazu
$user_name = "root";
$password = "";
$database = "vacator";
$server = "localhost";


$db_handle = mysql_connect($server, $user_name, $password);
$db_found = mysql_select_db($database, $db_handle);

if ($db_found) {
mysql_query("set names 'utf8'");
$SQL = "SELECT oglasi.idoglasa, oglasi.naslov, oglasi.kratkiopis, oglasi.cijena, slike.link FROM oglasi LEFT JOIN slike ON oglasi.idoglasa=slike.idoglasa AND slike.glavnaslika=1 WHERE oglasi.aktivan=1 AND (oglasi.grad=CONCAT(UCASE(LEFT('$mjesto', 1)), LCASE(SUBSTRING('$mjesto', 2))) OR LOWER(oglasi.dugiopis) LIKE LOWER('%$mjesto%') OR LOWER(oglasi.kratkiopis) LIKE LOWER('%$mjesto%') OR LOWER(oglasi.naslov) LIKE LOWER('%$mjesto%')) AND oglasi.brojosoba>='$osoba' GROUP BY oglasi.idoglasa HAVING COUNT(oglasi.idoglasa) = 1 ORDER BY oglasi.ID;";
//$SQL = "SELECT oglasi.idoglasa, oglasi.naslov, oglasi.kratkiopis, oglasi.cijena, slike.link FROM oglasi LEFT JOIN slike ON oglasi.idoglasa=slike.idoglasa AND slike.glavnaslika=1 WHERE oglasi.grad='$mjesto' ORDER BY oglasi.ID";

$result = mysql_query($SQL);
//$result1 = mysql_query($SQL1);

$num_rows = mysql_num_rows($result);

if($num_rows > 0){ 

echo'<!--Skripta za racunanje u drugim valutama-->
 <script src="http://coinmill.com/frame.js"></script>
 <script>
var currency_round=true;
var currency_decimalSeparator='.';
var currency_thousandsSeparator=',';
var currency_thousandsSeparatorMin=3;
</script>';


echo'<div class="oglasi-content column-8 column">';
while ( $db_field = mysql_fetch_assoc($result) ) {

  $array[] = $db_field; //sprema u polje za daljnje koristenje podataka, da se ne vrsi ponovni upit na bazu

 //$name =   $db_field['naziv'];
 //$arr[] = $db_field['naziv'];
 
 //ispis oglasa
 
 
 echo'<div class="oglas ">';
 echo'<a name="'.  $db_field['idoglasa'] .'"></a>';
 
 
 //slika oglasa, ako nema slike prikazuje defaultnu sliku
if (!empty($db_field['link'])){ 
$slika = $db_field['link'];
} else{ 
$slika = "images/no-picture-1.png";
;}
//slika oglasa
  echo '<a href="oglas.php?oglasid='.$db_field['idoglasa'].'"><div class="slika-mjesta"><img src="'.$slika.'" alt="'.  $db_field['naslov'] .'"></div></a>';
  
  //naslov
 echo '<div class="naslov-oglasa" >
<a href="oglas.php?oglasid='.$db_field['idoglasa'].'"><span class="naslov-oglas">'.  $db_field['naslov'] .'</span></a>
</div>';
  
  //kratki opis
	 echo '<div class="kratkiopis">' .  $db_field['kratkiopis'] . '</div>';
	 //cijena
	  echo '<div class="cijena">Cijena iznosi oko <select>
	  <option value="EUR"> <script>currency_show_conversion(' .  $db_field['cijena'] . ',"HRK","HRK");</script> HRK<br></option>
  <option value="HRK"><script>currency_show_conversion(' .  $db_field['cijena'] . ',"HRK","EUR");</script> EUR<br></option>
  <option value="BAM"> <script>currency_show_conversion(' .  $db_field['cijena'] . ',"HRK","BAM");</script> BAM<br></option>
  <option value="RSD"> <script>currency_show_conversion(' .  $db_field['cijena'] . ',"HRK","RSD");</script> RSD<br></option>
</select> </div>';
 
 echo'</div>';

}
echo'</div>';

}else{
echo '<span class="label label-info" style="padding: 6px 4px; font-size:18px;">Trenutno nema oglasa koji zadovoljavaju postavljene kriterije pretrage.</span>';
}

mysql_close($db_handle);
}
else {
echo '<span class="label label-warning" style="padding: 6px 4px; font-size:18px;">Došlo je do greške.</span>';
mysql_close($db_handle);
}
}
		?>

		
<!--Scroll header-->
<script>
		$(document).scroll(function(){
    if($(this).scrollTop() > 70)
    {   
        $('.header').css({"position":"fixed"});
    }
	else{
	$('.header').css({"position":"relative"});
	}
});
		</script>


</div>
            </div>

    <div class="footer">Copyright Vacator 2014</div>
   
</body>
</html>