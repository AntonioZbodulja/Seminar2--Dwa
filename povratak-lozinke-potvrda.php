<?php 
//ako je post metoda
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
		
$lozinka = $_POST["lozinka"];
$lozinka = stripslashes($lozinka);
$lozinka = mysql_real_escape_string($lozinka);

$username = $_POST["username"];
$username = stripslashes($username);
$username = mysql_real_escape_string($username);

$key = $_POST["key"];
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

$SQL = "SELECT * FROM korisnici WHERE korisnickoime='$username' AND idkorisnika='$key'";

$result = mysql_query($SQL);

$num_rows = mysql_num_rows($result); 

if($num_rows == 1){

/*Generiranje novog id korisnika i update radi sigurnosti*/
		
		/*Generiranje koliko ce biti znakova od 26-32*/
		$brojznakova = rand(26,32);
		
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$randomString = '';
		for ($i = 0; $i < $brojznakova; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
		}

		$lozinka1=sha1($lozinka);
		
$SQL1 = "UPDATE korisnici SET lozinka='$lozinka1', idkorisnika='$randomString' WHERE korisnickoime='$username' AND idkorisnika='$key'";

$result1 = mysql_query($SQL1);

//$num_rows1 = mysql_num_rows($result1); 

if (!mysql_error()){
echo'Korisniku je uspješno promijenjena lozinka. <a href="prijava.php">Prijavite se</a>';

}else{
echo"Krivi podaci za promjenu lozinke.";
}
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