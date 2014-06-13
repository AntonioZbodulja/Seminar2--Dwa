<?xml version="1.0" encoding="UTF-8" ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="hr" lang="hr" dir="ltr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width">
    <title>Popis oglasa - Vacator</title>
<link href="stil.css" rel="stylesheet" type="text/css" />
<link href="grid.css" rel="stylesheet" type="text/css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script>

<!--Twitter bootstrap-->
<link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
<script src="http://coinmill.com/frame.js"></script>
 
 <!--Skripta za preracunavanje valuta-->
 <script>
var currency_round=true;
var currency_decimalSeparator='.';
var currency_thousandsSeparator=',';
var currency_thousandsSeparatorMin=2;
</script>
</head>
<body>
        <div class="header">
       
	   <div class="header-left">
	  <a href="index.php"><img src="images/logo.png" style="height:40px; float:left; margin-right: 10px;"> <h2>Vacator</h2></a>
            </div>
			
			 <div class="header-right">
			  <?php 
			 session_start();
			 if (isset($_GET['kategorija'])){
			 //sprema u sesiju da kod filtriranja upotrijebi tu kategoriju u kojoj je trenutno
			 $_SESSION['kategorija']= $_GET['kategorija'];
			 }
			 
			 //ako je korisnik kliknuo za odredjeni broj oglasa na kraju stranice
			  if (isset($_GET['stranice'])){
			  $stranice = $_GET['stranice'];
			  $stranice = stripslashes($stranice);
			  $stranice = mysql_real_escape_string($stranice);
			  $_SESSION['stranice'] = $stranice;
			 }
			 //ako u sesiji postoji broj stranica sprema u varijablu
			 else if(isset($_SESSION['stranice'])){
			  $stranice = $_SESSION['stranice'];
			 }
			 //ako nije kliknuto za odreden broj stranica niti se od prije ne nalazi u sesiji broj stranica stavlja default 5
			 else{
			 $_SESSION['stranice'] = 5;
			 $stranice=5;
			 }
			 
			 //trenutni broj stranice
			 if (isset($_GET['stranica'])){
			 //sprema u sesiju da kod filtriranja upotrijebi tu kategoriju u kojoj je trenutno
			 
			 $stranica = $_GET['stranica'];
			 $stranica = stripslashes($stranica);
			  $stranica = mysql_real_escape_string($stranica);
			  
			  if($stranica < 2){
			  $stranica = 1; //ako je stranica 1 onda limit 0
			  }
			 }
			 else{
			 $stranica = 1; //limit ide od 0, brojoglasa
			 }
			 
			 //ako je user logiran ne prikazuje se prijava i registracija
	 if (!isset($_SESSION['korisnickoime'])){
	 echo'<a href="prijava.php">Prijava</a> <a href="registracija.php">Registracija </a>';
	 }
	echo'<a href="predaj-oglas.php">Predaj oglas</a>';
		
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

		<div class="row">	
		
		
		<div class="sidebar column-3 column">
		
		<?php if (isset($_GET['kategorija'])){ ?>
		
		<h4>FILTRIRAJ REZULTATE</h4>
<form action="oglasi.php" method="get" accept-charset="utf-8" > 
<table>
<tr>
<td style="padding-top: 10px;">
Cijena (u kn):
</td>
</tr>
<tr>
<td>
<input type="number" name="cijenaod" min="1" placeholder="od" style="width: 50px;"> <input type="number" name="cijenado" min="1" placeholder="do" style="width: 50px;">
</td>
</tr>
<tr><td>Županija:</td></tr>
<tr><td>
<select name="zupanija">
<option value="" selected="selected">-</option>
  <option value="1">Bjelovarsko-bilogorska</option>
  <option value="2">Brodsko-posavska</option>
  <option value="3">Dubrovačko-neretvanska</option>
  <option value="4">Istarska</option>
  <option value="5">Karlovačka</option>
  <option value="6">Koprivničko-križevačka</option>
  <option value="7">Krapinsko-zagorska</option>
  <option value="8">Ličko-senjska</option>
  <option value="9">Međimurska</option>
  <option value="10">Osječko-baranjska</option>
  <option value="11">Požeško-slavonska</option>
  <option value="12">Primorsko-goranska</option>
  <option value="13">Sisačko-moslavačka</option>
  <option value="14">Splitsko-dalmatinska</option>
  <option value="15">Šibensko-kninska</option>
  <option value="16">Varaždinska</option>
  <option value="17">Virovitičko-podravska</option>
  <option value="18">Vukovarsko-srijemska</option>
  <option value="19">Zadarska</option>
  <option value="20">Grad Zagreb</option>
  <option value="21">Zagrebačka</option>
  </select>
 </td>
 </tr>
  <tr><td>Grad:</td></tr>
  <tr><td><input type="text" name="grad"></td></tr>
  <tr><td>Min broj soba:</td></tr>
  <tr><td><input type="number" min="1" max="8" name="brojsoba" placeholder="1-8"></td></tr>
   <tr><td>Min broj osoba:</td></tr>
   <tr><td><input type="number" min="1" name="brojosoba"></td></tr>
  <tr><td><input type="hidden" name="pretrazi" value="1"><input type="hidden" name="kategorija" value="<?php echo $_SESSION['kategorija'];?>"></td></tr>
<tr><td><input class="btn btn-success" type="submit" value="Filtriraj"></td></tr>
</table>
</form>
		
		<?php } ?>
		
		</div>
		
		<!--Ispis oglasa-->
		<?PHP

		//ako nema id oglasa u url-u javlja gresku
		if (isset($_GET['kategorija'])){
		$kategorija = $_GET["kategorija"];
$kategorija = stripslashes($kategorija);
$kategorija = mysql_real_escape_string($kategorija);


		if ((isset($_GET['pretrazi'])) && ($_GET['pretrazi']==1)){
		
		if (isset($_GET['cijenaod'])){
		$cijenaod = $_GET["cijenaod"];
$cijenaod = stripslashes($cijenaod);
$cijenaod = mysql_real_escape_string($cijenaod);
}
		if (isset($_GET['cijenado'])){
		$cijenado = $_GET["cijenado"];
$cijenado = stripslashes($cijenado);
$cijenado = mysql_real_escape_string($cijenado);
}

if (isset($_GET['zupanija'])){
		$zupanija = $_GET["zupanija"];
$zupanija = stripslashes($zupanija);
$zupanija = mysql_real_escape_string($zupanija);
}

if (isset($_GET['grad'])){
		$grad = $_GET["grad"];
$grad = stripslashes($grad);
$grad = mysql_real_escape_string($grad);
}

if (isset($_GET['brojsoba'])){
		$brojsoba = $_GET["brojsoba"];
$brojsoba = stripslashes($brojsoba);
$brojsoba = mysql_real_escape_string($brojsoba);
}

if (isset($_GET['brojosoba'])){
		$brojosoba = $_GET["brojosoba"];
$brojosoba = stripslashes($brojosoba);
$brojosoba = mysql_real_escape_string($brojosoba);
}
}

//Podaci za spajanje na bazu
$user_name = "root";
$password = "";
$database = "vacator";
$server = "localhost";

/*cijenaod
cijenado
grad
zupanija
brojsoba
brojosoba*/

$db_handle = mysql_connect($server, $user_name, $password);
$db_found = mysql_select_db($database, $db_handle);

if ($db_found) {
mysql_query("set names 'utf8'");
if ((isset($_GET['pretrazi'])) && ($_GET['pretrazi']==1)){

//$location= $_GET['location'];

//sprema u sesiju da kod filtriranja upotrijebi tu kategoriju u kojoj je trenutno
$_SESSION['kategorija']= $kategorija;

if($cijenaod!=""){
    $where[] = " `cijena` >= '".mysql_real_escape_string($cijenaod)."'";
}
if($cijenado!=""){
    $where[] = " `cijena` <= '".mysql_real_escape_string($cijenado)."'";
}
if($grad!=""){
    $where[] = " `grad` = '".mysql_real_escape_string($grad)."'";
}
if($zupanija!=""){
    $where[] = " `idzupanije` = '".mysql_real_escape_string($zupanija)."'";
}
if($brojsoba!=""){
    $where[] = " `brojsoba` >= '".mysql_real_escape_string($brojsoba)."'";
}
if($brojosoba!=""){
    $where[] = " `brojosoba` >= '".mysql_real_escape_string($brojosoba)."'";
}
if($kategorija!=""){
    $where[] = " `idkategorije` = '".mysql_real_escape_string($kategorija)."'";
}
$where_clause = implode(' AND ', $where);
//same code for the other 2 options

//$SQL = "SELECT * FROM oglasi LEFT JOIN slike ON oglasi.idoglasa=slike.idoglasa WHERE $where_clause AND oglasi.aktivan=1";
$SQL = "SELECT oglasi.idoglasa, oglasi.naslov, oglasi.kratkiopis, oglasi.cijena, oglasi.aktivan, slike.link FROM oglasi LEFT JOIN slike ON oglasi.idoglasa=slike.idoglasa AND slike.glavnaslika=1 WHERE $where_clause AND oglasi.aktivan=1";
//$SQL = "SELECT * FROM oglasi INNER JOIN slike ON oglasi.idoglasa=slike.idoglasa WHERE '". $bzvz ."' oglasi.cijena<$cijenado AND oglasi.idzupanije=$zupanija AND oglasi.grad='$grad' AND oglasi.brojosoba>=$brojosoba AND oglasi.brojsoba>=$brojsoba AND oglasi.idkategorije=$kategorija ORDER BY oglasi.ID LIMIT 0,10";
}
else{
//left join da ispisuje sve oglase bez obzira da li imaju sliku, ako ima slike onda ispisuje samo glavnu sliku
$pocetnioglas = (int) (($stranica-1)*$stranice);
$SQL = "SELECT oglasi.idoglasa, oglasi.naslov, oglasi.kratkiopis, oglasi.cijena, oglasi.aktivan, slike.link FROM oglasi LEFT JOIN slike ON oglasi.idoglasa=slike.idoglasa AND slike.glavnaslika=1 WHERE oglasi.idkategorije='$kategorija' AND oglasi.aktivan=1 ORDER BY oglasi.ID LIMIT $pocetnioglas,$stranice";
}
$SQLcountoglasi = "SELECT * FROM oglasi WHERE idkategorije='$kategorija' AND aktivan=1";

$result = mysql_query($SQL);
$resultcountoglasi = mysql_query($SQLcountoglasi);

//ne broji sve oglase nego samo one koji su u limitu
$num_rows = mysql_num_rows($result);

//broji sve oglase u kategoriji
$num_rows_count_oglasi = mysql_num_rows($resultcountoglasi);


if($num_rows > 0){ 

echo'<div class="oglasi-content column-8 column">';
while ( $db_field = mysql_fetch_assoc($result) ) {

  $array[] = $db_field; //sprema u polje za daljnje koristenje podataka, da se ne vrsi ponovni upit na bazu

 //$name =   $db_field['naziv'];
 //$arr[] = $db_field['naziv'];
 
 //ispis oglasa

 echo'<div class="oglas">';
 echo'<a name="'.  $db_field['idoglasa'] .'"></a>';
 
//slika oglasa, ako nema slike prikazuje defaultnu sliku
if (!empty($db_field['link'])){ 
$slika = $db_field['link'];
} else{ 
$slika = "images/no-picture-1.png";
;}

//prikaz slike
  echo '<a href="oglas.php?oglasid='.$db_field['idoglasa'].'"><div class="slika-mjesta"><img src="'.$slika.'" alt="'.  $db_field['naslov'] .'"></div></a>';
  
  //naslov
 echo '<div class="naslov-oglasa" >
<a href="oglas.php?oglasid='.$db_field['idoglasa'].'"><span class="naslov-oglas" style="font-size:16px;">'.  $db_field['naslov'] .'</span></a>
</div>';
  
  //kratki opis
	 echo '<div class="kratkiopis">' .  $db_field['kratkiopis'] . '</div>';
	 //cijena
	  echo '<div class="cijena">Cijena iznosi oko <select>
	  <option value="EUR"> <script>currency_show_conversion('.$db_field['cijena'].',"HRK","HRK");</script> HRK<br></option>
  <option value="HRK"><script>currency_show_conversion('.$db_field['cijena'].',"HRK","EUR");</script> EUR<br></option>
  <option value="BAM"> <script>currency_show_conversion('.$db_field['cijena'].',"HRK","BAM");</script> BAM<br></option>
  <option value="RSD"> <script>currency_show_conversion('.$db_field['cijena'].',"HRK","RSD");</script> RSD<br></option>
</select> </div>';
 
 echo'</div>';

}

//Stranice paginacija

if (!isset($_GET['pretrazi'])){

//ako broj oglasa u kategoriji veci od broja po stranici ide paginacija
if($num_rows_count_oglasi > $stranice){
$brojstranica= (int) ($num_rows_count_oglasi/$stranice); //11/5

//ako je 33 oglasa i ide po 10 oglasa po stranici ispada 3.3 stranice i nije 3 stranice nego 4
if($brojstranica<($num_rows_count_oglasi/$stranice)){
$zadnjastranica=1;
}else{
$zadnjastranica=0;
}

echo '<div class="paginacija">
<ul>';
//ako ima manje od 4 stranica onda prikazuje sve stranice
if(($brojstranica+$zadnjastranica)<4){
for ($x=1; $x<=$brojstranica+$zadnjastranica; $x++) {
   echo " <li><a href=\"oglasi.php?kategorija=$kategorija&stranica=$x\"> $x </a></li> ";
   }
}
else{
 //$stranica je trenutna stranica na kojoj je
 $trenutnastranica = $stranica;
 
 //ako je zadnja stranica nema broja za sljedecu stranicu nego prikazuje trenutnu i jos dvije stranice ispred
 if(($brojstranica+$zadnjastranica)==($stranica)){
 $trenutnastranica = $trenutnastranica-2;
 }else{$trenutnastranica = $trenutnastranica-1;}
 for($i=1; $i<4; $i++){
 if($stranica<3){
 echo " <li><a href=\"oglasi.php?kategorija=$kategorija&stranica=$i\"> $i </a></li> ";
 }
 else{
 echo " <li><a href=\"oglasi.php?kategorija=$kategorija&stranica=$trenutnastranica\"> $trenutnastranica </a></li> ";
 $trenutnastranica++;
 }
 }
}
echo "</ul>";
}
}
//$actual_link = "http://$_SERVER[HTTP_HOST] BLA BLA $_SERVER[REQUEST_URI]";
 //echo "LINK JE: " .$actual_link;
//Broj oglasa po stranici
echo'<form action="oglasi.php" method="get" accept-charset="utf-8" style="float:left; margin-left: 10%;">
<table>
<tr>
<td><select name="stranice" style="width:70px; margin: 0;">
<option value="10" selected="selected">10</option>
  <option value="15">15</option>
  <option value="20">20</option>
  <option value="30">30</option>
  <option value="40">40</option>
  <option value="50">50</option>
  </select></td>
  <td><input type="hidden" name="kategorija" value="'.$_SESSION['kategorija'].'"></td>
<td><input class="btn btn-success" type="submit" value="Potvrdi"></td></tr>
</table>
</form>
</div>
';
//Zavrsava oglasi-content
echo'</div>';

}else{
echo '<span class="label label-info" style="padding: 6px 4px; font-size:18px;">Trenutno nema niti jednog oglasa u kategoriji.</span>';
}

mysql_close($db_handle);
}
else {
echo '<span class="label label-warning" style="padding: 6px 4px; font-size:18px;">Došlo je do greške.</span>';
mysql_close($db_handle);
}
}else{
echo '<a href="index.php"><img src="images/404.png"></a>';
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