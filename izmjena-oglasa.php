<?xml version="1.0" encoding="UTF-8" ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="hr" lang="hr" dir="ltr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width">
    <title>Izmjena oglasa - Vacator</title>
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

		//ako user nije logiran prebacuje na prijava.php, ne moze predati oglas
		session_start();
		if (!isset($_SESSION['korisnickoime'])){
		header("Location: prijava.php");
		die();
		}
		if (empty($_SESSION['korisnickoime'])){
		header("Location: prijava.php");
		}		
		?> 
		
        <div class="header">
       
	   <div class="header-left">
	  <a href="index.php"><img src="images/logo.png" style="height:40px; float:left; margin-right: 10px;"> <h2>Vacator</h2></a>
            </div>
			<div class="header-right">
			  <?php 
			 
		//ako je user logiran ispisuje njegovo ime i gumb za odjavu
		if (isset($_SESSION['korisnickoime'])){
		if (!empty($_SESSION['korisnickoime'])){
		echo 'Bok, <a href="profil.php?user='.$_SESSION['korisnickoime'].'">'.$_SESSION['korisnickoime'].'</a>';
		echo '<a href="odjava.php"><img src="images/logout.png" style="margin-left: 10px;"></a>';
		
		
		//MySQL injection
	
		if(isset($_POST['naslov'])){
$naslov=$_POST['naslov']; 
}
if(isset($_POST['idoglasa'])){
$idoglasa=$_POST['idoglasa']; 
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
if(isset($_POST['minbrojnocenja']) && $_POST['minbrojnocenja']>0 && is_numeric($_POST['minbrojnocenja'])){
$minbrojnocenja=$_POST['minbrojnocenja']; 
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
if(isset($_POST['zvjezdice']) && $_POST['zvjezdice']>0 && $_POST['zvjezdice']<6 && is_numeric($_POST['zvjezdice'])){
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
if(isset($_POST['broj1'])){
$broj1=$_POST['broj1']; 
}
/*else{
$broj1 = 0;
}*/

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

$naslov = stripslashes($naslov);
$naslov = mysql_real_escape_string($naslov);
$idoglasa = stripslashes($idoglasa);
$idoglasa = mysql_real_escape_string($idoglasa);
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
$broj1 = stripslashes($broj1);
$broj1 = mysql_real_escape_string($broj1);
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

		}
		}
		?> 
            </div>
</div>
		
        <div class="content">
		<div class="row">
		
		<div class="column column-8">
		
		<h3>Predaj oglas</h3>
<form action="izmjena-oglasa-provjera.php" method="post" accept-charset="utf-8" id="forma-izrada-oglasa" enctype="multipart/form-data"> 
<table>
<tr><td>Naslov oglasa: *</td> <td><input pattern=".{4,40}" value="<?php echo $naslov;?>" maxlength="40" required title="4 do 40 znakova" class="form-field-text" name="naslov" placeholder="maksimalno 40 znakova" style="display: inline-block; height: 20px; padding: 4px 6px; margin-bottom: 10px; font-size: 14px; line-height: 20px; color: #555555; vertical-align: middle; -webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px; border: 1px solid #cccccc;"></td></tr>
<tr><td>Kratki opis: *</td> <td><textarea name="kratkiopis" id="kratkiopis" rows="3" cols="100" maxlength="200" required="required" form="forma-izrada-oglasa" placeholder="Kratki opis će se prikazivati kod prikaza svih oglasa"><?php echo $kratkiopis;?></textarea><!--<input type="text" name="kratkiopis" required="required">--></td></tr>
<tr><td>Opis: *</td> <td><textarea name="opis" id="opis" rows="8" cols="100" required="required" maxlength="1200" form="forma-izrada-oglasa"><?php echo $opis;?></textarea></td></tr>
<tr><td>Cijena (kn): *</td> <td><input type="number" name="cijena" value="<?php echo $cijena;?>" class="form-field-karakteristike" min="1" required="required" placeholder="u kunama"></td></tr>
<tr><td>Županija: *</td> <td>
<select name="zupanija" required="required" class="form-field-karakteristike1">
  <option value="1" <?php if($zupanija==1) echo'selected="selected"';?>>Bjelovarsko-bilogorska</option>
  <option value="2" <?php if($zupanija==2) echo'selected="selected"';?>>Brodsko-posavska</option>
  <option value="3" <?php if($zupanija==3) echo'selected="selected"';?>>Dubrovačko-neretvanska</option>
  <option value="4" <?php if($zupanija==4) echo'selected="selected"';?>>Istarska</option>
  <option value="5" <?php if($zupanija==5) echo'selected="selected"';?>>Karlovačka</option>
  <option value="6" <?php if($zupanija==6) echo'selected="selected"';?>>Koprivničko-križevačka</option>
  <option value="7" <?php if($zupanija==7) echo'selected="selected"';?>>Krapinsko-zagorska</option>
  <option value="8" <?php if($zupanija==8) echo'selected="selected"';?>>Ličko-senjska</option>
  <option value="9" <?php if($zupanija==9) echo'selected="selected"';?>>Međimurska</option>
  <option value="10" <?php if($zupanija==10) echo'selected="selected"';?>>Osječko-baranjska</option>
  <option value="11" <?php if($zupanija==11) echo'selected="selected"';?>>Požeško-slavonska</option>
  <option value="12" <?php if($zupanija==12) echo'selected="selected"';?>>Primorsko-goranska</option>
  <option value="13" <?php if($zupanija==13) echo'selected="selected"';?>>Sisačko-moslavačka</option>
  <option value="14" <?php if($zupanija==14) echo'selected="selected"';?>>Splitsko-dalmatinska</option>
  <option value="15" <?php if($zupanija==15) echo'selected="selected"';?>>Šibensko-kninska</option>
  <option value="16" <?php if($zupanija==16) echo'selected="selected"';?>>Varaždinska</option>
  <option value="17" <?php if($zupanija==17) echo'selected="selected"';?>>Virovitičko-podravska</option>
  <option value="18" <?php if($zupanija==18) echo'selected="selected"';?>>Vukovarsko-srijemska</option>
  <option value="19" <?php if($zupanija==19) echo'selected="selected"';?>>Zadarska</option>
  <option value="20" <?php if($zupanija==20) echo'selected="selected"';?>>Grad Zagreb</option>
  <option value="21" <?php if($zupanija==21) echo'selected="selected"';?>>Zagrebačka</option>
  </select>
  </td></tr>
  <tr><td>Grad: *</td> <td><input type="text" value="<?php echo $grad;?>" name="grad" required="required" class="form-field-karakteristike2"></td></tr>
  <tr><td>Broj soba: *</td> <td><input type="number" value="<?php echo $brojsoba;?>" class="form-field-karakteristike" min="1" max="8" name="brojsoba" required="required" placeholder="1-8"></td></tr>
   <tr><td>Broj osoba: *</td> <td><input type="number" value="<?php echo $brojosoba;?>" class="form-field-karakteristike" min="1" name="brojosoba" required="required"></td></tr>
  <tr><td>Vrsta smještaja: *</td> <td>
<select name="vrstasmjestaja" required="required" class="form-field-karakteristike1">
  <option value="1" <?php if($vrstasmjestaja==1) echo'selected="selected"';?>>Apartman</option>
  <option value="2" <?php if($vrstasmjestaja==2) echo'selected="selected"';?>>Hotel</option>
  <option value="3" <?php if($vrstasmjestaja==3) echo'selected="selected"';?>>Hostel</option>
  <option value="4" <?php if($vrstasmjestaja==4) echo'selected="selected"';?>>Kamp</option>
  <option value="5" <?php if($vrstasmjestaja==5) echo'selected="selected"';?>>Ostalo</option>
   </select>
  </td></tr>
  <tr><td>Broj ležaja: *</td> <td>
<select name="brojlezaja" style="width: 75px;">
  <option value="1" <?php if($brojlezaja==1) echo'selected="selected"';?>>1</option>
  <option value="2" <?php if($brojlezaja==2) echo'selected="selected"';?>>2</option>
  <option value="3" <?php if($brojlezaja==3) echo'selected="selected"';?>>3</option>
  <option value="4" <?php if($brojlezaja==4) echo'selected="selected"';?>>4</option>
  <option value="5" <?php if($brojlezaja==5) echo'selected="selected"';?>>5</option>
  <option value="6" <?php if($brojlezaja==6) echo'selected="selected"';?>>6</option>
  <option value="7" <?php if($brojlezaja==7) echo'selected="selected"';?>>7</option>
  <option value="8" <?php if($brojlezaja==8) echo'selected="selected"';?>>8</option>
  </select>
  </td></tr>
  <tr><td>Minimalan broj noćenja: *</td> <td><input type="number" value="<?php echo $minbrojnocenja;?>" name="minbrojnocenja" required="required" class="form-field-karakteristike" min="1"></td></tr>
  <tr><td>Površina smještaja:</td> <td><input type="number" value="<?php echo $povrsina;?>" name="povrsina" class="form-field-karakteristike" placeholder="u m2"></td></tr>
  <tr><td>Udaljenost od centra mjesta:</td> <td><input type="number" value="<?php echo $udaljenostcentramjesta;?>" name="udaljenostcentramjesta" class="form-field-karakteristike" placeholder="u metrima"></td></tr>
  <tr><td>Udaljenost od plaže:</td> <td><input type="number" value="<?php echo $udaljenostodplaze;?>" name="udaljenostodplaze" class="form-field-karakteristike" placeholder="u metrima"></td></tr>
  <tr><td>Zvjezdice:</td> <td>
<select name="zvjezdice" style="width: 75px;">
  <option value="0" <?php if($zvjezdice==0) echo'selected="selected"';?>>---</option>
  <option value="1" <?php if($zvjezdice==1) echo'selected="selected"';?>>1</option>
  <option value="2" <?php if($zvjezdice==2) echo'selected="selected"';?>>2</option>
  <option value="3" <?php if($zvjezdice==3) echo'selected="selected"';?>>3</option>
  <option value="4" <?php if($zvjezdice==4) echo'selected="selected"';?>>4</option>
  <option value="5" <?php if($zvjezdice==5) echo'selected="selected"';?>>5</option>
  </select>
  </td></tr>
  
<tr><td>Dodatan broj mobitela/telefona: </td> <td>

<!--Razdvajanje broja telefona iz baze-->
<?php 
list($predbroj, $broj) = split(' ', $broj1);
//echo "predbroj: $predbroj; broj: $broj; <br />\n";


//ako ima slika uploadanih vuce ih iz baze
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


$SQLslike = "SELECT * FROM slike WHERE idoglasa='$idoglasa'";
$SQLslikeglavna = "SELECT * FROM slike WHERE idoglasa='$idoglasa' AND glavnaslika=1";

$resultslike = mysql_query($SQLslike);
$resultslikeglavna = mysql_query($SQLslikeglavna);

$num_rows_slike = mysql_num_rows($resultslike); 
$num_rows_slike_glavna = mysql_num_rows($resultslikeglavna); 

?>
<select name="predbroj" style="width: 75px;">
 <option value="0" <?php if($predbroj==0) echo'selected="selected"';?>>---</option>
  <option value="01" <?php if($predbroj==1) echo'selected="selected"';?>>01</option>
  <option value="020" <?php if($predbroj==20) echo'selected="selected"';?>>020</option>
  <option value="021" <?php if($predbroj==21) echo'selected="selected"';?>>021</option>
  <option value="022" <?php if($predbroj==22) echo'selected="selected"';?>>022</option>
  <option value="023" <?php if($predbroj==23) echo'selected="selected"';?>>023</option>
  <option value="031" <?php if($predbroj==31) echo'selected="selected"';?>>031</option>
  <option value="032" <?php if($predbroj==32) echo'selected="selected"';?>>032</option>
  <option value="033" <?php if($predbroj==33) echo'selected="selected"';?>>033</option>
  <option value="034" <?php if($predbroj==34) echo'selected="selected"';?>>034</option>
  <option value="035" <?php if($predbroj==35) echo'selected="selected"';?>>035</option>
  <option value="040" <?php if($predbroj==40) echo'selected="selected"';?>>040</option>
  <option value="042" <?php if($predbroj==42) echo'selected="selected"';?>>042</option>
  <option value="043" <?php if($predbroj==43) echo'selected="selected"';?>>043</option>
  <option value="044" <?php if($predbroj==44) echo'selected="selected"';?>>044</option>
  <option value="047" <?php if($predbroj==47) echo'selected="selected"';?>>047</option>
  <option value="048" <?php if($predbroj==48) echo'selected="selected"';?>>048</option>
  <option value="049" <?php if($predbroj==49) echo'selected="selected"';?>>049</option>
  <option value="051" <?php if($predbroj==51) echo'selected="selected"';?>>051</option>
  <option value="052" <?php if($predbroj==52) echo'selected="selected"';?>>052</option>
  <option value="053" <?php if($predbroj==53) echo'selected="selected"';?>>053</option>
  <option value="091" <?php if($predbroj==91) echo'selected="selected"';?>>091</option>
  <option value="092" <?php if($predbroj==92) echo'selected="selected"';?>>092</option>
  <option value="095" <?php if($predbroj==95) echo'selected="selected"';?>>095</option>
  <option value="097" <?php if($predbroj==97) echo'selected="selected"';?>>097</option>
  <option value="098" <?php if($predbroj==98) echo'selected="selected"';?>>098</option>
  <option value="099" <?php if($predbroj==99) echo'selected="selected"';?>>099</option>
  <option value="0800" <?php if($predbroj==800) echo'selected="selected"';?>>0800</option>
  </select>
  <input type="number" value="<?php echo $broj;?>" name="broj" style="margin-left: 10px; width: 120px;">
</td></tr>
<tr><td>TV</td><td><div class="roundedOne"><input type="checkbox" id="roundedOne1" name="tv" value="1" <?php if($tv==1) echo'checked="checked"';?>><label for="roundedOne1"></label></td></tr>
<tr><td>Grijanje</td><td><div class="roundedOne"><input type="checkbox" id="roundedOne2" name="grijanje" value="1" <?php if($grijanje==1) echo'checked="checked"';?>><label for="roundedOne2"></label></td></tr>
<tr><td>Internet</td><td><div class="roundedOne"><input type="checkbox" id="roundedOne3" name="internet" value="1" <?php if($internet==1) echo'checked="checked"';?>><label for="roundedOne3"></label></td></tr>
<tr><td>Kabelska</td><td><div class="roundedOne"><input type="checkbox" id="roundedOne4" name="kabelska" value="1" <?php if($kabelska==1) echo'checked="checked"';?>><label for="roundedOne4"></label></td></tr>
<tr><td>Kupaonica</td><td><div class="roundedOne"><input type="checkbox" id="roundedOne5" name="kupaonica" value="1" <?php if($kupaonica==1) echo'checked="checked"';?>><label for="roundedOne5"></label></td></tr>
<tr><td>Kuhinja</td><td><div class="roundedOne"><input type="checkbox" id="roundedOne6" name="kuhinja" value="1" <?php if($kuhinja==1) echo'checked="checked"';?>><label for="roundedOne6"></label></td></tr>
<tr><td>Dozvoljeni ljubimci</td><td><div class="roundedOne"><input type="checkbox" id="roundedOne7" name="dozvoljeniljubimci" value="1" <?php if($dozvoljeniljubimci==1) echo'checked="checked"';?>><label for="roundedOne7"></label></td></tr>
<tr><td>Klima</td><td><div class="roundedOne"><input type="checkbox" id="roundedOne8" name="klima" value="1" <?php if($klima==1) echo'checked="checked"';?>><label for="roundedOne8"></label></td></tr>
<tr><td>Terasa</td><td><div class="roundedOne"><input type="checkbox" id="roundedOne9" name="terasa" value="1" <?php if($terasa==1) echo'checked="checked"';?>><label for="roundedOne9"></label></td></tr>
<tr><td>Perilica rublja</td><td><div class="roundedOne"><input type="checkbox" id="roundedOne10" name="perilicarublja" value="1" <?php if($perilicarublja==1) echo'checked="checked"';?>><label for="roundedOne10"></label></td></tr>
<tr><td>Perilica suđa</td><td><div class="roundedOne"><input type="checkbox" id="roundedOne11" name="perilicasuda" value="1" <?php if($perilicasuda==1) echo'checked="checked"';?>><label for="roundedOne11"></label></td></tr>
<tr><td>Hladnjak</td><td><div class="roundedOne"><input type="checkbox" id="roundedOne12" name="hladnjak" value="1" <?php if($hladnjak==1) echo'checked="checked"';?>><label for="roundedOne12"></label></td></tr>
<tr><td>Pušenje dozvoljeno</td><td><div class="roundedOne"><input type="checkbox" id="roundedOne13" name="pusenjedozvoljeno" value="1" <?php if($pusenjedozvoljeno==1) echo'checked="checked"';?>><label for="roundedOne13"></label></td></tr>
<tr><td>Osiguran parking</td><td><div class="roundedOne"><input type="checkbox" id="roundedOne14" name="osiguranparking" value="1" <?php if($osiguranparking==1) echo'checked="checked"';?>><label for="roundedOne14"></label></td></tr>
<tr><td></td><td><input type="hidden" name="idoglasa" value="<?php echo $idoglasa ?>"></td></tr>

<?php 
//for petlja provjerava koliko ima slika oglas, ako fali koja slika toliko ima puta browse
$i=$num_rows_slike; //koliko slika ima
$z=$num_rows_slike_glavna; //ako ima glavna slika onda je 1
$x=2; //salje od file2 pa do file5

while( $i < 5){
if( $z == 0){
echo'<tr><td>Postavi glavnu sliku: </td><td><input type="file" name="file1" id="file1"></td></tr>';
$i++;
$z=1;
}else{
echo'<tr><td>Postavi sliku: </td><td><input type="file" name="file'.$x.'" id="file'.$x.'"></td></tr>';
$i++;
$x++;
}
}
?>
<tr><td>Unesite lokaciju smještaja: <span style="font-size: 12px;">(ispunjavanjem ovog polja prikazuje se na oglasu karta lokacije)</span></td><td><input type="text" value="<?php echo $lokacija;?>" name="lokacija" class="form-field-karakteristike2" placeholder="ulica, kućni broj, grad"></td></tr>
<!--<tr><td>Postavi sliku</td><td><input type="file" name="file" id="file"></td></tr>-->
<tr class="zadnji-red"><td></td><td><input class="btn btn-success" type="submit" value="Izmijeni oglas"></td></tr>
</table>
</form>

<?php
if($num_rows_slike > 0){
  
  
  while ( $db_field_slike = mysql_fetch_assoc($resultslike) ) {
  
  echo '<div class="slike-izmjena-oglasa"><a data-lightbox="image-1" href="'.$db_field_slike['link'].'"><img class="slika-izmjena" src="'.$db_field_slike['link'].'" alt="Slika za izmjenu"></a><button class="btn delete" style="width:100%;" type="button">Izbriši sliku</button> </div>';
  
  }
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
            </div>

    <div class="footer">Copyright Vacator 2014</div>
   
   
   <!--Brisanje slike oglasa-->
<script type="text/javascript" src="http://www.google.com/jsapi"></script><script type="text/javascript" src="/js/jquery.confirm.js">// <![CDATA[

// ]]></script><script type="text/javascript" language="javascript">// <![CDATA[
// load jquery here before calling this
$(document).ready(function() {
//var i = "<?php echo $num_rows_slike; ?>";

var i = 5;

    // delete the entry once we have confirmed that it should be deleted
    $('.delete').click(function() {
		//var parent = $(this).closest("div.slike-izmjena-oglasa").find("img.slika-izmjena").attr("src");
		var slika = $(this).closest("div.slike-izmjena-oglasa").find("img.slika-izmjena");
		var button = $(this).closest("button.delete");
		var linkslike= $(this).closest("div.slike-izmjena-oglasa").find("img.slika-izmjena").attr("src");
		
		//var parent = $(this).closest('img');
		//alert(slika);
		$.ajax({
			type: 'get',
			url: 'delete.php', // <- replace this with your url here
			data: 'ajax=1&delete=' + $(this).closest("div.slike-izmjena-oglasa").find("img.slika-izmjena").attr("src"), //sredit jos za slike koje pobrisane da se pokaze za upload i sredi sigurnost na delete
			//data: 'ajax=1&delete=upload/admin_20140526_1401127374(5).jpg',
			beforeSend: function() {
				slika.animate({'backgroundColor':'red'},300);
			},
			success: function() {
				slika.fadeOut(300,function() {
					slika.remove();
					button.remove();
					alert("Slika je uspješno pobrisana");
					
					//$( "form" ).before( "Postavi sliku: <input type="file" name="file" id="file">" );
					
					var pattern = "(1)";
					if(linkslike.indexOf(pattern) != -1){
					//ako je glavna slika pobrisana onda generira sljedeci kod
					var htmlcodeglavna = '<tr><td>Postavi glavnu sliku: </td><td><input type="file" name="file1" id="file1"></td></tr>';
					$(".zadnji-red").before(htmlcodeglavna);
					}
					else{
					//ako slika nije glavna onda generira sljedeci kod
					
					var htmlcode = '<tr><td>Postavi sliku: </td><td><input type="file" name="file'+i+'" id="file'+i+'"></td></tr>';
					$(".zadnji-red").before(htmlcode);
					i--; //i-- ide jer stavlja file od 5 jer kod ucitavanja stranice php skripta ide od 2 pa da ne budu isti
					}
   	
				});
			}
		});	        
    });

    // confirm that it should be deleted
    $('.delete').confirm({
        msg:'Do you really want to delete this?',
        timeout:3000
    });		
});
// ]]></script>
<!--Brisanje slike oglasa-->
   
   
</body>
</html>