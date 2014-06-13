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
		
		//ako je user logiran prebacuje na index.php
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

		<?php 
//ako nije setan username i key onda javi gresku
		if (isset($_GET['user'],$_GET['key'])){
		
$user = $_GET["user"];
$user = stripslashes($user);
$user = mysql_real_escape_string($user);
		
$key = $_GET["key"];
$key = stripslashes($key);
$key = mysql_real_escape_string($key);

//Podaci za spajanje na bazu
$user_name = "root";
$password = "";
$database = "vacator";
$server = "localhost";

$db_handle = mysql_connect($server, $user_name, $password);
$db_found = mysql_select_db($database, $db_handle);

if ($db_found) {
mysql_query("set names 'utf8'");

$SQL = "SELECT * FROM korisnici WHERE korisnickoime='$user' AND idkorisnika='$key'";

$result = mysql_query($SQL);

$num_rows = mysql_num_rows($result); 

if($num_rows == 1){

echo'<form name="input" action="povratak-lozinke-potvrda.php" method="post">
<table><tr><td>Nova lozinka: </td><td><input type="password" id="lozinka" name="lozinka" placeholder="min 6 znakova"></td></tr>
<tr><td>Potvrda lozinke: </td><td><input type="password" id="lozinka-potvrda" name="potvrdalozinke"></td></tr>
<input type="hidden" name="username" value="'.$user.'">
<input type="hidden" name="key" value="'.$key.'">
<tr><td><input type="submit" id="submit" class="btn btn-success" value="Potvrdi"></td></tr>
</table></form>';
}
else{
echo'Krivi podaci.';
}
}else{
echo'Došlo je do greške.';
}
}else{
echo'Krivi podaci.';
}
?>
	<script>
		jQuery(function(){
        $("#submit").click(function(){
        $(".error").hide();
        var hasError = false;
        var passwordVal = $("#lozinka").val();
        var checkVal = $("#lozinka-potvrda").val();
        if (passwordVal == '' || passwordVal.length < 6) {
            $("#lozinka").after('<span class="error" style="color:#e9322d;"> Unesite lozinku (min 6 znaka)</span>');
            hasError = true;
        } else if (checkVal == '') {
            $("#lozinka-potvrda").after('<span class="error" style="color:#e9322d;"> Potvrdite lozinku</span>');
            hasError = true;
        } else if (passwordVal != checkVal ) {
            $("#lozinka-potvrda").after('<span class="error" style="color:#e9322d;"> Lozinke nisu jednake</span>');
            hasError = true;
        }
        if(hasError == true) {return false;}
    });
});
		</script>	
		

</div>

            </div>

    <div class="footer">Copyright Vacator 2014</div>
   
</body>
</html>