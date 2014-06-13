﻿<?xml version="1.0" encoding="UTF-8" ?>
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
if ($_POST){
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


if(isset($_POST['idoglasa'])){
$idoglasa=$_POST['idoglasa']; 
}
if(isset($_POST['aktivan']) AND ($_POST['aktivan'])==1){
$aktivan=1; //oglas je trenutno neaktivan i mijenja se u aktivan
}
else{
$aktivan=0;
}

//MySQL injection

$idoglasa = stripslashes($idoglasa);
$idoglasa = mysql_real_escape_string($idoglasa);

$aktivan = stripslashes($aktivan);
$aktivan = mysql_real_escape_string($aktivan);

		//uzmi korisnicko ime iz sesije sa kojim je prijavljen
		
		if (isset($_SESSION['korisnickoime'])){
		$korisnickoime = $_SESSION['korisnickoime'];
		}
		else{
		header("Location: prijava.php");
		die("Došlo je do greške, provjerite da li su Vam odobreni kolačići.");
		}
		
$sql="UPDATE oglasi SET oglasi.aktivan=" . $aktivan . " WHERE idoglasa='" . $idoglasa . "'";


mysql_query("SET CHARACTER SET utf8");
//mysqli_set_charset($con, "utf8"); //da upis radi i sa utf-8 znakovima

$sqlresult=mysql_query($sql);

if ($sqlresult){
if($aktivan==1){
echo '
<div class="alert alert-success">
Oglas (' . $idoglasa . ') je uspješno aktiviran.
</div>';
}
else{
echo '
<div class="alert alert-success">
Oglas (' . $idoglasa . ') je uspješno deaktiviran.
</div>';
}
} else {
  echo '
  <div class="alert alert-danger">
  Greška prilikom aktivacije/deaktivacije oglasa.
  </div>';
}
ob_end_flush();
}else{
//ako se ide direktno na stranicu bez post metode redirecta
header('Location: index.php');
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