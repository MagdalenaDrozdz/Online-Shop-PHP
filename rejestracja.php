<!DOCTYPE HTML>
<html lang="pl">
<link rel='stylesheet' href='style.css' type='text/css' />
<link rel='stylesheet' href='naglowek.css' type='text/css' />
<link rel='stylesheet' href='menu_lewe.css' type='text/css' />
<link rel='stylesheet' href='input.css' type='text/css' />
<?php
	require_once('naglowek.php'); 
?>	
<?php
	require_once('menu_lewe.php'); 
?>
<div id="content">

		<form action="zarejestruj.php" method="post">
	
		<div id="con">
		*Login: <br /> <input type="text" name="login" /> <br />
		*Hasło: <br /> <input type="password" name="haslo" /> <br />
		*Imię: <br /> <input type="text" name="imie" /> <br />
		*Nazwisko: <br /> <input type="text"  name="nazwisko" /> <br />
		*Poczta: <br /> <input type="text" name="miasto" /> <br />
		*Kod: <br /> <input type="text"  name="kod" /> <br />
		Ulica: <br /> <input type="text" name="ulica" /> <br />
		*Numer bloku/domu: <br /> <input type="text"  name="nr" /> <br />
		Numer mieszkania: <br /> <input type="text"  name="nr2" /> <br />
		*Telefon: <br /> <input type="text"  name="telefon" /> <br /><br />
		Pola z gwiazdką należy obowiązkowa wypełnić.<br /><br />
		<input type="submit" value="rejestruj" />
		</div>
		
		</form>	
		
</div>

	