<?xml version="1.0" encoding="UTF-8" ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="hr" lang="hr" dir="ltr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width">
    <title>Pregled profila - Vacator</title>
<link href="stil.css" rel="stylesheet" type="text/css" />
<link href="grid.css" rel="stylesheet" type="text/css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script>

<!--Twitter bootstrap-->
<link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />

<!--Skripta za racunanje u drugim valutama-->
 <script src="http://coinmill.com/frame.js"></script>
 <script>
var currency_round=true;
var currency_decimalSeparator='.';
var currency_thousandsSeparator=',';
var currency_thousandsSeparatorMin=3;
</script>
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

        <div class="content">
		
		<div class="row">	
		
		<?PHP

		//ako nema id oglasa u url-u javlja gresku
		if (isset($_GET['user'])){
		$user = $_GET["user"];
$user = stripslashes($user);
$user = mysql_real_escape_string($user);
		
//Podaci za spajanje na bazu
$user_name = "root";
$password = "";
$database = "vacator";
$server = "localhost";

$db_handle = mysql_connect($server, $user_name, $password);
$db_found = mysql_select_db($database, $db_handle);

if ($db_found) {
mysql_query("set names 'utf8'");

//provjerava da li je taj korisnik registriran, ako nije javlja poruku
$SQLprovjerakorisnika = "SELECT * FROM korisnici WHERE korisnickoime='$user'";
//$SQL = "SELECT * FROM korisnici left JOIN oglasi ON korisnici.korisnickoime=oglasi.korisnickoime left JOIN slike ON oglasi.idoglasa=slike.idoglasa WHERE korisnici.korisnickoime='$user'";
$SQL = "SELECT oglasi.naslov, oglasi.kratkiopis, oglasi.cijena, oglasi.idoglasa, slike.link FROM korisnici INNER JOIN oglasi ON korisnici.korisnickoime=oglasi.korisnickoime LEFT JOIN slike ON oglasi.idoglasa=slike.idoglasa AND slike.glavnaslika=1 WHERE korisnici.korisnickoime='$user' AND oglasi.aktivan=1";
$SQL1 = "SELECT oglasi.naslov, oglasi.kratkiopis, oglasi.cijena, oglasi.idoglasa, slike.link FROM korisnici INNER JOIN oglasi ON korisnici.korisnickoime=oglasi.korisnickoime LEFT JOIN slike ON oglasi.idoglasa=slike.idoglasa AND slike.glavnaslika=1 WHERE korisnici.korisnickoime='$user' AND oglasi.aktivan=0";


$resultprovjerakorisnika = mysql_query($SQLprovjerakorisnika);
$result = mysql_query($SQL);
$result1 = mysql_query($SQL1);

$num_rows_provjera = mysql_num_rows($resultprovjerakorisnika); 
$num_rows = mysql_num_rows($result); 
$num_rows1 = mysql_num_rows($result1);

if($num_rows_provjera==0){
//$SQL1 = "SELECT * FROM korisnici WHERE korisnici.korisnickoime='$user'";
echo"Korisnik $user nije registriran.";
//$result1 = mysql_query($SQL1);
}
else{

if($num_rows==0){
echo"Korisnik $user nema niti jedan aktivan oglas.";

}else{

//while ( $db_field = mysql_fetch_assoc($result) ) {

$db_podaci_korisnik = mysql_fetch_assoc($resultprovjerakorisnika);
  //$array[] = $db_field; //sprema u polje za daljnje koristenje podataka, da se ne vrsi ponovni upit na bazu

//sidebar podaci
$datumregistracije = $db_podaci_korisnik['datumregistracije'];
$datumformatiran = date("d.m.Y.", strtotime($datumregistracije));
	
	echo'
		<div class="sidebar column-3 column">
		
		<h4>PODACI O KORISNIKU</h4>
<table>
<tr>
<td style="padding-top: 15px;">
Kontakt broj:
</td>
</tr>
<tr>
<td>
'.$db_podaci_korisnik['broj'].'
</td></tr>
<tr><td style="padding-top: 15px;">
Kontakt ime:
</td></tr>
<tr><td>
'.$db_podaci_korisnik['ime'].'
 </td>
 </tr>
  <tr><td style="padding-top: 15px;">
  Broj objavljenih oglasa:
  </td></tr>
  <tr><td>
  '.$num_rows.'
  </td></tr>
   <tr><td style="padding-top: 15px;">
   Datum registracije:
   </td></tr>
   <tr><td>
   '.$datumformatiran.'
   </td></tr>
   <tr><td>';
   
   //ako je to od korisnika profil ili ako je admin moze raditi izmjene (button za izmjene se prikazuje)
 if (isset($_SESSION['korisnickoime'])){
 $admin = $_SESSION['korisnickoime'];

 $SQLadmin = "SELECT * FROM korisnici WHERE korisnickoime='$admin' AND admin=1";
 $SQLvlasnik = "SELECT * FROM korisnici WHERE korisnickoime='$user' AND korisnickoime='$admin'"; //ako je korisnicko ime ono u profilu oglasa i vlasnik
 
$resultadmin = mysql_query($SQLadmin);
$resultvlasnik = mysql_query($SQLvlasnik);
//$result1 = mysql_query($SQL1);

$num_rows_admin = mysql_num_rows($resultadmin); 
$num_rows_vlasnik = mysql_num_rows($resultvlasnik); 

//prikazuje za izmjenu podataka profila ako je admin ili vlasnik profila
if($num_rows_vlasnik == 1 OR $num_rows_admin == 1){
 echo'
   <form action="izmjena-profila.php" method="post" accept-charset="utf-8" style="margin-top:15px;">
   <input type="hidden" name="broj" value="'.$db_podaci_korisnik['broj'].'">
   <input type="hidden" name="ime" value="'.$db_podaci_korisnik['ime'].'">
   <input type="hidden" name="prezime" value="'.$db_podaci_korisnik['prezime'].'">
   <input type="hidden" name="email" value="'.$db_podaci_korisnik['email'].'">
   <input class="btn btn-success" type="submit" value="Izmjena podataka">
   </form>
   
   <form action="brisanje-profila.php" method="post" accept-charset="utf-8" style="margin-top:15px;" onclick="return confirm(\'Da li ste sigurni da želite izbrisati profil (nakon brisanja profil više neće biti moguće vratiti)?\');">
   <input class="btn btn-danger" type="submit" value="Brisanje profila">
   </form>
   ';}
   
   
   }
   
   echo'</td></tr>
</table>
	
		</div>';
		

		//popis oglasa
		
echo'<div class="oglasi-content column-8 column">';

//ako user ima neki oglas
if($num_rows>0){
while ( $db_field1 = mysql_fetch_assoc($result) ) {

 //ispis oglasa
 
 echo'<div class="oglas ">';
 echo'<a name="'.  $db_field1['idoglasa'] .'"></a>';
 
//slika oglasa
  //echo '<div class="slika-mjesta"><img src="'.$db_field1['link'].'" alt="'.  $db_field1['naslov'] .'"></div>';
  //slika oglasa, ako nema slike prikazuje defaultnu sliku
if (!empty($db_field1['link'])){ 
$slika = $db_field1['link'];
} else{ 
$slika = "images/no-picture-1.png";
;}

//prikaz slike
  echo '<a href="oglas.php?oglasid='.$db_field1['idoglasa'].'"><div class="slika-mjesta"><img src="'.$slika.'" alt="'.  $db_field1['naslov'] .'"></div></a>';
  //naslov
 echo '<div class="naslov-oglasa" >
 <a href="oglas.php?oglasid='.$db_field1['idoglasa'].'"><span class="naslov-oglas">'.  $db_field1['naslov'] .'</span></a>
</div>';
  
  //kratki opis
	 echo '<div class="kratkiopis">' .  $db_field1['kratkiopis'] . '</div>';
	 //cijena
	  echo '<div class="cijena">Cijena iznosi oko <select>
	  <option value="EUR"> <script>currency_show_conversion(' .  $db_field1['cijena'] . ',"HRK","HRK");</script> HRK<br></option>
  <option value="HRK"><script>currency_show_conversion(' .  $db_field1['cijena'] . ',"HRK","EUR");</script> EUR<br></option>
  <option value="BAM"> <script>currency_show_conversion(' .  $db_field1['cijena'] . ',"HRK","BAM");</script> BAM<br></option>
  <option value="RSD"> <script>currency_show_conversion(' .  $db_field1['cijena'] . ',"HRK","RSD");</script> RSD<br></option>
</select> </div>';
 
 echo'</div>';

}

//neaktivne oglase vidi samo taj user

//prikazuje neaktivne oglase od usera ako je admin ili vlasnik profila
if (isset($_SESSION['korisnickoime'])){
if($num_rows_vlasnik == 1 OR $num_rows_admin == 1){
if($num_rows1>0){

echo'<hr>
<h3>Neaktivni oglasi</h3>';

while ( $db_field2 = mysql_fetch_assoc($result1) ) {

 //ispis oglasa
 
 echo'<div class="oglas-neaktivan">';
 echo'<a name="'.  $db_field2['idoglasa'] .'"></a>';
 
//slika oglasa
  //echo '<div class="slika-mjesta"><img src="'.$db_field1['link'].'" alt="'.  $db_field1['naslov'] .'"></div>';
  //slika oglasa, ako nema slike prikazuje defaultnu sliku
if (!empty($db_field2['link'])){ 
$slika = $db_field2['link'];
} else{ 
$slika = "images/no-picture-1.png";
;}

//prikaz slike
  echo '<a href="oglas.php?oglasid='.$db_field2['idoglasa'].'"><div class="slika-mjesta"><img src="'.$slika.'" alt="'.  $db_field2['naslov'] .'"></div></a>';
  //naslov
 echo '<div class="naslov-oglasa" >
 <a href="oglas.php?oglasid='.$db_field2['idoglasa'].'"><span class="naslov-oglas">'.  $db_field2['naslov'] .'</span></a>
</div>';
  
  //kratki opis
	 echo '<div class="kratkiopis">' .  $db_field2['kratkiopis'] . '</div>';
	 //cijena
	  echo '<div class="cijena">Cijena iznosi oko <select>
	  <option value="EUR"> <script>currency_show_conversion(' .  $db_field2['cijena'] . ',"HRK","HRK");</script> HRK<br></option>
  <option value="HRK"><script>currency_show_conversion(' .  $db_field2['cijena'] . ',"HRK","EUR");</script> EUR<br></option>
  <option value="BAM"> <script>currency_show_conversion(' .  $db_field2['cijena'] . ',"HRK","BAM");</script> BAM<br></option>
  <option value="RSD"> <script>currency_show_conversion(' .  $db_field2['cijena'] . ',"HRK","RSD");</script> RSD<br></option>
</select> </div>';
 
 echo'</div>';

}
}
}
}
}}

echo'</div>';
		
 }
 

mysql_close($db_handle);
}
else {
echo"Došlo je do greške.";
}
}
else{
echo '<div class="alert alert-info">Navedeni korisnik ne postoji.</div>';
}
echo'</div>';
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

    <div class="footer">Copyright Vacator 2014</div>
   
</body>
</html>