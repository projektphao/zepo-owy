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
	$nr=($_POST['numer']);
$zap="SELECT ID FROM grupy WHERE nr ='$nr'";
$wynik=mysql_query($zap) or die("Wyst±pi³ b³±d");
 $wynik = mysql_num_rows($wynik);
 if ($wynik==0)   {
$zapytanie = "INSERT INTO grupy(nr) VALUES ('$nr')";
mysql_query($zapytanie) or die("Wyst±pi³ b³±d" );
echo('Grupa zostala dodana');
	  echo '<META HTTP-EQUIV="Refresh" CONTENT="1;dodaj_grupe.php">';
}
else {
echo ('Podana grupa juz istnieje!');
echo '<META HTTP-EQUIV="Refresh" CONTENT="1;dodaj_grupe.php">';
}


}
else
echo 'nie masz uprawnien administratora';
}
else
{echo 'Zaloguj sie!!!<br />';
				echo '<META HTTP-EQUIV="Refresh" CONTENT="2;logowanie.php">';}

?>