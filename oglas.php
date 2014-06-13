<?xml version="1.0" encoding="UTF-8" ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="hr" lang="hr" dir="ltr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width">
    <title>Oglas - Vacator</title>
<link href="stil.css" rel="stylesheet" type="text/css" />
<link href="grid.css" rel="stylesheet" type="text/css" />
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script>-->

<!--lightbox-->
<script src="js/jquery-1.11.0.min.js"></script>
	<script src="js/lightbox.min.js"></script>
	<link href="css/lightbox.css" rel="stylesheet" />

<!--Twitter bootstrap-->
<link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
<!--Skripta za racunanje u drugim valutama-->
 <script src="http://coinmill.com/frame.js"></script>
 <script>
var currency_round=true;
var currency_decimalSeparator='.';
var currency_thousandsSeparator=',';
var currency_thousandsSeparatorMin=3;
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
		
		
		
		<!--Ispis oglasa-->
		<?PHP

		//ako nema id oglasa u url-u javlja gresku
		if (isset($_GET['oglasid'])){
		$oglasid = $_GET["oglasid"];
$oglasid = stripslashes($oglasid);
$oglasid = mysql_real_escape_string($oglasid);
		
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

//ispisuje u glavnom selectu samo sliku koja je glavna
$SQL = "SELECT * FROM oglasi LEFT JOIN slike ON oglasi.idoglasa=slike.idoglasa AND slike.glavnaslika=1 LEFT JOIN zupanija ON oglasi.idzupanije=zupanija.ID INNER JOIN kategorije ON oglasi.idkategorije=kategorije.ID INNER JOIN korisnici ON oglasi.korisnickoime=korisnici.korisnickoime INNER JOIN karakteristike ON oglasi.idoglasa=karakteristike.idoglasa WHERE oglasi.idoglasa='$oglasid'";
//$SQL = "SELECT oglasi.idoglasa, oglasi.naslov, oglasi.kratkiopis, oglasi.cijena, slike.link FROM oglasi LEFT JOIN slike ON oglasi.idoglasa=slike.idoglasa WHERE oglasi.idkategorije='$kategorija' ORDER BY oglasi.ID LIMIT 0,10";

//$SQL1 = "SELECT * FROM slike";

$result = mysql_query($SQL);
//$result1 = mysql_query($SQL1);

$num_rows = mysql_num_rows($result); 

if($num_rows == 1){

while ( $db_field = mysql_fetch_assoc($result) ) {

  $array[] = $db_field; //sprema u polje za daljnje koristenje podataka, da se ne vrsi ponovni upit na bazu
 
//naslov oglasa
echo '<div class="naslov-oglasa-pojedinacno" >
<span class="naslov-oglas">'.  $db_field['naslov'] .'</span>
</div><div class="row">';

//lightbox slika

//slika oglasa, ako nema slike prikazuje defaultnu sliku
if (!empty($db_field['link'])){ 
$slika = $db_field['link'];
} else{ 
$slika = "images/no-picture-1.png";
;}

//slika oglasa

//<a href="/link/to/image.jpg" title="Image caption" class="lightbox">Image title</a>
  echo '<div class="column-6 column"><a data-lightbox="image-1" href="'.$slika.'"><img src="'.$slika.'" alt="'.  $db_field['naslov'] .'" style="width: 100%;"></a>';
  
  //dodatne slike
  $SQLdodatneslike = "SELECT * FROM slike WHERE slike.idoglasa='$oglasid' AND glavnaslika=0";
  
  $resultdodatneslike = mysql_query($SQLdodatneslike);
//$result1 = mysql_query($SQL1);

$num_rows = mysql_num_rows($resultdodatneslike); 

if($num_rows > 0){
  
  
  while ( $db_field1 = mysql_fetch_assoc($resultdodatneslike) ) {
  
  echo '<div class="dodatne-slike-oglasa"><a data-lightbox="image-1" href="'.$db_field1['link'].'"><img src="'.$db_field1['link'].'" alt="'.  $db_field['naslov'] .'"></a></div>';
  
  }
  }
  
  
  echo'</div>';
  
  
//detaljni opis oglasa

echo'<div class="sidebar-right column-5 column">
		
		<h4>Podaci o oglasu</h4>

<table class="table-podaci-oglas">';
if($db_field['aktivan']==0){echo'<tr><td><div class="alert alert-danger"><h3>Ovaj oglas je neaktivan</h3></div></td></tr>';}
echo'<tr>
<td style="padding-top: 10px;">
Grad: '.$db_field['grad'].'
</td>
</tr>
<tr>
<td>
Županija: '.$db_field['naziv'].'
</td>
</tr>
<tr><td>
Vrsta smještaja: '.$db_field['nazivkategorije'].'
</td></tr>';
if($db_field['povrsina']>0){
  echo'<tr><td>
  Površina (m2): '.$db_field['povrsina'].'
  </td></tr>';
  }
echo'<tr><td>
Broj soba: '.$db_field['brojsoba'].'
 </td>
 </tr>
  <tr><td>
  Broj osoba: '.$db_field['brojosoba'].'
  </td></tr>';
  if($db_field['udaljenostcentramjesta']>0){
  echo'<tr><td>
  Udaljenost od centra mjesta (m): '.$db_field['udaljenostcentramjesta'].'
  </td></tr>';
  }
  echo'<tr><td>
  Broj ležaja: '.$db_field['brojlezaja'].'
  </td></tr>
  <tr><td>
  Minimalan broj noćenja: '.$db_field['minimalanbrojnocenja'].'
  </td></tr>';
   if($db_field['blizinaplaze']>0){
   echo'<tr><td>
   Blizina plaže (m): '.$db_field['blizinaplaze'].'
   </td></tr>';}
   echo'<tr><td>
   Broj telefona: '.$db_field['broj'].'
   </td></tr>';
   if(strlen($db_field['brojtelefona'])>5){
  echo'<tr><td>Dodatan broj telefona: '.$db_field['brojtelefona'].'
  </td></tr>';}

echo'
</table>

 
	  <div class="cijena">Cijena iznosi oko <select>
	  <option value="EUR"> <script>currency_show_conversion(' .  $db_field['cijena'] . ',"HRK","HRK");</script> HRK<br></option>
  <option value="HRK"><script>currency_show_conversion(' .  $db_field['cijena'] . ',"HRK","EUR");</script> EUR<br></option>
  <option value="BAM"> <script>currency_show_conversion(' .  $db_field['cijena'] . ',"HRK","BAM");</script> BAM<br></option>
  <option value="RSD"> <script>currency_show_conversion(' .  $db_field['cijena'] . ',"HRK","RSD");</script> RSD<br></option>
</select> 

<a href="profil.php?user='.$db_field['korisnickoime'].'"><span style="font-size: 20px; float: left; margin-top: 15px; margin-bottom: 20px;">Oglas predao korisnik: ' .  $db_field['korisnickoime'] . '</span></a>
</div>

</div>
		</div>';
		
		//ispis karakteristika ako je selektirana
  echo'<div class="row">';
  
  if ($db_field['grijanje'] == 1){
  echo'<div class="column"> 
   Grijanje <img src="images/kvacica.png" width="20">
  </div>';}
  
   if ($db_field['tv'] == 1){
  echo'<div class="column"> 
   TV <img src="images/kvacica.png" width="20">
  </div>';}
  
   if ($db_field['internet'] == 1){
  echo'<div class="column"> 
   Internet <img src="images/kvacica.png" width="20">
  </div>';}
  
   if ($db_field['kabelska'] == 1){
  echo'<div class="column"> 
   Kabelska <img src="images/kvacica.png" width="20">
  </div>';}
  
  if ($db_field['kupaonica'] == 1){
  echo'<div class="column"> 
   Kupaonica <img src="images/kvacica.png" width="20">
  </div>';}
  
  if ($db_field['kuhinja'] == 1){
  echo'<div class="column"> 
   Kuhinja <img src="images/kvacica.png" width="20">
  </div>';}
  
  if ($db_field['dozvoljeniljubimci'] == 1){
  echo'<div class="column"> 
   Dozvoljeni ljubimci <img src="images/kvacica.png" width="20">
  </div>';}
  
  if ($db_field['klima'] == 1){
  echo'<div class="column"> 
   Klima <img src="images/kvacica.png" width="20">
  </div>';}
  
  if ($db_field['terasa'] == 1){
  echo'<div class="column"> 
   Terasa <img src="images/kvacica.png" width="20">
  </div>';}
  
  if ($db_field['perilicarublja'] == 1){
  echo'<div class="column"> 
   Perilica rublja <img src="images/kvacica.png" width="20">
  </div>';}
  
  if ($db_field['hladnjak'] == 1){
  echo'<div class="column"> 
   Hladnjak <img src="images/kvacica.png" width="20">
  </div>';}
  
  if ($db_field['perilicasuda'] == 1){
  echo'<div class="column"> 
   Perilica suda <img src="images/kvacica.png" width="20">
  </div>';}
  
  if ($db_field['pusenjedozvoljeno'] == 1){
  echo'<div class="column"> 
   Pušenje dozvoljeno <img src="images/kvacica.png" width="20">
  </div>';}
  
  if ($db_field['osiguranparking'] == 1){
  echo'<div class="column"> 
   Osiguran parking <img src="images/kvacica.png" width="20">
  </div>';}
  
  
  echo'</div>';
 
  //dugi opis
	 echo '<div class="dugiopis column-10 column"><hr><h4>Opis oglasa</h4>' .  $db_field['dugiopis'] . '</div>';
 
 //ako je to od korisnika oglas ili ako je admin moze raditi izmjene (button za izmjene se prikazuje)
 if (isset($_SESSION['korisnickoime'])){
 $admin = $_SESSION['korisnickoime'];

 $SQLadmin = "SELECT * FROM korisnici WHERE korisnickoime='$admin' AND admin=1";
 $SQLvlasnik = "SELECT * FROM oglasi WHERE idoglasa='$oglasid' AND korisnickoime='$admin'";
 
$resultadmin = mysql_query($SQLadmin);
$resultvlasnik = mysql_query($SQLvlasnik);
//$result1 = mysql_query($SQL1);

$num_rows_admin = mysql_num_rows($resultadmin); 
$num_rows_vlasnik = mysql_num_rows($resultvlasnik); 

//prikazuje za izmjenu ako je admin ili vlasnik oglasa
if($num_rows_vlasnik == 1 OR $num_rows_admin == 1){
//sprema lokaciju iz baze kako bi kod ucitavanja mape prikazao tu lokaciju
$lokacija= $db_field['lokacija'];
 echo'
 <div class="izmjena-oglasa column-2 column">
 <!--brisanje oglasa-->
 <form action="brisanje-oglasa.php" method="post" accept-charset="utf-8" id="forma-izrada-oglasa"  onclick="return confirm(\'Da li ste sigurni da želite obrisati navedeni oglas?\');"> 
 <input type="hidden" name="idoglasa" value="'.$db_field['idoglasa'].'">
 <input class="btn btn-danger" type="submit" value="Brisanje oglasa" >
 </form>
 
 <!--aktiviraj/deaktiviraj oglas-->
 <form action="deaktivacija-oglasa.php" method="post" accept-charset="utf-8" id="forma-izrada-oglasa"  onclick="return confirm(\'Da li ste sigurni da želite aktivirati/deaktivirati navedeni oglas?\');"> 
 <input type="hidden" name="idoglasa" value="'.$db_field['idoglasa'].'">';
 if($db_field['aktivan']==1){
 echo'<input class="btn btn-warning" type="submit" value="Deaktiviraj oglas" >
  <input type="hidden" name="aktivan" value="0">
 ';
 }
 else{
  echo'<input class="btn btn-warning" type="submit" value="Aktiviraj oglas" >
   <input type="hidden" name="aktivan" value="1">
   ';
 }
 echo'
 </form>
 
 <!--izmjena oglasa-->
 <form action="izmjena-oglasa.php" method="post" accept-charset="utf-8" id="forma-izrada-oglasa" enctype="multipart/form-data"> 
 <input type="hidden" name="naslov" value="'.$db_field['naslov'].'">
 <input type="hidden" name="kratkiopis" value="'.$db_field['kratkiopis'].'">
 <input type="hidden" name="opis" value="'.$db_field['dugiopis'].'">
 <input type="hidden" name="cijena" value="'.$db_field['cijena'].'">
 <input type="hidden" name="zupanija" value="'.$db_field['idzupanije'].'">
 <input type="hidden" name="grad" value="'.$db_field['grad'].'">
 <input type="hidden" name="brojsoba" value="'.$db_field['brojsoba'].'">
 <input type="hidden" name="brojosoba" value="'.$db_field['brojosoba'].'">
 <input type="hidden" name="vrstasmjestaja" value="'.$db_field['idkategorije'].'">
 <input type="hidden" name="brojlezaja" value="'.$db_field['brojlezaja'].'">
 <input type="hidden" name="minbrojnocenja" value="'.$db_field['minimalanbrojnocenja'].'">
 <input type="hidden" name="povrsina" value="'.$db_field['povrsina'].'">
 <input type="hidden" name="udaljenostcentramjesta" value="'.$db_field['udaljenostcentramjesta'].'">
 <input type="hidden" name="udaljenostodplaze" value="'.$db_field['blizinaplaze'].'">
 <input type="hidden" name="zvjezdice" value="'.$db_field['brojzvjezdica'].'">
 <input type="hidden" name="broj1" value="'.$db_field['brojtelefona'].'">
 
 <input type="hidden" name="grijanje" value="'.$db_field['grijanje'].'">
 <input type="hidden" name="tv" value="'.$db_field['tv'].'">
 <input type="hidden" name="internet" value="'.$db_field['internet'].'">
 <input type="hidden" name="kabelska" value="'.$db_field['kabelska'].'">
 <input type="hidden" name="kupaonica" value="'.$db_field['kupaonica'].'">
 <input type="hidden" name="kuhinja" value="'.$db_field['kuhinja'].'">
 <input type="hidden" name="dozvoljeniljubimci" value="'.$db_field['dozvoljeniljubimci'].'">
 <input type="hidden" name="klima" value="'.$db_field['klima'].'">
 <input type="hidden" name="terasa" value="'.$db_field['terasa'].'">
 <input type="hidden" name="perilicarublja" value="'.$db_field['perilicarublja'].'">
 <input type="hidden" name="hladnjak" value="'.$db_field['hladnjak'].'">
 <input type="hidden" name="perilicasuda" value="'.$db_field['perilicasuda'].'">
 <input type="hidden" name="pusenjedozvoljeno" value="'.$db_field['pusenjedozvoljeno'].'">
 <input type="hidden" name="osiguranparking" value="'.$db_field['osiguranparking'].'">
 <input type="hidden" name="idoglasa" value="'.$db_field['idoglasa'].'">
 <input type="hidden" name="lokacija" value="'.$db_field['lokacija'].'">
 
 <input class="btn btn-success" type="submit" value="Izmjena oglasa">
 </form></div>
 
 ';
  }
  }
  //prikazuj kartu samo ako je nesto zapisano u lokaciju
  if (isset($lokacija) AND strlen($lokacija)>5){
 echo'
 <!--mapa koja se prikazuje za smjestaj ako je u oglasu navedeno-->
 <div class="column-6 column">
 <!--Racunanje rute od zeljenog mjesta do predlozenog mjesta-->
<form id="calculate-route" name="calculate-route" action="#" method="get">
      <label for="from" style="font-size:22px; margin-top:10%;">Pronađi rutu do navedene lokacije</label>
      <input type="text" id="from" name="from" required="required" placeholder="Adresa" size="50"/>
      <a id="from-link" href="#">Uzmi moju trenutnu poziciju</a>
      <br />		
		
		
		 <input type="hidden" name="to" id="to" value="'.$db_field['lokacija'].'">
		
      
      <br />
      <input class="btn btn-primary" type="submit" value="Nađi put do smještaja"/>
      <input class="btn" type="reset" />
    </form>
	<p id="error"></p>
    <div id="map"></div><br />
 </div>';
 }
 echo '</div>';
}

echo'</div>';

mysql_close($db_handle);
}
else {
echo"Navedeni oglas ne postoji.";
}
}
else{
echo "Došlo je do greške";
mysql_close($db_handle);
}
}else{
echo"Navedena stranica ne postoji.";
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
   
   <!--Google maps api-->
	 <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script>
      function calculateRoute(from, to) {
        // Centar Zagreb, Hrvatska
        var myOptions = {
          zoom: 10,
          center: new google.maps.LatLng(45.840196, 15.9643316),
          mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        // Draw the map
        var mapObject = new google.maps.Map(document.getElementById("map"), myOptions);
 
        var directionsService = new google.maps.DirectionsService();
        var directionsRequest = {
          origin: from,
          destination: to,
          travelMode: google.maps.DirectionsTravelMode.DRIVING,
          unitSystem: google.maps.UnitSystem.METRIC
        };
        directionsService.route(
          directionsRequest,
          function(response, status)
          {
            if (status == google.maps.DirectionsStatus.OK)
            {
              new google.maps.DirectionsRenderer({
                map: mapObject,
                directions: response
              });
            }
            else
              $("#error").append("Ne možemo pronaći rutu<br />");
          }
        );
      }
 
      $(document).ready(function() {
        // If the browser supports the Geolocation API
        if (typeof navigator.geolocation == "undefined") {
          $("#error").text("Vaš preglednik ne podržava Geolocation API");
          return;
        }
		/*prikazuje lokaciju*/
		else{
		function initialize() {
		
		
		//sprema lokaciju iz baze i prikazuje ju na mapi
  var address = '<?php echo $lokacija; ?>';

   var map = new google.maps.Map(document.getElementById('map'), { 
       mapTypeId: google.maps.MapTypeId.TERRAIN,
       zoom: 6
   });

   var geocoder = new google.maps.Geocoder();

   geocoder.geocode({
      'address': address
   }, 
   function(results, status) {
      if(status == google.maps.GeocoderStatus.OK) {
         new google.maps.Marker({
            position: results[0].geometry.location,
            map: map
         });
         map.setCenter(results[0].geometry.location);
      }
   });
}

google.maps.event.addDomListener(window, 'load', initialize);


		}
		/*prikazuje lokaciju*/
		
 /*$("#from-link, #to-link").click(function(event)*/
        $("#from-link, #to-link").click(function(event) {
          event.preventDefault();
          var addressId = this.id.substring(0, this.id.indexOf("-"));
 
          navigator.geolocation.getCurrentPosition(function(position) {
            var geocoder = new google.maps.Geocoder();
            geocoder.geocode({
              "location": new google.maps.LatLng(position.coords.latitude, position.coords.longitude)
            },
            function(results, status) {
              if (status == google.maps.GeocoderStatus.OK)
                $("#" + addressId).val(results[0].formatted_address);
              else
                $("#error").append("Ne možemo pronaći vašu adresu<br />");
            });
          },
          function(positionError){
            $("#error").append("Error: " + positionError.message + "<br />");
          },
          {
            enableHighAccuracy: true,
            timeout: 10 * 1000 // 10 sekundi
          });
        });
 
        $("#calculate-route").submit(function(event) {
          event.preventDefault();
          calculateRoute($("#from").val(), $("#to").val());
        });
      });
    </script>
    <style type="text/css">
      #map {
        width: 500px;
        height: 400px;
        margin-top: 10px;
      }
    </style>
  <!--Google maps api-->
   
   
   
</body>
</html>