<?php
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
?>