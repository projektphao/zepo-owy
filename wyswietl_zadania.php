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
$zap="SELECT * FROM zadania";
$wynik=mysql_query($zap) or die("wystapil blad" );
$ile=mysql_num_rows($wynik);	

?>
<html>
<head>
<title>dostepne zadania</title>
</head>
<body>

<?php
				echo 'Jestes zalogowany jako: '.$_SESSION['login'].'';
				echo '<h3><a href="logout.php">Wyloguj</a><br /></h3>';
				?>
<br>
<a href="dodaj_zadanie.php">Dodaj zadanie</a>
<br>
<a href="panel.php">Panel admina</a>

<table width="800" border="0" cellspacing="1" cellpadding="0">
<tr>
<td><form action="dzialania.php" method="post">
<table width="800" border="0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<td bgcolor="#FFFFFF">&nbsp;</td>
<td colspan="8" bgcolor="#FFFFFF" align="center"><strong>Dane:</strong> </td>
</tr>
<tr>
<td align="center" bgcolor="#FFFFFF"></td>
<td align="center" bgcolor="#FFFFFF"><strong>Tytul</strong></td>
<td align="center" bgcolor="#FFFFFF"><strong>Tresc</strong></td>
<td align="center" bgcolor="#FFFFFF"><strong>Data otwarcia</strong></td>
<td align="center" bgcolor="#FFFFFF"><strong>Data zamkniecia</strong></td>
<td align="center" bgcolor="#FFFFFF"><strong>Wejscia</strong></td>
<td align="center" bgcolor="#FFFFFF"><strong>Wyjscia</strong></td>
<td align="center" bgcolor="#FFFFFF"><strong>Grupa</strong></td>
</tr>		

<?php
while ($rows = mysql_fetch_assoc($wynik))
				{
?>
<tr>
<td align="center" bgcolor="#FFFFFF"><input name="checkbox" type="checkbox" id="checkbox[]" value="<?php echo $rows['tytul']; ?>"></td>
<td bgcolor="#FFFFFF" align="center"><?php echo $rows['tytul']; ?></td>
<td bgcolor="#FFFFFF" align="center"><?php echo $rows['opis']; ?></td>
<td bgcolor="#FFFFFF" align="center"><?php echo $rows['data_otwarcia']; ?></td>
<td bgcolor="#FFFFFF" align="center"><?php echo $rows['data_zamkniecia']; ?></td>
<td bgcolor="#FFFFFF" align="center"><?php echo $rows['wejscia']; ?></td>
<td bgcolor="#FFFFFF" align="center"><?php echo $rows['wyjscia']; ?></td>
<td bgcolor="#FFFFFF" align="center"><?php echo $rows['grupa']; ?></td>
</tr>
<?}?>
<tr>
<td colspan="8" align="left" bgcolor="#FFFFFF">
<input name="delete" type="submit" id="delete" value="Usuñ zadanie"></td>
</tr>
<tr>
<td colspan="8" align="left" bgcolor="#FFFFFF">
Wpisz numer grupy:
<input name="grupa" type="text" value="" />
<input name="grupa1" type="submit" id="grupa1" value="Przydziel zadanie do grupy"></td>
</tr>
</table>
</form>
<?php
}
else
echo 'nie masz uprawnien administratora';
}
else
{echo 'Zaloguj sie!!!<br />';
				echo '<META HTTP-EQUIV="Refresh" CONTENT="2;logowanie.php">';}

?>
</body>
</html>



