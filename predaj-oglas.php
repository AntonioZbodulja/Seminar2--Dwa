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
<?php
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
		}
		}
		?> 
            </div>
</div>
		
        <div class="content">
		<div class="row">
		
		<div class="column column-8">
		
		<h3>Predaj oglas</h3>
<form action="predaja-oglasa-provjera.php" method="post" accept-charset="utf-8" id="forma-izrada-oglasa" enctype="multipart/form-data"> 
<table>
<tr><td>Naslov oglasa: *</td> <td><input pattern=".{4,40}" maxlength="40" required title="4 do 40 znakova" class="form-field-text" name="naslov" placeholder="maksimalno 40 znakova" style="display: inline-block; height: 20px; padding: 4px 6px; margin-bottom: 10px; font-size: 14px; line-height: 20px; color: #555555; vertical-align: middle; -webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px; border: 1px solid #cccccc;"></td></tr>
<tr><td>Kratki opis: *</td> <td><textarea name="kratkiopis" id="kratkiopis" rows="3" cols="100" maxlength="200" required="required" form="forma-izrada-oglasa" placeholder="Kratki opis će se prikazivati kod prikaza svih oglasa"></textarea><!--<input type="text" name="kratkiopis" required="required">--></td></tr>
<tr><td>Opis: *</td> <td><textarea name="opis" id="opis" rows="8" cols="100" required="required" maxlength="1200" form="forma-izrada-oglasa"></textarea></td></tr>
<tr><td>Cijena: *</td> <td><input type="number" name="cijena" class="form-field-karakteristike" min="1" required="required" placeholder="u kunama"></td></tr>
<tr><td>Županija: *</td> <td>
<select name="zupanija" required="required" class="form-field-karakteristike1">
<option value="0" selected="selected">-</option>
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
  </td></tr>
  <tr><td>Grad: *</td> <td><input type="text" name="grad" required="required" class="form-field-karakteristike2"></td></tr>
  <tr><td>Broj soba: *</td> <td><input type="number" class="form-field-karakteristike" min="1" max="8" name="brojsoba" required="required" placeholder="1-8"></td></tr>
   <tr><td>Broj osoba: *</td> <td><input type="number" class="form-field-karakteristike" min="1" name="brojosoba" required="required"></td></tr>
  <tr><td>Vrsta smještaja: *</td> <td>
<select name="vrstasmjestaja" required="required" class="form-field-karakteristike1">
<option value="0" selected="selected">-</option>
  <option value="1">Apartman</option>
  <option value="2">Hotel</option>
  <option value="3">Hostel</option>
  <option value="4">Kamp</option>
  <option value="5">Ostalo</option>
   </select>
   <!--<input type="text" name="vrstasmjestaja" placeholder="ako je ostalo napiši koji je">-->
  </td></tr>
  <tr><td>Broj ležaja: *</td> <td>
<select name="brojlezaja" style="width: 75px;">
  <option value="" selected="selected">---</option>
  <option value="1">1</option>
  <option value="2">2</option>
  <option value="3">3</option>
  <option value="4">4</option>
  <option value="5">5</option>
  <option value="6">6</option>
  <option value="7">7</option>
  <option value="8">8</option>
  </select>
  </td></tr>
  <tr><td>Minimalan broj noćenja: *</td> <td><input type="number" name="minbrojnocenja" required="required" class="form-field-karakteristike" min="1"></td></tr>
  <tr><td>Površina smještaja:</td> <td><input type="number" name="povrsina" class="form-field-karakteristike" min="1" placeholder="u m2"></td></tr>
  <tr><td>Udaljenost od centra mjesta:</td> <td><input type="number" name="udaljenostcentramjesta" class="form-field-karakteristike" min="1" placeholder="u metrima"></td></tr>
  <tr><td>Udaljenost od plaže:</td> <td><input type="number" name="udaljenostodplaze" class="form-field-karakteristike" min="1" placeholder="u metrima"></td></tr>
  <tr><td>Zvjezdice:</td> <td>
<select name="zvjezdice" style="width: 75px;">
  <option value="0" selected="selected">---</option>
  <option value="1">1</option>
  <option value="2">2</option>
  <option value="3">3</option>
  <option value="4">4</option>
  <option value="5">5</option>
  </select>
  </td></tr>
  
