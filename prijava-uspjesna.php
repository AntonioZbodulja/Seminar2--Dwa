<?php
// Check if session is not registered, redirect back to main page. 
// Put this code in first line of web page. 
session_start();
if (!isset($_SESSION['korisnickoime'])){
header("location:prijava.php");
}
?>

<html>
<head>
<meta http-equiv="refresh" content="0; url=index.php" />
</head>
<body>
Uspješno ste prijavljeni
</body>
</html>