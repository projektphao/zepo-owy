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
<title>dodawanie zadan</title>
</head>
<body>

<?php
				echo 'Jestes zalogowany jako: '.$_SESSION['login'].'';
				echo '<h3><a href="logout.php">Wyloguj</a><br /></h3>';
				?>
<a href="panel.php">Panel admina</a>

<form  action="dodaj_zadanie1.php" method="post">
<table>

<td><strong>Tytul:</strong></td><td><input name="tytul" type="text" value="" /></td><tr>

<td><strong>Tresc zadania:</strong></td><td><textarea name="tresc" cols="50" rows="10" /></textarea></td></tr>

<td><strong>Data otwarcia:</strong></td><td><input name="otwarcie" type="text" value="" /></td></tr>

<td><strong>Data zamkniecia:</strong></td><td><input name="zamkniecie" type="text" value="" /></td></tr>

<td><strong>Wejscia:</strong></td><td><input name="wejscia" type="text" value="" /></td></tr>

<td><strong>Wyjscia:</strong></td><td><input name="wyjscia" type="text" value="" /></td></tr>


</table>


<input type="submit" value="Dodaj" />

</form>



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



