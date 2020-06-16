<?php
	session_start();
?>
	<!DOCTYPE HTML>
<html lang="pl">
<link rel='stylesheet' href='footerstylesheet.css' type='text/css' />
<link rel='stylesheet' href='style.css' type='text/css' />
<link rel='stylesheet' href='naglowek.css' type='text/css' />
<link rel='stylesheet' href='koszyk.css' type='text/css' />

<?php
	require_once('naglowek.php'); 
?>			
<?php
	require_once('menu_lewe.php'); 
?>
<?php
	require_once "connect.php";
	$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
	
	
	if ($polaczenie->connect_errno!=0)
	{
		echo "Error: ".$polaczenie->connect_errno;
	}
	else
	{
		
		echo '<div id="produkty">';
		echo "<div id='podsumowanie'>";
				 echo "<h5>Dziękujemy za zamówienie.<br> Zrealizujemy je jak najszybciej i wyślemy do Ciebie! :) </h5>";
				echo "<h5><img id='zdj' src=images/obraz.jpg height='250' width='350'></h5>";
		echo '</div>';
		echo '</div>';
	}
?>