<?php
session_start();
	if(isset($_SESSION['login']))
		{
require('conn.php');
$konto =  ($_SESSION['login']);
$zap="SELECT user_rang FROM users WHERE login='$konto'";
$rang=mysql_query($zap) or die("Wyst±pi³ b³±d");
$rang1 = mysql_fetch_assoc($rang);

	if($rang1['user_rang'] == 1)
	{
	$tytul=($_POST['tytul']);
	$opis=($_POST['tresc']);
	$otwarcie=($_POST['otwarcie']);
	$zamkniecie=($_POST['zamkniecie']);
	$wejscia=($_POST['wejscia']);
	$wyjscia=($_POST['wyjscia']);
$zapytanie = "INSERT INTO zadania(tytul,opis,data_otwarcia,data_zamkniecia,wejscia,wyjscia) VALUES ('$tytul' ,'$opis','$otwarcie','$zamkniecie','$wejscia','$wyjscia')";
mysql_query($zapytanie) or die("Wyst±pi³ b³±d" );
echo('Zadanie zostalo dodane');
	  echo '<META HTTP-EQUIV="Refresh" CONTENT="1;dodaj_zadanie.php">';


}
else
echo 'nie masz uprawnien administratora';
}
else
{echo 'Zaloguj sie!!!<br />';
				echo '<META HTTP-EQUIV="Refresh" CONTENT="2;logowanie.php">';}

?>


	
	