<tr><td>Dodatan broj mobitela/telefona: </td> <td>
<select name="predbroj" style="width: 75px;">
  <option value="" selected="selected">---</option>
  <option value="01">01</option>
  <option value="020">020</option>
  <option value="021">021</option>
  <option value="022">022</option>
  <option value="023">023</option>
  <option value="031">031</option>
  <option value="032">032</option>
  <option value="033">033</option>
  <option value="034">034</option>
  <option value="035">035</option>
  <option value="040">040</option>
  <option value="042">042</option>
  <option value="043">043</option>
  <option value="044">044</option>
  <option value="047">047</option>
  <option value="048">048</option>
  <option value="049">049</option>
  <option value="051">051</option>
  <option value="052">052</option>
  <option value="053">053</option>
  <option value="091">091</option>
  <option value="092">092</option>
  <option value="095">095</option>
  <option value="097">097</option>
  <option value="098">098</option>
  <option value="099">099</option>
  <option value="0800">0800</option>
  </select>
  <input type="number" name="broj" style="margin-left: 10px; width: 120px;">
</td></tr>
<tr><td>TV</td><td><div class="roundedOne"><input type="checkbox" id="roundedOne1" name="tv" value="1"><label for="roundedOne1"></label></div></td></tr>
<tr><td>Grijanje</td><td><div class="roundedOne"><input type="checkbox" id="roundedOne2" name="grijanje" value="1"><label for="roundedOne2"></label></div></td></tr>
<tr><td>Internet</td><td><div class="roundedOne"><input type="checkbox" id="roundedOne3" name="internet" value="1"><label for="roundedOne3"></label></div></td></tr>
<tr><td>Kabelska</td><td><div class="roundedOne"><input type="checkbox" id="roundedOne4" name="kabelska" value="1"><label for="roundedOne4"></label></div></td></tr>
<tr><td>Kupaonica</td><td><div class="roundedOne"><input type="checkbox" id="roundedOne5" name="kupaonica" value="1"><label for="roundedOne5"></label></div></td></tr>
<tr><td>Kuhinja</td><td><div class="roundedOne"><input type="checkbox" id="roundedOne6" name="kuhinja" value="1"><label for="roundedOne6"></label></div></td></tr>
<tr><td>Dozvoljeni ljubimci</td><td><div class="roundedOne"><input type="checkbox" id="roundedOne7" name="dozvoljeniljubimci" value="1"><label for="roundedOne7"></label></div></td></tr>
<tr><td>Klima</td><td><div class="roundedOne"><input type="checkbox" id="roundedOne8" name="klima" value="1"><label for="roundedOne8"></label></div></td></tr>
<tr><td>Terasa</td><td><div class="roundedOne"><input type="checkbox" id="roundedOne9" name="terasa" value="1"><label for="roundedOne9"></label></div></td></tr>
<tr><td>Perilica rublja</td><td><div class="roundedOne"><input type="checkbox" id="roundedOne10" name="perilicarublja" value="1"><label for="roundedOne10"></label></div></td></tr>
<tr><td>Perilica suđa</td><td><div class="roundedOne"><input type="checkbox" id="roundedOne11" name="perilicasuda" value="1"><label for="roundedOne11"></label></div></td></tr>
<tr><td>Hladnjak</td><td><div class="roundedOne"><input type="checkbox" id="roundedOne12" name="hladnjak" value="1"><label for="roundedOne12"></label></div></td></tr>
<tr><td>Pušenje dozvoljeno</td><td><div class="roundedOne"><input type="checkbox" id="roundedOne13" name="pusenjedozvoljeno" value="1"><label for="roundedOne13"></label></div></td></tr>
<tr><td>Osiguran parking</td><td><div class="roundedOne"><input type="checkbox" id="roundedOne14" name="osiguranparking" value="1"><label for="roundedOne14"></label></div></td></tr>
<tr><td>Unesite lokaciju smještaja: <span style="font-size: 12px;">(ispunjavanjem ovog polja prikazuje se na oglasu karta lokacije)</span></td><td><input type="text" name="lokacija" class="form-field-karakteristike2" placeholder="Ulica 12, 10000 Zagreb"></td></tr>

<tr><td>Postavi glavnu sliku</td><td><input type="file" name="file1" id="file1"></td></tr>
<tr><td>Postavi dodatne slike</td><td><input type="file" name="file2" id="file2"></td></tr>
<tr><td>(maksimalno 5 slika,</td><td><input type="file" name="file3" id="file3"></td></tr>
<tr><td>maksimalna veličina slike 0.5MB,</td><td><input type="file" name="file4" id="file4"></td></tr>
<tr><td>podržani formati gif, jpeg, jpg, png)</td><td><input type="file" name="file5" id="file5"></td></tr>

<tr><td></td><td><input class="btn btn-success" type="submit" value="Predaj oglas"></td></tr>
</table>
</form>
		<p>Polja označena sa (*) su obavezna.</p>
		
		
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
   
</body>
</html>