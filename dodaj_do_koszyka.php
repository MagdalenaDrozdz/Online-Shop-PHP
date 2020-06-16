<?php

	session_start();
	require_once "connect.php";
	$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
	
	
	if ($polaczenie->connect_errno!=0)
	{
		echo "Error: ".$polaczenie->connect_errno;
	}
	else
	{
		$nazwa=$_GET['produkt'];
		$login=$_SESSION['login'];
		
		
		$sql="SELECT id_koszyka FROM koszyki WHERE id_klienta=(SELECT id_klienta FROM klienci WHERE nazwa='$login')";
		$wynik = @$polaczenie->query($sql);
		$user_data=$wynik->fetch_assoc();
		$id_koszyka=$user_data['id_koszyka'];
		
		$sql="INSERT INTO `produkty_w_koszyku`(`id`, `id_produktu`, `id_koszyka`) VALUES (0,(SELECT id_produktu FROM produkty WHERE nazwa='$nazwa'),'$id_koszyka') ";
		$wynik = @$polaczenie->query($sql);
		
		$_SESSION['id_koszyka']=$id_koszyka;
		//echo "id_koszyka: $id_koszyka";
		header('Location: koszyk.php');
		
	}
?>