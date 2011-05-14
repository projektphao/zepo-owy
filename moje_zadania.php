<?php

$page_title = 'Zadania';
include('./naglowek.inc');

session_start();

if(isset($_SESSION['login'])) {
    require('conn.php');
    $konto=($_SESSION['login']);
    $zap="SELECT grupa FROM users WHERE login='$konto'";
    $wynik=mysql_query($zap) or die("Wystapi³ b³±d!");
    $wynik = mysql_fetch_assoc($wynik);
    $grupa=$wynik['grupa'];
    $zap="SELECT zadania.ID, zadania.tytul, zadania.opis, zadania.data_otwarcia, zadania.data_zamkniecia, zadania.grupa, rozwiazania.ocena, rozwiazania.koment FROM zadania LEFT JOIN rozwiazania ON zadania.ID=rozwiazania.ID_zad WHERE zadania.grupa='$grupa'";
    $wynik=mysql_query($zap) or die("wystapil blad" );
    $ile=mysql_num_rows($wynik);
    echo 'Jeste¶ zalogowany jako: '.$_SESSION['login'].'';
    echo '<h3><a href="logout.php">Wyloguj</a><br /></h3>';
    echo '<br /><a href="logowanie.php">Panel u¿ytkownika</a><br />';
    $godz=($_SERVER['REQUEST_TIME']);
    echo 'Aktualny czas: ';
    print date('Y-m-d H:i:s', $godz);
?>

<script type="text/javascript" src="java/mojezadania.js"></script>
<table width="800" border="0" cellspacing="1" cellpadding="0">
<tr>
<td><form id="zad" action="rozwiazanie.php?source=moje_zadania.php" method="post" onsubmit="return zad()">
<table width="800" border="0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<td bgcolor="#FFFFFF">&nbsp;</td>
<td colspan="10" bgcolor="#FFFFFF" align="center"><strong>DANE</strong> </td>
</tr>
<tr>
<td align="center" bgcolor="#FFFFFF"></td>
<td align="center" bgcolor="#FFFFFF"><strong>Tytu³</strong></td>
<td align="center" bgcolor="#FFFFFF"><strong>Tre¶æ</strong></td>
<td align="center" bgcolor="#FFFFFF"><strong>Data otwarcia</strong></td>
<td align="center" bgcolor="#FFFFFF"><strong>Data zamkniêcia</strong></td>
<td align="center" bgcolor="#FFFFFF"><strong>Wej¶cia</strong></td>
<td align="center" bgcolor="#FFFFFF"><strong>Wyj¶cia</strong></td>
<td align="center" bgcolor="#FFFFFF"><strong>Grupa</strong></td>
<td align="center" bgcolor="#FFFFFF"><strong>Ocena</strong></td>
<td align="center" bgcolor="#FFFFFF"><strong>Komentarz do oceny</strong></td>
</tr>
<?php		
if($grupa != 0)
{
while ($rows = mysql_fetch_assoc($wynik)) {
if ($godz >= strtotime($rows['data_otwarcia'])) {
?>
<tr>
<td align="center" bgcolor="#FFFFFF"><input name="checkbox" type="checkbox" id="checkbox" value="<?php echo $rows['ID']; ?>"></td>
<td bgcolor="#FFFFFF" align="center"><?php echo $rows['tytul']; ?></td>
<td bgcolor="#FFFFFF" align="center"><?php echo $rows['opis']; ?></td>
<td bgcolor="#FFFFFF" align="center"><?php echo $rows['data_otwarcia']; ?></td>
<td bgcolor="#FFFFFF" align="center"><?php echo $rows['data_zamkniecia']; ?></td>
<td bgcolor="#FFFFFF" align="center"><?php echo $rows['wejscia']; ?></td>
<td bgcolor="#FFFFFF" align="center"><?php echo $rows['wyjscia']; ?></td>
<td bgcolor="#FFFFFF" align="center"><?php echo $rows['grupa']; ?></td>
<td bgcolor="#FFFFFF" align="center"><?php echo $rows['ocena']; ?></td>
<td bgcolor="#FFFFFF" align="center"><?php echo $rows['koment']; ?></td>
</tr>

<?php
}
else echo '<tr><td>zadanie jeszcze nie jest otwarte</td></tr>';
}
}
?>
<tr>
<td colspan="10" align="left" bgcolor="#FFFFFF">
<input name="rozw" type="submit" id="rozw" value="Rozwiaz zadanie" ></td>
</tr>
</table>
</form>
</table>

<?php
}

include('./stopka.inc');
?>