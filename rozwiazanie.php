<?php

$page_title = 'Zadania';
include('./naglowek.inc');

session_start();

if ($_GET['source'] == 'moje_zadania.php') {

if(isset($_SESSION['login'])) {
    require('conn.php');
    $konto=($_SESSION['login']);
    $id=($_POST['checkbox']);
$zap="SELECT * FROM zadania WHERE ID='$id';";
$wynik=mysql_query($zap) or die("Wystapi³ b³±d!");
$rows = mysql_fetch_assoc($wynik);
 $godz=($_SERVER['REQUEST_TIME']);
    echo 'Aktualny czas: ';
    print date('Y-m-d H:i:s', $godz);   
?>
<table width="800" border="0" cellspacing="1" cellpadding="0">
<tr>
<td>
<table width="800" border="0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<td bgcolor="#FFFFFF">&nbsp;</td>
<td colspan="8" bgcolor="#FFFFFF" align="center"><strong>ZADANIE</strong> </td>
</tr>
<tr>
<td align="center" bgcolor="#FFFFFF"><strong>Tytu³</strong></td>
<td align="center" bgcolor="#FFFFFF"><strong>Tre¶æ</strong></td>
<td align="center" bgcolor="#FFFFFF"><strong>Data otwarcia</strong></td>
<td align="center" bgcolor="#FFFFFF"><strong>Data zamkniêcia</strong></td>
<td align="center" bgcolor="#FFFFFF"><strong>Wej¶cia</strong></td>
<td align="center" bgcolor="#FFFFFF"><strong>Wyj¶cia</strong></td>
<td align="center" bgcolor="#FFFFFF"><strong>Grupa</strong></td>
</tr>
<?php		
?>
<tr>
<td bgcolor="#FFFFFF" align="center"><?php echo $rows['tytul']; ?></td>
<td bgcolor="#FFFFFF" align="center"><?php echo $rows['opis']; ?></td>
<td bgcolor="#FFFFFF" align="center"><?php echo $rows['data_otwarcia']; ?></td>
<td bgcolor="#FFFFFF" align="center"><?php echo $rows['data_zamkniecia']; ?></td>
<td bgcolor="#FFFFFF" align="center"><?php echo $rows['wejscia']; ?></td>
<td bgcolor="#FFFFFF" align="center"><?php echo $rows['wyjscia']; ?></td>
<td bgcolor="#FFFFFF" align="center"><?php echo $rows['grupa']; ?></td>
</tr>


</table>
</form>
</table>
<br><br>
<?php
if ($godz < strtotime($rows['data_zamkniecia'])) {
$zap="SELECT rozw FROM rozwiazania WHERE ID_zad='$rows[ID]' AND login='$konto';";
    $wynik=mysql_query($zap) or die("wystapil blad");
    $wynik = mysql_fetch_assoc($wynik);

?>
<form  action="rozwiazanie1.php" method="post">
<table>
<td><strong>Rozwiazanie zadania:</strong></td><td><textarea name="rozwiazanie" cols="100" rows="30"><?php echo $wynik['rozw']; ?></textarea></td><tr>
<td><strong></strong></td><td><input name="id_zad" type="hidden" value="<?php echo $rows['ID']; ?>" /></td><tr>
<td><strong></strong></td><td><input name="data_zamkniecia" type="hidden" value="<?php echo $rows['data_zamkniecia']; ?>" /></td><tr>

</table>
<input type="submit" value="Wyslij" />
</form>
<?php
}
else { echo 'zadanie jest juz zamkniete';
$zap="SELECT rozw FROM rozwiazania WHERE ID_zad='$rows[ID]' AND login='$konto';";
    $wynik=mysql_query($zap) or die("wystapil blad");
    $wynik = mysql_fetch_assoc($wynik);
?>
<table>
<td><strong>Rozwiazanie zadania:</strong></td><td><textarea name="rozwiazanie" cols="100" rows="30" readonly="readonly"><?php echo $wynik['rozw']; ?></textarea></td><tr>
</table>
<?php
}
}
} else { // Strona ¼ród³owa nieokre¶lona
    echo 'Dostêp w nieprawid³owy sposób!<br />';
    echo '<META HTTP-EQUIV="Refresh" CONTENT="2;moje_zadania.php">';
}

include('./stopka.inc');
?>
    