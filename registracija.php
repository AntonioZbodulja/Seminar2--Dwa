<?xml version="1.0" encoding="UTF-8" ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="hr" lang="hr" dir="ltr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width">
    <title>Registracija - Vacator</title>
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
	 <a href="prijava.php">Prijava</a> <a href="#">Predaj oglas</a>
            </div>
</div>
			
        <div class="content">
		
		<div class="column column-8">
		
		<h3>Registracija</h3>
<form action="izrada-profila.php" method="post" accept-charset="utf-8"> 
<table>
<tr><td>Ime:</td> <td><input type="text" name="ime" required="required" maxlength="80"></td></tr>
<tr><td>Prezime:</td> <td><input type="text" name="prezime" required="required" maxlength="80"></td></tr>
<tr><td>Korisničko ime:</td> <td><input pattern=".{4,50}" required title="4 do 50 znakova" name="korisnickoime" placeholder="min 4 znaka" style="display: inline-block; height: 20px; padding: 4px 6px; margin-bottom: 10px; font-size: 14px; line-height: 20px; color: #555555; vertical-align: middle; -webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px; border: 1px solid #cccccc;"></td></tr>
<tr><td>Email:</td> <td><input type="email" name="email" required="required" placeholder="korisnik@stranica.com"></td></tr>
<tr><td>Broj mobitela/telefona:</td> <td>
<select name="predbroj" required="required" style="width: 75px;">
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
  <input type="text" name="broj" required="required" style="margin-left: 10px; width: 120px;">
</select>
</td></tr>
<tr><td>Lozinka:</td> <td><input type="password" id="lozinka" name="lozinka" required="required" placeholder="min 6 znakova"></td></tr>
<tr><td>Potvrdi lozinku:</td> <td><input type="password" id="lozinka-potvrda" name="potvrdalozinke" required="required" placeholder="ponovite lozinku"></td></tr>
<tr><td></td><td><input class="btn btn-success" id="submit" type="submit" value="Registriraj se"></td></tr>
</table>
</form>
        <p>Potvrdom registracije prihvaćate uvjete korištenja.</p>
		<p>Imate profil? <a href="prijava.php">Prijavite se</a>.</p>
		
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