<?php

	session_start();
	require_once "connect.php";
	$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
?>

<!DOCTYPE HTML>
<html lang="pl">
<link rel='stylesheet' href='naglowek.css' type='text/css' />
<link rel='stylesheet' href='style.css' type='text/css' />
<link rel='stylesheet' href='input.css' type='text/css' />

<div id="header">
			<div id="logo">
				<h1>  Folklorystycznie</h1>
			</div>
					
			<div id="nav">
				<ul>
				<?php
				if(isset($_SESSION['zalogowany']))
				{
					echo "<li class='first active'> <a href='index.php'>Strona główna</a> </li>";
					echo "<li> <a href='wylogowywanie.php'>Wyloguj sie</a> </li>";
					echo "<li class='last'> <a href='index.php'>Koszyk</a> </li>";
				}
				else{
					echo "<li class='first active'> <a href='index.php'>Strona główna</a> </li>";
					echo "<li> <a href='rejestracja.php'>Zarejestruj sie</a> </li>";
					echo "<li class='last'> <a href='logowanie.php'>Zaloguj sie</a> </li>";
				}
				?>
				</ul>
			</div>
</div>		
<?php
	require_once('menu_lewe.php'); 
?>

<div id="content">

		<form action="zaloguj.php" method="post">
		<div id="con">
		Login: <br /> <input type="text" name="login" /> <br />
		Hasło: <br /> <input type="password" name="haslo" /> <br />
		<input type="submit" name="zaloguj" value="zaloguj" />
		</div>
		</form>	
		
</div>


	