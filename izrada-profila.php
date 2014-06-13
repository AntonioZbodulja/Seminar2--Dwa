<?xml version="1.0" encoding="UTF-8" ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="hr" lang="hr" dir="ltr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width">
    <title>Izrada profila - Vacator</title>
<link href="stil.css" rel="stylesheet" type="text/css" />
<link href="grid.css" rel="stylesheet" type="text/css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script>

<!--Twitter bootstrap-->
<link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />

</head>
<body>
<?php 
//ako nije metoda post radi redirect
if($_SERVER['REQUEST_METHOD'] != 'POST'){
header("Location: index.php");
}
?>


        <div class="header">
       
	   <div class="header-left">
	  <a href="index.php"><img src="images/logo.png" style="height:40px; float:left; margin-right: 10px;"> <h2>Vacator</h2></a>
            </div>
			
			 <div class="header-right">

            </div>
</div>

		
		
        <div class="content">
		
		<div class="column column-8">
		
		
		<!--Izrada profila-->
		<?php

		/*Generiranje id korisnika*/
		
		/*Generiranje koliko ce biti znakova od 26-32*/
		$brojznakova = rand(26,32);
		
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$randomString = '';
		for ($i = 0; $i < $brojznakova; $i++) {
		//key za potvrdu korisnika i vracanje lozinke
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
		}
		
ob_start();
$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password=""; // Mysql password 
$db_name="vacator"; // Database name 
$tbl_name="korisnici"; // Table name 

// Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("Nije se moguće spojiti"); 
mysql_select_db("$db_name")or die("Nije moguće pronaći bazu");

// Define $myusername and $mypassword 
$ime=$_POST['ime']; 
$prezime=$_POST['prezime']; 
$korisnickoime=$_POST['korisnickoime']; 
$email=$_POST['email']; 
$predbroj=$_POST['predbroj']; 
$broj=$_POST['broj']; 
$lozinka=$_POST['lozinka']; 
$potvrdalozinke=$_POST['potvrdalozinke']; 

// To protect MySQL injection (more detail about MySQL injection)
$ime = stripslashes($ime);
$prezime = stripslashes($prezime);
$korisnickoime = stripslashes($korisnickoime);
$email = stripslashes($email);
$predbroj = stripslashes($predbroj);
$broj = stripslashes($broj);
$lozinka = stripslashes($lozinka);
$potvrdalozinke = stripslashes($potvrdalozinke);

$ime = mysql_real_escape_string($ime);
$prezime = mysql_real_escape_string($prezime);
$korisnickoime = mysql_real_escape_string($korisnickoime);
$email = mysql_real_escape_string($email);
$predbroj = mysql_real_escape_string($predbroj);
$broj = mysql_real_escape_string($broj);
$lozinka = mysql_real_escape_string($lozinka);
$potvrdalozinke = mysql_real_escape_string($potvrdalozinke);


if(strlen($ime)>1 && strlen($prezime)>1 && strlen($korisnickoime)>3 && isset($predbroj) && is_numeric($predbroj) && isset($broj) && is_numeric($broj) && strlen($lozinka)>5 && strlen($potvrdalozinke)>5 && ($lozinka==$potvrdalozinke)){

if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

mysql_query("SET CHARACTER SET utf8");

$lozinka1=sha1($lozinka);

/*Provjera da li korisnik u bazi (email i username)*/
$sqlprovjera="SELECT * FROM korisnici WHERE korisnickoime='$korisnickoime' OR email='$email'";

$sql="INSERT INTO korisnici (ime, prezime, email, korisnickoime, broj, lozinka, idkorisnika, datumregistracije) VALUES ('" . $ime . "','" . $prezime . "','" . $email . "','" . $korisnickoime . "','".$predbroj." ". $broj . "','" . $lozinka1 . "','" . $randomString . "','" . date("Y.m.d") . "' )";

/*izvrsava query za provjeru*/
$resultprovjera=mysql_query($sqlprovjera);
$countprovjera=mysql_num_rows($resultprovjera);

/*ako nije registriran korisnik sa tim emailom ili username-om*/
if($countprovjera==0){
$result=mysql_query($sql);
echo'<div class="alert alert-success">Uspješno je napravljen korisnički račun.</div>';

/*SLANJE EMAILA SA LINKOM POTVRDE, U BAZI DODAT POTVRDEN 1 ILI 0*/
require_once('/PHPMailer-master/class.phpmailer.php');
//include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded

$mail             = new PHPMailer();

//$body             = file_get_contents('contents.html');
//$body             = eregi_replace("[\]",'',$body);
$body ="Zahvaljujemo se na registraciji. Kako bi potvrdili svoj profil molimo da posjetite navedeni link u nastavku: http://localhost/stranice/DWA/seminar2/potvrda-registracije.php?user=$korisnickoime&key=$randomString";

$mail->IsSMTP(); // telling the class to use SMTP
$mail->Host       = "mail.vacator.com"; // SMTP server
//$mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
                                           // 1 = errors and messages
                                           // 2 = messages only
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->SMTPSecure = "tls";                 // sets the prefix to the servier
$mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
$mail->Port       = 25;                   // set the SMTP port for the GMAIL server
$mail->Username   = "";  // GMAIL username
$mail->Password   = "";            // GMAIL password

$mail->SetFrom('registracija@vacator.com', 'Vacator');

$mail->AddReplyTo("registracija@vacator.com","Vacator");

$mail->Subject    = "Vacator - Potvrda registracije";

$mail->AltBody    = "Kako biste vidjeli ovu poruku molimo koristite odgovarajući email preglednik!"; // optional, comment out and test

$mail->MsgHTML($body);

$address = "$email";
$mail->AddAddress($address, "Vacator");


if(!$mail->Send()) {
  echo "Error kod slanja emaila";//. $mail->ErrorInfo;
} else {
  echo " Email je poslan, molimo potvrdite registraciju za nastavak!";
}
    
}
/*ako je zauzeto korisnicko ime ili je registriran taj email*/
else{
$provjerakorisnickoime="SELECT * FROM korisnici WHERE korisnickoime='$korisnickoime'";
$resultprovjerakorisnickoime=mysql_query($provjerakorisnickoime);
$countprovjerakorisnickoime=mysql_num_rows($resultprovjerakorisnickoime);
/*ako je zauzeto korisnicko ime*/
if($countprovjerakorisnickoime > 0){
echo 'Navedeno korisničko ime već postoji.<br />';
}

$provjeraemail="SELECT * FROM korisnici WHERE email='$email'";
$resultprovjeraemail=mysql_query($provjeraemail);
$countresultprovjeraemail=mysql_num_rows($resultprovjeraemail);
/*ako je zauzet email*/
if($countresultprovjeraemail > 0){
echo 'Navedeni email je već registriran.';
}
}}else{echo"Unesen je krivi email.";}
}
else{
echo"Neki od podataka je krivo upisan.";
}
ob_end_flush();
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