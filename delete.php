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


if(isset($_GET['delete']))
	{
	$link1=$_GET['delete'];
	$sqldeleteslike="DELETE FROM slike WHERE link='" . $link1 . "'";
	    //$query = 'DELETE FROM my_table WHERE item_id = '.(int)$_GET['delete'];
	    
		mysql_query("SET CHARACTER SET utf8");

$sqldeleteslikeresult=mysql_query($sqldeleteslike);

	}
		
ob_end_flush();

?>
		
		
