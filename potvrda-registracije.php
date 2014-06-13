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
//$SQL = "SELECT * FROM oglasi WHERE idoglasa='$oglasid' LIMIT 0,1";

$SQL = "SELECT * FROM korisnici WHERE korisnickoime='$user' AND idkorisnika='$key'";
//$SQL1 = "SELECT * FROM slike";

$result = mysql_query($SQL);
//$result1 = mysql_query($SQL1);

$num_rows = mysql_num_rows($result); 

if($num_rows == 1){

/*Generiranje novog id korisnika*/
		
		/*Generiranje koliko ce biti znakova od 26-32*/
		$brojznakova = rand(26,32);
		
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$randomString = '';
		for ($i = 0; $i < $brojznakova; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
		}

$SQL1 = "UPDATE korisnici SET potvrden=1,idkorisnika='$randomString' WHERE korisnickoime='$user' AND idkorisnika='$key'";

$result1 = mysql_query($SQL1);

echo'Korisnik je uspješno potvrđen. <a href="prijava.php">Prijavite se</a>';


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
//header('Location: index.php');
?>