<?xml version="1.0" encoding="UTF-8" ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="hr" lang="hr" dir="ltr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width">
    <title>Prijava - Vacator</title>
<link href="stil.css" rel="stylesheet" type="text/css" />
<link href="grid.css" rel="stylesheet" type="text/css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script>

<!--Twitter bootstrap-->
<link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />

</head>
<body>
<?php 
		
		//ako je user logiran prebacuje na index.php, ne moze ici na prijavu
		session_start();
		if (isset($_SESSION['korisnickoime'])){
		header("Location: index.php");
		die();
		}
		if (!empty($_SESSION['korisnickoime'])){
		header("Location: index.php");
		}		
		?> 
        <div class="header">
       
	   <div class="header-left">
	   <a href="index.php"><img src="images/logo.png" style="height:40px; float:left; margin-right: 10px;"> <h2>Vacator</h2></a>
            </div>
			
			 <div class="header-right">
			  <?php 
			 
			 //ako je user logiran ne prikazuje se prijava i registracija
	 if (!isset($_SESSION['korisnickoime'])){
	 echo'<a href="registracija.php">Registracija </a>';
	 }
	 
		?> 
            </div>
</div>
		
        <div class="content">
		
		<div class="column column-8">
		
		<h3>Prijavite se</h3>
<form action="prijava.php" method="post" accept-charset="utf-8"> 
<table>
<tr><td>Email:</td> <td><input type="text" name="email" required="required"></td></tr>
<tr><td>Lozinka:</td> <td><input type="password" name="lozinka" required="required"></td></tr>
<tr><td></td><td><input class="btn btn-success" type="submit" value="Prijava"></td></tr>
</table>
</form>
		<p>Nemate profil? <a href="registracija.php">Registrirajte se</a>.</p>
		<p>Izgubili ste lozinku? <a href="resetiraj-lozinku.php">Povratak lozinke</a>.</p>
		
		
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

		
		<!--Kada se klikne button za prijavu provjerava podatke-->
		<?php
		//ako je pokrenuta metoda post
if($_SERVER['REQUEST_METHOD'] == 'POST'){
//provjerava da li je nesto u post metodi
if(isset($_POST['email'], $_POST['lozinka'])) {
		
		
ob_start();
$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password=""; // Mysql password 
$db_name="vacator"; // Database name 
$tbl_name="korisnici"; // Table name 

// Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("Nije se moguće spojiti"); 
mysql_select_db("$db_name")or die("Nije moguće pronaći bazu");

// Define $email and $password 
$email=$_POST['email']; 
$lozinka=$_POST['lozinka']; 

// To protect MySQL injection (more detail about MySQL injection)
$email = stripslashes($email);
$lozinka = stripslashes($lozinka);
$email = mysql_real_escape_string($email);
$lozinka = mysql_real_escape_string($lozinka);

$lozinka1=sha1($lozinka);
$sql="SELECT * FROM $tbl_name WHERE email='$email' AND lozinka='$lozinka1' AND potvrden=1";
$result=mysql_query($sql);

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);

// ako su podaci tocni uzmi korisnicko ime iz baze i stavi u sesiju
if($count==1){
$sql1="SELECT * FROM $tbl_name WHERE email='$email' AND lozinka='$lozinka1'";
$result1 = mysql_query($sql1);

$db_field = mysql_fetch_assoc($result1);
$korisnickoime =  $db_field['korisnickoime'];

//Pocetak sesije
session_start(); 
$_SESSION['korisnickoime']= "$korisnickoime";
header("location:prijava-uspjesna.php");
}
else {
echo '<div class="alert alert-danger column-5">Pogrešno ime i/ili lozinka ili korisnik nije potvrđen.</div>';
}
ob_end_flush();
}
}
?>
		

</div>

            </div>

    <div class="footer">Copyright Vacator 2014</div>
   
</body>
</html>