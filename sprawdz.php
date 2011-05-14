<?php
require('conn.php');

include('./naglowek.inc');

if ($_GET['source'] == 'rozwiazane.php' || $_GET['source'] == 'archiwum.php') {

$id1=($_POST['sprawdz']);
if(!empty($id1)) {
    $ID=($_POST['checkbox']);
    $zap="SELECT koment, ocena FROM rozwiazania WHERE ID='$ID'";
    $wynik=mysql_query($zap) or die("wystapil blad");
    $wynik = mysql_fetch_assoc($wynik);

    

 echo 'Jestes zalogowany jako: '.$_SESSION['login'].'';
        echo '<h3><a href="logout.php">Wyloguj</a><br /></h3>';
?>
<br />
<!--
<br>-->
<a href="panel.php">Panel admina</a>

<?php
$zap1="SELECT zadania.opis, rozwiazania.rozw FROM zadania LEFT JOIN rozwiazania ON zadania.ID=rozwiazania.ID_zad WHERE rozwiazania.ID='$ID';";
$wynik1=mysql_query($zap1) or die("wystapil blad1");
    $wynik1 = mysql_fetch_assoc($wynik1);
?>
<br>
<table width="800" border="2" cellpadding="2" cellspacing="1">
<td>Tresc zadania</td><td>Rozwiazanie</td>
<tr>
<td><?php echo $wynik1['opis']; ?></td><td><?php echo $wynik1['rozw']; ?></td>
</table>

<script type="text/javascript" src="java/sprawdz.js"></script>

<form id="sprawdz" action="sprawdz1.php?source=sprawdz.php" method="post" onsubmit="return sprawdz_formularz()">
<table>
<td><strong>Komentarz:</strong></td><td><textarea name="komentarz" cols="50" rows="10"><?php echo $wynik['koment']; ?></textarea></td><tr>

<td><strong>Ocena:</strong></td><td><input name="ocena" type="text" value="<?php echo $wynik['ocena']; ?>" /></td><tr>
<td><strong></strong></td><td><input name="IDrozw" type="hidden" value="<?php echo $ID; ?>" /></td><tr>
</table>
<input type="submit" value="Dodaj" />
</form>

<?php
}
} else { // Strona ¼ród³owa nieokre¶lona
    echo 'Dostêp w nieprawid³owy sposób!<br />';
    echo '<META HTTP-EQUIV="Refresh" CONTENT="2;rozwiazane.php">';
}

include('./stopka.inc');
?>