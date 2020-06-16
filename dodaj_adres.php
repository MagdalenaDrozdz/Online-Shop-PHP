<?php

	session_start();
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
		$login = $_SESSION['login'];
		$miasto = $_POST['miasto'];
		$kod = $_POST['kod'];
		$ulica = $_POST['ulica'];
		$nr = intval($_POST['nr']);
		$nr2 = intval($_POST['nr2']);
		
		if($miasto==NULL || $kod==NULL)
		{ 
			header('Location: index.php');
		}
		else{
			$sql = "INSERT INTO `adresy`(`id_klienta`, `miasto`, `kod`, `ulica`, `numer`,`nr_mieszkania`, `przesyłkowy`) VALUES ((SELECT id_klienta FROM klienci WHERE nazwa='$login'), '$miasto', '$kod', '$ulica',  '$nr', '$nr2','tak')";
			$wynik = @$polaczenie->query($sql);
			//echo " $miasto, $kod, $ulica, $nr, $nr2 ";
			header('Location: zamow.php');
		}
		
		
	}
?>		