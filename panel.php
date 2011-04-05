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



?>
<html>
<head>
<title>panel admina</title>
</head>
<body>




<?php
				echo 'Jestes zalogowany jako: '.$_SESSION['login'].'';
				echo '<h3><a href="logout.php">Wyloguj</a><br /></h3>';
				?>
<br>
<a href="dodaj_zadanie.php">Dodaj zadanie</a>
<br>
<a href="wyswietl_zadania.php">Przejrzyj zadania</a>
<br>
<a href="dodaj_grupe.php">Dodaj grupe</a>
<br>
<a href="uzytkownicy.php">Uzytkownicy</a>

<?php
}
else
echo 'nie masz uprawnien do panelu administratora';
}
else
{echo 'Zaloguj sie!!!<br />';
				echo '<META HTTP-EQUIV="Refresh" CONTENT="2;logowanie.php">';}

?>
</body>
</html>
