<?xml version="1.0" encoding="UTF-8" ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="hr" lang="hr" dir="ltr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width">
    <title>Povratak lozinke - Vacator</title>
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
		
		<h3>Povratak lozinke</h3>
		
		<p>Unesite email sa kojim ste se registrirali.</p>
<form action="resetiraj-lozinku.php" method="post" accept-charset="utf-8"> 
<table>
<tr><td>Email:</td> <td><input type="email" name="email" required="required" placeholder="ime@primjer.com"></td></tr>
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
if(isset($_POST['email'])) {
// Define $email
$email=$_POST['email']; 
if (filter_var($email, FILTER_VALIDATE_EMAIL)){
		
ob_start();
$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password=""; // Mysql password 
$db_name="vacator"; // Database name 
$tbl_name="korisnici"; // Table name 

// Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("Nije se moguće spojiti"); 
mysql_select_db("$db_name")or die("Nije moguće pronaći bazu");

 

// To protect MySQL injection (more detail about MySQL injection)
$email = stripslashes($email);
$email = mysql_real_escape_string($email);


$sql="SELECT * FROM $tbl_name WHERE email='$email'";
$result=mysql_query($sql);

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);

// ako je navedeni email registriran salje podatke na navedeni email
if($count==1){

//uzima iz baze korisnicko ime i kod kako bi posal na email
$sql1="SELECT * FROM $tbl_name WHERE email='$email'";
$result1 = mysql_query($sql1);

$db_field = mysql_fetch_assoc($result1);
$korisnickoime =  $db_field['korisnickoime'];
$key =  $db_field['idkorisnika'];

/*SLANJE EMAILA SA LINKOM POTVRDE*/
require_once('/PHPMailer-master/class.phpmailer.php');
//include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded

$mail             = new PHPMailer();

//$body             = file_get_contents('contents.html');
//$body             = eregi_replace("[\]",'',$body);
$body ="Zatražili ste povratak lozinke. Kako bi promijenili lozinku kliknite na navedeni link: http://localhost/stranice/DWA/seminar2/povratak-lozinke.php?user=$korisnickoime&key=$key";

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

$mail->SetFrom('lozinka@vacator.com', 'Vacator');

$mail->AddReplyTo("lozinka@vacator.com","Vacator");

$mail->Subject    = "Vacator - Povratak lozinke";

$mail->AltBody    = "Kako biste vidjeli ovu poruku molimo koristite odgovarajući email preglednik!"; // optional, comment out and test

$mail->MsgHTML($body);

$address = "$email";
$mail->AddAddress($address, "Vacator");


if(!$mail->Send()) {
  echo "Error kod slanja emaila";//. $mail->ErrorInfo;
} else {
  echo " Email za povratak lozinke je poslan, za nastavak provjerite email!";
}

}
else {
echo "Navedeni email nije registriran.";
}
ob_end_flush();

}else{echo"Unesen je krivi email.";}
}
}
?>
		

</div>

            </div>

    <div class="footer">Copyright Vacator 2014</div>
   
</body>
</html>