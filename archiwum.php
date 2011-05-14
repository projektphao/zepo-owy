<?php

$page_title = 'Archiwum rozwiazan';
include('./naglowek.inc');

session_start();

if(isset($_SESSION['login'])) {
    require('conn.php');
    $konto=($_SESSION['login']);
    $zap="SELECT user_rang FROM users WHERE login='$konto'";
    $rang=mysql_query($zap) or die("Wyst±pi³ b³±d");
    $rang1 = mysql_fetch_assoc($rang);
    
    if($rang1['user_rang'] == 1) {
        $zap="SELECT zadania.tytul, zadania.grupa, rozwiazania.login, rozwiazania.rozw, rozwiazania.ID, rozwiazania.ocena, rozwiazania.koment FROM zadania LEFT JOIN rozwiazania ON zadania.ID=rozwiazania.ID_zad where rozwiazania.ocena!=''";
        $wynik=mysql_query($zap) or die("wystapil blad");
        $ile=mysql_num_rows($wynik);
        echo 'Jestes zalogowany jako: '.$_SESSION['login'].'';
        echo '<h3><a href="logout.php">Wyloguj</a><br /></h3>';
?>
<br />
<a href="panel.php">Panel admina</a>
<script type="text/javascript" src="java/archiwum.js"></script>
<table width="800" border="0" cellspacing="1" cellpadding="0">
<tr>
<td><form id="archiwum" action="sprawdz.php?source=archiwum.php" method="post" onsubmit="return archiwum()">
<table width="800" border="0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<td bgcolor="#FFFFFF">&nbsp;</td>
<td colspan="8" bgcolor="#FFFFFF" align="center"><strong>Dane:</strong> </td>
</tr>
<tr>
<td align="center" bgcolor="#FFFFFF"></td>
<td align="center" bgcolor="#FFFFFF"><strong>Tytul zadania</strong></td>
<td align="center" bgcolor="#FFFFFF"><strong>Grupa</strong></td>
<td align="center" bgcolor="#FFFFFF"><strong>Rozwiazal</strong></td>
<td align="center" bgcolor="#FFFFFF"><strong>Rozwiazanie</strong></td>
<td align="center" bgcolor="#FFFFFF"><strong>Ocena</strong></td>
<td align="center" bgcolor="#FFFFFF"><strong>Komentarz</strong></td>
</tr>		

<?php
        while ($rows = mysql_fetch_assoc($wynik)) {
?>

<tr>
<td align="center" bgcolor="#FFFFFF"><input name="checkbox" type="checkbox" id="checkbox" value="<?php echo $rows['ID']; ?>"></td>
<td bgcolor="#FFFFFF" align="center"><?php echo $rows['tytul']; ?></td>
<td bgcolor="#FFFFFF" align="center"><?php echo $rows['grupa']; ?></td>
<td bgcolor="#FFFFFF" align="center"><?php echo $rows['login']; ?></td>
<td bgcolor="#FFFFFF" align="center"><?php echo $rows['rozw']; ?></td>
<td bgcolor="#FFFFFF" align="center"><?php echo $rows['ocena']; ?></td>
<td bgcolor="#FFFFFF" align="center"><?php echo $rows['koment']; ?></td>
</tr>

<?php
        }
?>

<tr>
<td colspan="8" align="left" bgcolor="#FFFFFF">
<input name="sprawdz" type="submit" id="sprawdz" value="Oceñ" ></td>
</tr>
<tr>

</table>
</form>
</table>
<?php
    }
    else {
        echo 'nie masz uprawnien administratora';
    }
}
else {
    echo 'Zaloguj sie!!!<br />';
    echo '<META HTTP-EQUIV="Refresh" CONTENT="2;logowanie.php">';
}

include('./stopka.inc');
?>