<?php

$page_title = 'Dodaj zadanie';
include('./naglowek.inc');

session_start();

if(isset($_SESSION['login'])) {
    require('conn.php');
    $konto=($_SESSION['login']);
    $zap="SELECT user_rang FROM users WHERE login='$konto'";
    $rang=mysql_query($zap) or die("Wyst�pi� b��d!");
    $rang1 = mysql_fetch_assoc($rang);

    if($rang1['user_rang'] == 1) {
    echo 'Jeste� zalogowany jako: '.$_SESSION['login'].'';
    echo '<h3><a href="logout.php">Wyloguj</a><br /><br /></h3>';
?>
<a href="panel.php">Panel admina</a>

<script type="text/javascript" src="java/dodajzadanie.js"></script>

<form id="addzad" action="dodaj_zadanie1.php?source=dodaj_zadanie.php" method="post" onsubmit="return sprawdz_formularz(this)">
<table>
<td><strong>Tytu�:</strong></td><td><input name="tytul" type="text" value="" /></td><tr>
<td><strong>Tre�� zadania:</strong></td><td><textarea name="tresc" cols="50" rows="10"></textarea></td><tr>
<td><strong>Data otwarcia:</strong></td><td><input name="otwarcie" type="text" value="RRRR-MM-DD GG:MM" /></td><tr>
<td><strong>Data zamkni�cia:</strong></td><td><input name="zamkniecie" type="text" value="RRRR-MM-DD GG:MM" /></td><tr>
<td><strong>Wej�cia:</strong></td><td><input name="wejscia" type="text" value="" /></td><tr>
<td><strong>Wyj�cia:</strong></td><td><input name="wyjscia" type="text" value="" /></td><tr>
</table>
<input type="submit" value="Dodaj" />
</form>

<?php
    }
    else {
        echo 'Nie masz uprawnie� administratora!';
    }
}
else {
    echo 'Zaloguj si�!<br />';
    echo '<META HTTP-EQUIV="Refresh" CONTENT="2;logowanie.php">';
}

include('./stopka.inc');

?>