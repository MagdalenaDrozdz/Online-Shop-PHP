<!DOCTYPE HTML>
<html lang="pl">
<link rel='stylesheet' href='style.css' type='text/css' />
<link rel='stylesheet' href='naglowek.css' type='text/css' />


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
					echo "<li class='last'> <a href='koszyk.php'>Koszyk</a> </li>";
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