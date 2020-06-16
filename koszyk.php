<?php

	session_start();
?>
	<!DOCTYPE HTML>
<html lang="pl">
<link rel='stylesheet' href='footerstylesheet.css' type='text/css' />
<link rel='stylesheet' href='style.css' type='text/css' />
<link rel='stylesheet' href='naglowek.css' type='text/css' />
<link rel='stylesheet' href='koszyk.css' type='text/css' />
<link rel='stylesheet' href='input.css' type='text/css' />


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
		
		$suma=0;
		$id_koszyka=$_SESSION['id_koszyka'];
		$nazwa=$_SESSION['login'];
		
		
		$sql="INSERT INTO `produkty_w_koszyku`(`id`, `id_produktu`, `id_koszyka`) VALUES (0,(SELECT id_produktu FROM produkty WHERE nazwa='$nazwa'),'$id_koszyka') ";
		$wynik = @$polaczenie->query($sql);
		
		$sql="SELECT id_produktu FROM produkty_w_koszyku WHERE id_koszyka='$id_koszyka'";
		$wynik = @$polaczenie->query($sql);
		while($row = $wynik->fetch_assoc())
		{
			$id= $row['id_produktu'];
			$sql2="SELECT nazwa,cena,zdjecie,id_kategorii FROM produkty WHERE id_produktu='$id'";
			$wynik2 = @$polaczenie->query($sql2);
			
			
			
			while($row2 = $wynik2->fetch_assoc())
			{
				echo '<div id="produkty">';
				echo "<div id='produkt1'>";
				echo "<h4>".$row2['nazwa']." </h4>";
				echo '</div>';
				
				echo "<div id='produkt2'>";
				
				$id_kategorii=$row2['id_kategorii'];
				$sql3="SELECT nazwa FROM kategorie WHERE id_kategorii='$id_kategorii'";
				$wynik3 = @$polaczenie->query($sql3);
				$kat =  $wynik3->fetch_assoc();
				//echo $kat['nazwa'];
			
				echo "<h4>'<img id='zdj' src=".$kat['nazwa']."/".$row2['zdjecie']." height='150' width='140'></h4>" ;
				echo '</div>';
				
				echo "<div id='produkt3'>";
				echo "<h4>".$row2['cena']." .00 zł</h4>";
				$suma=$suma+$row2['cena'];
				echo '</div>';
				
				echo '</div>';
			}
		}
		
		echo '<div id="produkty">';
				echo "<div id='podsumowanie'>";
				echo "<h5> To twoje produkty wrzucone do koszyka. <br>Mozesz złożyć zamówienie. <br>	Łączna suma to: $suma.00 zł</h5>";
				
				echo '<form method="POST" action="zamow.php">';
					echo '<input type="hidden" name="suma" value="'.$suma.'" >';
					echo '<h5><input name="koszyk" type="submit" value="Złóż zamówienie!" ></h5>';
					echo '</form>';
					
				echo '</div>';
				
		echo '</div>';

	}
?>