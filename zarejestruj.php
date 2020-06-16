<?php

	require_once "connect.php";
	$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
	
	if ($polaczenie->connect_errno!=0)
	{
		echo "Error: ".$polaczenie->connect_errno;
	}
	else
	{
		$login = $_POST['login'];
		$haslo = $_POST['haslo'];
		$imie = $_POST['imie'];
		$nazwisko = $_POST['nazwisko'];
		$miasto = $_POST['miasto'];
		$kod = $_POST['kod'];
		$ulica = $_POST['ulica'];
		$nr = $_POST['nr'];
		$nr2 = $_POST['nr2'];
		$telefon = $_POST['telefon'];
		#$hashPassword = password_hash($haslo,PASSWORD_BCRYPT);

		
		
		if($login==NULL || $haslo==NULL ||  $imie==NULL || $nazwisko==NULL || $miasto==NULL || $kod==NULL || $nr ==NULL || $telefon ==NULL)
		{ 
			header('Location: rejestracja.php');
		}
		else{
			$sql = "INSERT INTO `klienci`(`id_klienta`, `imie`, `nazwisko`, `nazwa`, `haslo`) VALUES (0,'$imie', '$nazwisko','$login','$haslo')";
			$wynik = @$polaczenie->query($sql);
			
			
			$sql = "INSERT INTO `adresy`(`id_klienta`, `miasto`, `kod`, `ulica`, `numer`,`nr_mieszkania`) VALUES ((SELECT id_klienta FROM klienci WHERE klienci.nazwa='$login'), '$miasto', '$kod', '$ulica',  '$nr', '$nr2')";
			$wynik = @$polaczenie->query($sql);
			
			$sql = "INSERT INTO `kontakty`(`id_klienta`,`telefon`) VALUES ((SELECT id_klienta FROM klienci WHERE klienci.nazwa='$login'), '$telefon')";
			$wynik = @$polaczenie->query($sql);
			
			$sql="INSERT INTO `koszyki`(`id_koszyka`, `id_klienta`) VALUES (0,(SELECT id_klienta FROM klienci WHERE nazwa='$login'))";
			$wynik = @$polaczenie->query($sql);
			
			
			
			header('Location: po_zarejestrowaniu.php');
		}
		
		
	}
?>		