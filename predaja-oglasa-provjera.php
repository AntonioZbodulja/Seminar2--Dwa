<?xml version="1.0" encoding="UTF-8" ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="hr" lang="hr" dir="ltr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width">
    <title>Predaja oglasa - Vacator</title>
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

if(isset($_POST['naslov'])){
$naslov=$_POST['naslov']; 
}
if(isset($_POST['kratkiopis'])){
$kratkiopis=$_POST['kratkiopis']; 
}
if(isset($_POST['opis'])){
$opis=$_POST['opis']; 
}
if(isset($_POST['cijena']) && $_POST['cijena']>0 && is_numeric($_POST['cijena'])){
$cijena=$_POST['cijena']; 
}
if(isset($_POST['zupanija'])){
$zupanija=$_POST['zupanija']; 
}
if(isset($_POST['grad'])){
$grad=$_POST['grad']; 
}
if(isset($_POST['brojsoba'])){
$brojsoba=$_POST['brojsoba']; 
}
if(isset($_POST['brojosoba'])){
$brojosoba=$_POST['brojosoba']; 
}
if(isset($_POST['vrstasmjestaja'])){
$vrstasmjestaja=$_POST['vrstasmjestaja']; 
}
if(isset($_POST['brojlezaja']) && $_POST['brojlezaja']>0 && $_POST['brojlezaja']<9 && is_numeric($_POST['brojlezaja'])){
$brojlezaja=$_POST['brojlezaja']; 
}
else{
$brojlezaja=0;
}
if(isset($_POST['minbrojnocenja']) && $_POST['minbrojnocenja']>0 && is_numeric($_POST['minbrojnocenja'])){
$minbrojnocenja=$_POST['minbrojnocenja']; 
}
else{
$minbrojnocenja=0;
}
if(isset($_POST['povrsina']) && $_POST['povrsina']>0 && is_numeric($_POST['povrsina'])){
$povrsina=$_POST['povrsina']; 
}
else{
$povrsina=0;
}
if(isset($_POST['udaljenostcentramjesta']) && $_POST['udaljenostcentramjesta']>0 && is_numeric($_POST['udaljenostcentramjesta'])){
$udaljenostcentramjesta=$_POST['udaljenostcentramjesta']; 
}
else{
$udaljenostcentramjesta=0;
}
if(isset($_POST['udaljenostodplaze']) && $_POST['udaljenostodplaze']>0 && is_numeric($_POST['udaljenostodplaze'])){
$udaljenostodplaze=$_POST['udaljenostodplaze']; 
}
else{
$udaljenostodplaze=0;
}
if(isset($_POST['zvjezdice']) && ($_POST['zvjezdice']>0 && $_POST['zvjezdice']<6) && is_numeric($_POST['zvjezdice'])){
$zvjezdice=$_POST['zvjezdice']; 
}
else{
$zvjezdice=0;
}
if(isset($_POST['predbroj']) && ($_POST['predbroj']>0 && $_POST['predbroj']<801) && is_numeric($_POST['predbroj'])){
$predbroj=$_POST['predbroj']; 
}
else{
$predbroj=0;
}
if(isset($_POST['broj']) && is_numeric($_POST['broj'])){
$broj=$_POST['broj']; 
}
else{
$broj=0;
}

