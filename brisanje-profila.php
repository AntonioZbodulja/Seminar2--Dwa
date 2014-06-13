<?xml version="1.0" encoding="UTF-8" ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="hr" lang="hr" dir="ltr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width">
    <title>Brisanje oglasa - Vacator</title>
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
			 //ako user nije registriran redirecta ga
			 session_start();
		if (!isset($_SESSION['korisnickoime'])){
		header("Location: prijava.php");
		die();
		}
		if (empty($_SESSION['korisnickoime'])){
		header("Location: prijava.php");
		}		
			 
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
		
		<div class="column column-8">
		
		<?php
		//ako nema post metode radi redirect
if($_SERVER['REQUEST_METHOD'] == 'POST'){
ob_start();
$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password=""; // Mysql password 
$db_name="vacator"; // Database name 
$tbl_name1="oglasi"; // Table name 
$tbl_name2="karakteristike"; // Table name2

// Spoji se na server i selektiraj bazu
$con=mysql_connect("$host", "$username", "$password")or die("Nije se moguće spojiti"); 
mysql_select_db("$db_name")or die("Nije moguće pronaći bazu");


//MySQL injection

		//uzmi korisnicko ime iz sesije sa kojim je prijavljen
		
		if (isset($_SESSION['korisnickoime'])){
		$korisnickoime = $_SESSION['korisnickoime'];
		}
		else{
		header("Location: prijava.php");
		die("Došlo je do greške, provjerite da li su Vam odobreni kolačići.");
		}
		$sqlpobrisanioglasi ="INSERT INTO oglasipobrisani (naslov, kratkiopis, dugiopis, cijena, grad, brojosoba, povrsina, brojzvjezdica, brojsoba, korisnickoime, udaljenostcentramjesta, brojlezaja, minimalanbrojnocenja, idoglasa, blizinaplaze, brojtelefona, idzupanije, idkategorije, aktivan, lokacija) SELECT naslov, kratkiopis, dugiopis, cijena, grad, brojosoba, povrsina, brojzvjezdica, brojsoba, korisnickoime, udaljenostcentramjesta, brojlezaja, minimalanbrojnocenja, idoglasa, blizinaplaze, brojtelefona, idzupanije, idkategorije, aktivan, lokacija FROM oglasi WHERE korisnickoime='" . $korisnickoime . "'";
		$sqlpobrisanikorisnici ="INSERT INTO korisnicipobrisani (ime, prezime, email, korisnickoime, broj, lozinka, idkorisnika, admin, potvrden, datumregistracije, brojobjavljenihoglasa) SELECT ime, prezime, email, korisnickoime, broj, lozinka, idkorisnika, admin, potvrden, datumregistracije, brojobjavljenihoglasa FROM korisnici WHERE korisnickoime='" . $korisnickoime . "'";
		
		$sqlpobrisaneslike ="INSERT INTO slikepobrisane (link, idoglasa, glavnaslika) SELECT slike.link, slike.idoglasa, slike.glavnaslika FROM slike INNER JOIN oglasi ON slike.idoglasa=oglasi.idoglasa INNER JOIN korisnici ON oglasi.korisnickoime=korisnici.korisnickoime WHERE oglasi.korisnickoime='" . $korisnickoime . "'";

		$sqlpobrisanekarakteristike ="INSERT INTO karakteristikepobrisane (idoglasa, grijanje, tv, internet, kabelska, kupaonica, kuhinja, dozvoljeniljubimci, klima, terasa, perilicarublja, hladnjak, perilicasuda, pusenjedozvoljeno, osiguranparking) SELECT karakteristike.idoglasa, karakteristike.grijanje, karakteristike.tv, karakteristike.internet, karakteristike.kabelska, karakteristike.kupaonica, karakteristike.kuhinja, karakteristike.dozvoljeniljubimci, karakteristike.klima, karakteristike.terasa, karakteristike.perilicarublja, karakteristike.hladnjak, karakteristike.perilicasuda, karakteristike.pusenjedozvoljeno, karakteristike.osiguranparking FROM karakteristike INNER JOIN oglasi ON karakteristike.idoglasa=oglasi.idoglasa INNER JOIN korisnici ON oglasi.korisnickoime=korisnici.korisnickoime WHERE oglasi.korisnickoime='" . $korisnickoime . "'";

$sqldeletekorisnik="DELETE FROM korisnici WHERE korisnickoime='" . $korisnickoime . "'";
$sqldeletepodaci="DELETE oglasi,karakteristike,slike FROM oglasi INNER JOIN slike ON oglasi.idoglasa = slike.idoglasa INNER JOIN karakteristike ON slike.idoglasa=karakteristike.idoglasa WHERE oglasi.korisnickoime='" . $korisnickoime . "'";

mysql_query("SET CHARACTER SET utf8");
//mysqli_set_charset($con, "utf8"); //da upis radi i sa utf-8 znakovima


$sqlpobrisanioglasiresult=mysql_query($sqlpobrisanioglasi);
$sqlpobrisanikorisniciresult=mysql_query($sqlpobrisanikorisnici);
$sqlpobrisaneslikeresult=mysql_query($sqlpobrisaneslike);
$sqlpobrisanekarakteristikeresult=mysql_query($sqlpobrisanekarakteristike);

$sqldeletepodaciresult=mysql_query($sqldeletepodaci);
$sqldeletekorisnikresult=mysql_query($sqldeletekorisnik);


if ($sqldeletepodaciresult && $sqldeletekorisnikresult && $sqlpobrisanioglasiresult && $sqlpobrisanikorisniciresult && $sqlpobrisaneslikeresult && $sqlpobrisanekarakteristikeresult){
echo '<div class="alert alert-success">Vaš profil je uspješno pobrisan.</div>';
  session_destroy();
} else {
  echo '<div class="alert alert-danger">Greška prilikom brisanja profila.</div>';
  session_destroy();
}
ob_end_flush();
}else{
//ako se ide direktno na stranicu bez post metode redirecta
header('Location: profil.php');
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