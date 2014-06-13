<?xml version="1.0" encoding="UTF-8" ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="hr" lang="hr" dir="ltr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width">
    <title>Izmjena profila - Vacator</title>
<link href="stil.css" rel="stylesheet" type="text/css" />
<link href="grid.css" rel="stylesheet" type="text/css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script>

<!--Twitter bootstrap-->
<link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />




</head>
<body>
<?php

		//ako user nije logiran prebacuje na prijava.php, ne moze izmijenit oglas
		session_start();
		if (!isset($_SESSION['korisnickoime'])){
		header("Location: prijava.php");
		die();
		}
		if (empty($_SESSION['korisnickoime'])){
		header("Location: prijava.php");
		}	

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
			  <?php 
			 
		//ako je user logiran ispisuje njegovo ime i gumb za odjavu
		if (isset($_SESSION['korisnickoime'])){
		if (!empty($_SESSION['korisnickoime'])){
		echo 'Bok, <a href="profil.php?user='.$_SESSION['korisnickoime'].'">'.$_SESSION['korisnickoime'].'</a>';
		echo '<a href="odjava.php"><img src="images/logout.png" style="margin-left: 10px;"></a>';
		
		
		//MySQL injection
	
		if(isset($_POST['broj'])){
$broj=$_POST['broj']; 
}
if(isset($_POST['email'])){
$email=$_POST['email']; 
}
if(isset($_POST['ime'])){
$ime=$_POST['ime']; 
}
if(isset($_POST['prezime'])){
$prezime=$_POST['prezime']; 
}

$broj = stripslashes($broj);
$broj = mysql_real_escape_string($broj);
$email = stripslashes($email);
$email = mysql_real_escape_string($email);
$ime = stripslashes($ime);
$ime = mysql_real_escape_string($ime);
$prezime = stripslashes($prezime);
$prezime = mysql_real_escape_string($prezime);
		}
		}
		?> 
            </div>
</div>
		
        <div class="content">
		<div class="row">
		
		<div class="column column-8">
		
		<h3>Izmjena podataka profila</h3>
<form action="izmjena-profila-provjera.php" method="post" accept-charset="utf-8" id="forma-izrada-oglasa" enctype="multipart/form-data"> 
<table>
<tr><td>Ime: *</td> <td><input type="text" name="ime" value="<?php echo $ime;?>" class="form-field-karakteristike" required="required"></td></tr>
<tr><td>Prezime: *</td> <td><input type="text" name="prezime" value="<?php echo $prezime;?>" class="form-field-karakteristike" required="required"></td></tr>
<tr><td>Email: *</td> <td><input type="email" name="email" value="<?php echo $email;?>" class="form-field-karakteristike" required="required"></td></tr>
  
<tr><td>Dodatan broj mobitela/telefona: </td> <td>

<!--Razdvajanje broja telefona iz baze-->
<?php 
list($predbroj, $broj1) = split(' ', $broj);
?>
<select name="predbroj" style="width: 75px;" required="required">
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
  <input type="number" required="required" value="<?php echo $broj1;?>" name="broj1" style="margin-left: 10px; width: 120px;">
</td></tr>
<tr><td></td><td><input class="btn btn-success" type="submit" value="Izmijeni profil"></td></tr>
</table>
</form>
		
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