if(isset($_POST['tv'])){
$tv=$_POST['tv']; 
}
else{
$tv = 0;
}
if(isset($_POST['grijanje'])){
$grijanje=$_POST['grijanje'];
} 
else{
$grijanje = 0;
}
if(isset($_POST['internet'])){
$internet=$_POST['internet']; 
}
else{
$internet = 0;
}
if(isset($_POST['kabelska'])){
$kabelska=$_POST['kabelska'];
}
else{
$kabelska = 0;
}
if(isset($_POST['kupaonica'])){ 
$kupaonica=$_POST['kupaonica']; 
}
else{
$kupaonica = 0;
}
if(isset($_POST['kuhinja'])){
$kuhinja=$_POST['kuhinja']; 
}
else{
$kuhinja = 0;
}
if(isset($_POST['dozvoljeniljubimci'])){
$dozvoljeniljubimci=$_POST['dozvoljeniljubimci'];
}
else{
$dozvoljeniljubimci = 0;
}
if(isset($_POST['klima'])){ 
$klima=$_POST['klima']; 
}
else{
$klima = 0;
}
if(isset($_POST['terasa'])){
$terasa=$_POST['terasa']; 
}
else{
$terasa = 0;
}
if(isset($_POST['perilicarublja'])){
$perilicarublja=$_POST['perilicarublja']; 
}
else{
$perilicarublja = 0;
}
if(isset($_POST['perilicasuda'])){
$perilicasuda=$_POST['perilicasuda']; 
}
else{
$perilicasuda = 0;
}
if(isset($_POST['hladnjak'])){
$hladnjak=$_POST['hladnjak']; 
}
else{
$hladnjak = 0;
}
if(isset($_POST['pusenjedozvoljeno'])){
$pusenjedozvoljeno=$_POST['pusenjedozvoljeno'];
}
else{
$pusenjedozvoljeno = 0;
}
if(isset($_POST['osiguranparking'])){ 
$osiguranparking=$_POST['osiguranparking'];
}
else{
$osiguranparking = 0;
}
if(isset($_POST['lokacija'])){ 
$lokacija=$_POST['lokacija'];
}
else{
$lokacija = "";
}

//MySQL injection
$naslov = stripslashes($naslov);
$naslov = mysql_real_escape_string($naslov);
$kratkiopis = stripslashes($kratkiopis);
$kratkiopis = mysql_real_escape_string($kratkiopis);
$opis = stripslashes($opis);
$opis = mysql_real_escape_string($opis);
$cijena = stripslashes($cijena);
$cijena = mysql_real_escape_string($cijena);
$zupanija = stripslashes($zupanija);
$zupanija = mysql_real_escape_string($zupanija);
$grad = stripslashes($grad);
$grad = mysql_real_escape_string($grad);
$brojsoba = stripslashes($brojsoba);
$brojsoba = mysql_real_escape_string($brojsoba);
$brojosoba = stripslashes($brojosoba);
$brojosoba = mysql_real_escape_string($brojosoba);
$vrstasmjestaja = stripslashes($vrstasmjestaja);
$vrstasmjestaja = mysql_real_escape_string($vrstasmjestaja);
$brojlezaja = stripslashes($brojlezaja);
$brojlezaja = mysql_real_escape_string($brojlezaja);
$minbrojnocenja = stripslashes($minbrojnocenja);
$minbrojnocenja = mysql_real_escape_string($minbrojnocenja);
$povrsina = stripslashes($povrsina);
$povrsina = mysql_real_escape_string($povrsina);
$udaljenostcentramjesta = stripslashes($udaljenostcentramjesta);
$udaljenostcentramjesta = mysql_real_escape_string($udaljenostcentramjesta);
$udaljenostodplaze = stripslashes($udaljenostodplaze);
$udaljenostodplaze = mysql_real_escape_string($udaljenostodplaze);
$zvjezdice = stripslashes($zvjezdice);
$zvjezdice = mysql_real_escape_string($zvjezdice);
$predbroj = stripslashes($predbroj);
$predbroj = mysql_real_escape_string($predbroj);
$broj = stripslashes($broj);
$broj = mysql_real_escape_string($broj);
$tv = stripslashes($tv);
$tv = mysql_real_escape_string($tv);
$grijanje = stripslashes($grijanje);
$grijanje = mysql_real_escape_string($grijanje);
$internet = stripslashes($internet);
$internet = mysql_real_escape_string($internet);
$kabelska = stripslashes($kabelska);
$kabelska = mysql_real_escape_string($kabelska);
$kupaonica = stripslashes($kupaonica);
$kupaonica = mysql_real_escape_string($kupaonica);
$kuhinja = stripslashes($kuhinja);
$kuhinja = mysql_real_escape_string($kuhinja);
$dozvoljeniljubimci = stripslashes($dozvoljeniljubimci);
$dozvoljeniljubimci = mysql_real_escape_string($dozvoljeniljubimci);
$klima = stripslashes($klima);
$klima = mysql_real_escape_string($klima);
$terasa = stripslashes($terasa);
$terasa = mysql_real_escape_string($terasa);
$perilicarublja = stripslashes($perilicarublja);
$perilicarublja = mysql_real_escape_string($perilicarublja);
$perilicasuda = stripslashes($perilicasuda);
$perilicasuda = mysql_real_escape_string($perilicasuda);
$hladnjak = stripslashes($hladnjak);
$hladnjak = mysql_real_escape_string($hladnjak);
$pusenjedozvoljeno = stripslashes($pusenjedozvoljeno);
$pusenjedozvoljeno = mysql_real_escape_string($pusenjedozvoljeno);
$osiguranparking = stripslashes($osiguranparking);
$osiguranparking = mysql_real_escape_string($osiguranparking);
$lokacija = stripslashes($lokacija);
$lokacija = mysql_real_escape_string($lokacija);


		//uzmi korisnicko ime iz sesije sa kojim je prijavljen
		
		if (isset($_SESSION['korisnickoime'])){
		$korisnickoime = $_SESSION['korisnickoime'];
		}
		else{
		header("Location: prijava.php");
		die("Došlo je do greške, provjerite da li su Vam odobreni kolačići.");
		}
		/*Generiranje id oglasa*/
		
		/*Generiranje znakova 26*/
		$countsqlprovjeraid=1;
		while($countsqlprovjeraid>0){
		$brojznakova = rand(26,27);
		
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$idoglasa = '';
		for ($i = 0; $i < $brojznakova; $i++) {
        $idoglasa .= $characters[rand(0, strlen($characters) - 1)];
		}
		$sqlprovjeraid="SELECT * FROM $tbl_name1 WHERE idoglasa='".$idoglasa."'";
		$resultprovjeraid=mysql_query($sqlprovjeraid);
		$countsqlprovjeraid=mysql_num_rows($resultprovjeraid);
		}

