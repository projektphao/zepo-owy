<?php
session_start();
	if(isset($_SESSION['login']))
		{
require('conn.php');
$zap="SELECT * FROM zadania";
$wynik=mysql_query($zap) or die("wystapil blad" );
$ile=mysql_num_rows($wynik);	
?>
<html>
<head>
<title> moje zadania</title>
</head>
<body>

<?php
				echo 'Jestes zalogowany jako: '.$_SESSION['login'].'';
				echo '<h3><a href="logout.php">Wyloguj</a><br /></h3>';
				?>

<br>
<a href="zmiana.php">Zmiana hasla</a>
<br>

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
<?}
?>
</body>
</html>