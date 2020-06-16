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
		$login = $_POST['login'];
		$haslo = $_POST['haslo'];
	
		if ($rezultat = @$polaczenie->query("SELECT * FROM klienci WHERE nazwa='$login' AND haslo='$haslo'"))
		{
			$ilu_userow = $rezultat->num_rows;
			if($ilu_userow>0)
			{
				$_SESSION['zalogowany'] = true;
				$user_data=$rezultat->fetch_assoc();
				
				$_SESSION['login']=$user_data['nazwa'];
				$_SESSION['imie']=$user_data['imie'];
				$_SESSION['nazwisko']=$user_data['nazwisko'];
				
				$rezultat->free_result();
				header('Location: index.php');
			
			} else {
				
				header('Location: logowanie.php');
				
			}
			
		}
		$polaczenie->close();
	}
	
?>