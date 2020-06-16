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
		echo '<div id="produkty">';
		echo "<div id='podsumowanie'>";
				echo "<h5> Wybierz formę płatności: </h5>";
				
				echo"<form method='post' action='done.php' >";
				
				echo "<select name='platnosc' >";
				  echo "<option value='odbior'>Przy odbiorze</option>";
				  echo "<option value='przelew'>Przelew na konto </option>";
				  echo "<option value='poczta'>Przelew pocztowy </option>";
				 echo "</select>";
				 
				 echo "<br><br><input type='submit'  value='Złóż zamówienie!'>";
				echo "</form>";
		echo '</div>';
		echo '</div>';
		
		$login=$_SESSION['login'];
		$id_koszyka=$_SESSION['id_koszyka'];
		
		$sql="UPDATE `zamowienia` SET `status`='zamówione' WHERE id_koszyka='$id_koszyka'";
		$wynik = @$polaczenie->query($sql);
		
		$sql="DELETE FROM `produkty_w_koszyku` WHERE id_koszyka='$id_koszyka'";
		$wynik = @$polaczenie->query($sql);
	}
?>