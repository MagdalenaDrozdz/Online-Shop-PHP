<?php

	session_start();
?>
	<!DOCTYPE HTML>
<html lang="pl">
<link rel='stylesheet' href='style.css' type='text/css' />
<link rel='stylesheet' href='naglowek.css' type='text/css' />
<link rel='stylesheet' href='koszyk.css' type='text/css' />
<link rel='stylesheet' href='input.css' type='text/css' />
<link rel='stylesheet' href='adres_zam.css' type='text/css' />
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
		$suma= filter_input(INPUT_POST, 'suma', FILTER_VALIDATE_INT);
		$login=$_SESSION['login'];
		

		$sql="SELECT id_koszyka FROM `koszyki` WHERE id_klienta=(SELECT id_klienta FROM klienci WHERE nazwa='$login' )";
		$wynik = @$polaczenie->query($sql);
		$user_data=$wynik->fetch_assoc();
		$id_koszyka=intval($user_data["id_koszyka"]);
		
		
		$sql="INSERT INTO `zamowienia`(`id_zamowienia`, `id_koszyka`, `suma`, `czy_oplacone`, `status`) VALUES (0, $id_koszyka, $suma,'nie','do_zamowienia')";
		$wynik = @$polaczenie->query($sql);
		
		$sql="SELECT * FROM `adresy` WHERE id_klienta=(SELECT id_klienta FROM klienci WHERE nazwa='$login') ";
		$wynik = @$polaczenie->query($sql);
		
		while($user_data=$wynik->fetch_assoc())
		{
			echo '<div id="produkty">';
			echo "<div id='podsumowanie2'>";
		
			echo "<h6>".$user_data['kod'].", ".$user_data['miasto']." </h6>";
			echo "<h6>".$user_data['ulica'].", ".$user_data['numer'].", ".$user_data['nr_mieszkania']." </h6>";
			
			echo '<form method="get" action="zamow_2.php">';
			echo '<h6><input name="zamow" type="submit" value="Zamów na ten adres" ></h6>';
			echo '</form>';
				
			echo '</div>';
			echo '</div>';
		}
		
		echo '<div id="produkty">';
		echo "<div id='con'>";
		
		echo '<form action="dodaj_adres.php" method="post">';
		echo '*Poczta:  <br /><input type="text" name="miasto" /> <br />';
		echo '*Kod:<br /> <input type="text"  name="kod" /> <br />';
		echo 'Ulica: <br /> <input type="text" name="ulica" /> <br />';
		echo '*Numer bloku/domu:<br /> <input type="text"  name="nr" /> <br />';
		echo 'Numer mieszkania:  <br /><input type="text"  name="nr2" /> <br />';
		echo '<input type="submit" value="Dodaj" />';
		echo '</form>';
		echo '</div>';
		echo '</div>';
	}
?>