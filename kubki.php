<?php
	session_start();
?>

<!DOCTYPE HTML>

<link rel='stylesheet' href='naglowek.css' type='text/css' />
<link rel='stylesheet' href='lista_produktow.css' type='text/css' />
<link rel='stylesheet' href='style.css' type='text/css' />
<link rel='stylesheet' href='input2.css' type='text/css' />


<?php
	require_once('naglowek.php'); 
?>			
<?php
	require_once('menu_lewe.php'); 
?>
<?php
	require_once "connect.php";
	$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
	
?>

<?php
	echo '<div id="content">';
	if ($wynik= @$polaczenie->query("SELECT * FROM produkty  WHERE id_kategorii=0"))
	{
		$ile_znalezionych = $wynik->num_rows;
		
		for ($i=0; $i <$ile_znalezionych; $i++){
				$wiersz = $wynik->fetch_assoc();
				
				echo '<div id="produkts">';
				echo '<div id="jeden">';
				
				echo "<h4>'<img id='zdj' src=kubki/".$wiersz['zdjecie']." height='250' width='240'></h4>" ;
				echo '</div>';

				echo '<div id="opis">';
				echo '<h4>'.$wiersz['nazwa'].'</h4>';
				echo '<h5>'.$wiersz['opis'].'</h5>';
				echo '</div>';
							
				echo '<div id="cena">';
				echo '<h6> Cena: '.$wiersz['cena'].'.00 zł';
				if(isset($_SESSION['zalogowany'])){
					echo '<form method="get" action="dodaj_do_koszyka.php">';
					echo '<input type="hidden" name="produkt" value="'.$wiersz['nazwa'].'" >';
					echo '<input name="koszyk" type="submit" value="Dodaj do koszyka" >';
					echo '</form>';
				}else{
					echo '<h7> <br><br>  Zaloguj sie aby <br> dodać do koszyka </h7> ';
				}
				echo '</div>';
				echo '</div>';

		}
	}
	else {
		header('Location: index.php');
	}
	echo '</div>'
?>