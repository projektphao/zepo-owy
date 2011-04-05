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

$zap="SELECT * FROM grupy";
$wynik=mysql_query($zap) or die("wystapil blad" );
$ile=mysql_num_rows($wynik);

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


<table width="800" border="0" cellspacing="1" cellpadding="0">
<tr>
<td><form action="dzialania1.php" method="post">
<table width="800" border="0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<td bgcolor="#FFFFFF">&nbsp;</td>
<td colspan="8" bgcolor="#FFFFFF" align="center"><strong>Dane:</strong> </td>
</tr>
<tr>
<td align="center" bgcolor="#FFFFFF"></td>
<td align="center" bgcolor="#FFFFFF"><strong>Numer grupy:</strong></td>

</tr>		

<?php
while ($rows = mysql_fetch_assoc($wynik))
				{
?>
<tr>
<td align="center" bgcolor="#FFFFFF"><input name="checkbox[]" type="checkbox" id="checkbox[]" value="<?php echo $rows['nr']; ?>"></td>
<td bgcolor="#FFFFFF" align="center"><?php echo $rows['nr']; ?></td>

</tr>
<?}?>
<tr>
<td colspan="8" align="left" bgcolor="#FFFFFF">
<input name="delete" type="submit" id="delete" value="Usuñ grupe"></td>
</tr>
</table>
</form>



<form  action="dodaj_grupe1.php" method="post">
<table>

<td><strong>Podaj numer grupy:</strong></td><td><input name="numer" type="text" value="" /></td><tr>



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