$sqloglas="INSERT INTO $tbl_name1 (naslov, kratkiopis, dugiopis, cijena, grad, brojosoba, povrsina, brojzvjezdica, brojsoba, korisnickoime, udaljenostcentramjesta, brojlezaja, minimalanbrojnocenja, idoglasa, blizinaplaze, brojtelefona, idzupanije, idkategorije, lokacija) VALUES ('" . $naslov . "','" . $kratkiopis . "','" . $opis . "','" . $cijena . "','" . $grad . "','" . $brojosoba . "','" . $povrsina . "','" . $zvjezdice . "','" . $brojsoba . "','" . $korisnickoime . "','" . $udaljenostcentramjesta . "','" . $brojlezaja . "','" . $minbrojnocenja . "','" . $idoglasa . "','" . $udaljenostodplaze . "','" . $predbroj ." ". $broj. "', '" . $zupanija . "','" . $vrstasmjestaja . "','" . $lokacija . "')";



if(isset($tv) && ($tv==1) && is_numeric($tv)){
$tv = 1;
}
else{
$tv = 0;
}
if(isset($grijanje)&& ($grijanje==1) && is_numeric($grijanje)){
$grijanje = 1;
}
else{
$grijanje = 0;
}
if(isset($internet) && ($internet==1) && is_numeric($internet)){
$internet = 1;
}
else{
$internet = 0;
}
if(isset($kabelska) && ($kabelska==1) && is_numeric($kabelska)){
$kabelska = 1;
}
else{
$kabelska = 0;
}
if(isset($kupaonica) && ($kupaonica==1) && is_numeric($kupaonica)){
$kupaonica = 1;
}
else{
$kupaonica = 0;
}
if(isset($kuhinja) && ($kuhinja==1) && is_numeric($kuhinja)){
$kuhinja = 1;
}
else{
$kuhinja = 0;
}
if(isset($dozvoljeniljubimci) && ($dozvoljeniljubimci==1) && is_numeric($dozvoljeniljubimci)){
$dozvoljeniljubimci = 1;
}
else{
$dozvoljeniljubimci = 0;
}
if(isset($klima) && ($klima==1) && is_numeric($klima)){
$klima = 1;
}
else{
$klima = 0;
}
if(isset($terasa) && ($terasa==1) && is_numeric($terasa)){
$terasa = 1;
}
else{
$terasa = 0;
}
if(isset($perilicarublja) && ($perilicarublja==1) && is_numeric($perilicarublja)){
$perilicarublja = 1;
}
else{
$perilicarublja = 0;
}
if(isset($perilicasuda) && ($perilicasuda==1) && is_numeric($perilicasuda)){
$perilicasuda = 1;
}
else{
$perilicasuda = 0;
}
if(isset($hladnjak) && ($hladnjak==1) && is_numeric($hladnjak)){
$hladnjak = 1;
}
else{
$hladnjak = 0;
}
if(isset($pusenjedozvoljeno) && ($pusenjedozvoljeno==1) && is_numeric($pusenjedozvoljeno)){
$pusenjedozvoljeno = 1;
}
else{
$pusenjedozvoljeno = 0;
}
if(isset($osiguranparking) && ($osiguranparking==1) && is_numeric($osiguranparking)){
$osiguranparking = 1;
}
else{
$osiguranparking = 0;
}

$sqlkarakteristike="INSERT INTO $tbl_name2 (idoglasa, grijanje, tv, internet, kabelska, kupaonica, kuhinja, dozvoljeniljubimci, klima, terasa, perilicarublja, hladnjak, perilicasuda, pusenjedozvoljeno, osiguranparking) VALUES ('" . $idoglasa . "','" . $grijanje . "','" . $tv . "','" . $internet . "','" . $kabelska . "','" . $kupaonica . "','" . $kuhinja . "','" . $dozvoljeniljubimci . "','" . $klima . "','" . $terasa . "','" . $perilicarublja . "','" . $hladnjak . "','" . $perilicasuda . "','" . $pusenjedozvoljeno . "','" . $osiguranparking . "')";

mysql_query("SET CHARACTER SET utf8");
//mysqli_set_charset($con, "utf8"); //da upis radi i sa utf-8 znakovima

$resultoglas=mysql_query($sqloglas);
$resultkarakteristike=mysql_query($sqlkarakteristike);

/*if ($resultoglas){
echo"resultoglas prosao <br>";
}
if ($resultkarakteristike){
echo"resultkarakteristike prosao <br>";
}*/

//ako oglas prolazi onda ide upload slika ako ih ima
if ($resultoglas && $resultkarakteristike){

/*Upload slike glavne*/
//slika 1
$allowedExts = array("gif", "jpeg", "jpg", "png");
$temp1 = explode(".", $_FILES["file1"]["name"]);
$extension1 = end($temp1);

if (is_uploaded_file($_FILES['file1']['tmp_name'])) {
if ((($_FILES["file1"]["type"] == "image/gif")
|| ($_FILES["file1"]["type"] == "image/jpeg")
|| ($_FILES["file1"]["type"] == "image/jpg")
|| ($_FILES["file1"]["type"] == "image/pjpeg")
|| ($_FILES["file1"]["type"] == "image/x-png")
|| ($_FILES["file1"]["type"] == "image/png"))
&& ($_FILES["file1"]["size"] < 500000)
&& in_array($extension1, $allowedExts)) {
//ako ima errora
  if ($_FILES["file1"]["error"] > 0) {
    echo "Došlo je do greške kod prijenosa slike(1). Molimo pokušajte ponovo: " . $_FILES["file1"]["error"] . "<br>";
  } else {
    
	//generiranje imena slike
	$brojznakova1 = rand(10,15);
		
		$characters1 = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$idslike1 = '';
		for ($i = 0; $i < $brojznakova1; $i++) {
        $idslike1 .= $characters1[rand(0, strlen($characters1) - 1)];
		}
		$_FILES["file1"]["name"];
		
    if (file_exists("upload/" . $_FILES["file1"]["name"])) {
      echo $_FILES["file1"]["name"] . " postoji. ";
	  //$_FILES["file"]["$idslike."(1)""];
    } 
	else {
      
	  $ext1 = explode('.',$_FILES['file1']['name']);
$extension1 = $ext1[1];

$newname1 = $korisnickoime.'_'.date("Ymd").'_'.time().'(1).';

$full_local_path1 = 'upload/'.$newname1.$extension1 ;
move_uploaded_file($_FILES['file1']['tmp_name'], $full_local_path1);

$sqlslike1="INSERT INTO slike (link, idoglasa,glavnaslika) VALUES ('" . $full_local_path1 . "','" . $idoglasa . "', 1)";
$resultslike1=mysql_query($sqlslike1);

 if($resultslike1){
	  echo "Slika(1) je uspješno dodana.<br />";
	  }
	  else{
	  echo "Slika(1) nije dodana (pogrešan format slike ili je slika veća od 0.5MB).<br />";
	  }
    }
  }
} else {
  echo "Pogrešan format slike ili je slika prevelika.<br />";
}
}

//slika 2

$temp2 = explode(".", $_FILES["file2"]["name"]);
$extension2 = end($temp2);

if (is_uploaded_file($_FILES['file2']['tmp_name'])) {
if ((($_FILES["file2"]["type"] == "image/gif")
|| ($_FILES["file2"]["type"] == "image/jpeg")
|| ($_FILES["file2"]["type"] == "image/jpg")
|| ($_FILES["file2"]["type"] == "image/pjpeg")
|| ($_FILES["file2"]["type"] == "image/x-png")
|| ($_FILES["file2"]["type"] == "image/png"))
&& ($_FILES["file2"]["size"] < 500000)
&& in_array($extension2, $allowedExts)) {
//ako ima errora
  if ($_FILES["file2"]["error"] > 0) {
    echo "Došlo je do greške kod prijenosa slike(2). Molimo pokušajte ponovo: " . $_FILES["file2"]["error"] . "<br>";
  } else {
    
	//generiranje imena slike
	$brojznakova2 = rand(10,15);
		
		$characters2 = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$idslike2 = '';
		for ($i = 0; $i < $brojznakova2; $i++) {
        $idslike2 .= $characters2[rand(0, strlen($characters2) - 1)];
		}
		$_FILES["file2"]["name"];
		
    if (file_exists("upload/" . $_FILES["file2"]["name"])) {
      //echo $_FILES["file"]["name"] . " already exists. ";
	  //$_FILES["file"]["$idslike."(1)""];
    } 
	else {
      
	  $ext2 = explode('.',$_FILES['file2']['name']);
$extension2 = $ext2[1];

$newname2 = $korisnickoime.'_'.date("Ymd").'_'.time().'(2).';

$full_local_path2 = 'upload/'.$newname2.$extension2 ;
move_uploaded_file($_FILES['file2']['tmp_name'], $full_local_path2);

$sqlslike2="INSERT INTO slike (link, idoglasa,glavnaslika) VALUES ('" . $full_local_path2 . "','" . $idoglasa . "', 0)";
$resultslike2=mysql_query($sqlslike2);

 if($resultslike2){
	  echo "Slika(2) je uspješno dodana.<br />";
	  }
	  else{
	  echo "Slika(2) nije dodana (pogrešan format slike ili je slika veća od 0.5MB).<br />";
	  }
    }
  }
} else {
  echo "Pogrešan format slike ili je slika prevelika.<br />";
}
}

//slika 3

/*Upload slike*/
$temp3 = explode(".", $_FILES["file3"]["name"]);
$extension3 = end($temp3);

if (is_uploaded_file($_FILES['file3']['tmp_name'])) {
if ((($_FILES["file3"]["type"] == "image/gif")
|| ($_FILES["file3"]["type"] == "image/jpeg")
|| ($_FILES["file3"]["type"] == "image/jpg")
|| ($_FILES["file3"]["type"] == "image/pjpeg")
|| ($_FILES["file3"]["type"] == "image/x-png")
|| ($_FILES["file3"]["type"] == "image/png"))
&& ($_FILES["file3"]["size"] < 500000)
&& in_array($extension3, $allowedExts)) {
//ako ima errora
  if ($_FILES["file3"]["error"] > 0) {
    echo "Došlo je do greške kod prijenosa slike(3). Molimo pokušajte ponovo: " . $_FILES["file3"]["error"] . "<br>";
  } else {
    
	//generiranje imena slike
	$brojznakova3 = rand(10,15);
		
		$characters3 = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$idslike3 = '';
		for ($i = 0; $i < $brojznakova3; $i++) {
        $idslike3 .= $characters3[rand(0, strlen($characters3) - 1)];
		}
		$_FILES["file3"]["name"];
		
    if (file_exists("upload/" . $_FILES["file3"]["name"])) {
      //echo $_FILES["file"]["name"] . " already exists. ";
	  //$_FILES["file"]["$idslike."(1)""];
    } 
	else {
      
	  $ext3 = explode('.',$_FILES['file3']['name']);
$extension3 = $ext3[1];

$newname3 = $korisnickoime.'_'.date("Ymd").'_'.time().'(3).';

$full_local_path3 = 'upload/'.$newname3.$extension3 ;
move_uploaded_file($_FILES['file3']['tmp_name'], $full_local_path3);

$sqlslike3="INSERT INTO slike (link, idoglasa,glavnaslika) VALUES ('" . $full_local_path3 . "','" . $idoglasa . "', 0)";
$resultslike3=mysql_query($sqlslike3);

 if($resultslike3){
	  echo "Slika(3) je uspješno dodana.<br />";
	  }
	  else{
	  echo "Slika(3) nije dodana (pogrešan format slike ili je slika veća od 0.5MB).<br />";
	  }
    }
  }
} else {
  echo "Pogrešan format slike ili je slika prevelika.<br />";
}
}

//slika 4

/*Upload slike glavne*/
$temp4 = explode(".", $_FILES["file4"]["name"]);
$extension4 = end($temp4);

if (is_uploaded_file($_FILES['file4']['tmp_name'])) {
if ((($_FILES["file4"]["type"] == "image/gif")
|| ($_FILES["file4"]["type"] == "image/jpeg")
|| ($_FILES["file4"]["type"] == "image/jpg")
|| ($_FILES["file4"]["type"] == "image/pjpeg")
|| ($_FILES["file4"]["type"] == "image/x-png")
|| ($_FILES["file4"]["type"] == "image/png"))
&& ($_FILES["file4"]["size"] < 500000)
&& in_array($extension4, $allowedExts)) {
//ako ima errora
  if ($_FILES["file4"]["error"] > 0) {
    echo "Došlo je do greške kod prijenosa slike(4). Molimo pokušajte ponovo: " . $_FILES["file4"]["error"] . "<br>";
  } else {
    
	//generiranje imena slike
	$brojznakova4 = rand(10,15);
		
		$characters4 = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$idslike4 = '';
		for ($i = 0; $i < $brojznakova4; $i++) {
        $idslike4 .= $characters4[rand(0, strlen($characters4) - 1)];
		}
		$_FILES["file4"]["name"];
		
    if (file_exists("upload/" . $_FILES["file4"]["name"])) {
      //echo $_FILES["file"]["name"] . " already exists. ";
	  //$_FILES["file"]["$idslike."(1)""];
    } 
	else {
      
	  $ext4 = explode('.',$_FILES['file4']['name']);
$extension4 = $ext4[1];

$newname4 = $korisnickoime.'_'.date("Ymd").'_'.time().'(4).';

$full_local_path4 = 'upload/'.$newname4.$extension4 ;
move_uploaded_file($_FILES['file4']['tmp_name'], $full_local_path4);

$sqlslike4="INSERT INTO slike (link, idoglasa,glavnaslika) VALUES ('" . $full_local_path4 . "','" . $idoglasa . "', 0)";
$resultslike4=mysql_query($sqlslike4);

 if($resultslike4){
	  echo "Slika(4) je uspješno dodana.<br />";
	  }
	  else{
	  echo "Slika(4) nije dodana (pogrešan format slike ili je slika veća od 0.5MB).<br />";
	  }
    }
  }
} else {
  echo "Pogrešan format slike ili je slika prevelika.<br />";
}
}

//slika 5

$temp5 = explode(".", $_FILES["file5"]["name"]);
$extension5 = end($temp5);

if (is_uploaded_file($_FILES['file5']['tmp_name'])) {
if ((($_FILES["file5"]["type"] == "image/gif")
|| ($_FILES["file5"]["type"] == "image/jpeg")
|| ($_FILES["file5"]["type"] == "image/jpg")
|| ($_FILES["file5"]["type"] == "image/pjpeg")
|| ($_FILES["file5"]["type"] == "image/x-png")
|| ($_FILES["file5"]["type"] == "image/png"))
&& ($_FILES["file5"]["size"] < 500000)
&& in_array($extension5, $allowedExts)) {
//ako ima errora
  if ($_FILES["file5"]["error"] > 0) {
    echo "Došlo je do greške kod prijenosa slike(5). Molimo pokušajte ponovo: " . $_FILES["file5"]["error"] . "<br>";
  } else {
    
	//generiranje imena slike
	$brojznakova5 = rand(10,15);
		
		$characters5 = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$idslike5 = '';
		for ($i = 0; $i < $brojznakova5; $i++) {
        $idslike5 .= $characters5[rand(0, strlen($characters5) - 1)];
		}
		$_FILES["file5"]["name"];
		
    if (file_exists("upload/" . $_FILES["file5"]["name"])) {
      //echo $_FILES["file"]["name"] . " already exists. ";
	  //$_FILES["file"]["$idslike."(1)""];
    } 
	else {
      
	  $ext5 = explode('.',$_FILES['file5']['name']);
$extension5 = $ext5[1];

$newname5 = $korisnickoime.'_'.date("Ymd").'_'.time().'(5).';

$full_local_path5 = 'upload/'.$newname5.$extension5 ;
move_uploaded_file($_FILES['file5']['tmp_name'], $full_local_path5);

$sqlslike5="INSERT INTO slike (link, idoglasa,glavnaslika) VALUES ('" . $full_local_path5 . "','" . $idoglasa . "', 0)";
$resultslike5=mysql_query($sqlslike5);

 if($resultslike5){
	  echo "Slika(5) je uspješno dodana.<br />";
	  }
	  else{
	  echo "Slika(5) nije dodana (pogrešan format slike ili je slika veća od 0.5MB).<br />";
	  }
    }
  }
} else {
  echo "Pogrešan format slike ili je slika prevelika.<br />";
}
}
   echo"Oglas je uspješno predan!";
} 
else { 
 echo "Došlo je do greške kod predaje oglasa.";
}  

ob_end_flush();
}else{
//ako se ide direktno na stranicu bez post metode redirecta
header('Location: predaj-oglas.php');
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