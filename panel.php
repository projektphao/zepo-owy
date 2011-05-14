<?php

$page_title = 'Panel admina';
include('./naglowek.inc');

session_start();

if(isset($_SESSION['login'])) {
    require('conn.php');
    $konto=($_SESSION['login']);
    $zap="SELECT user_rang FROM users WHERE login='$konto'";
    $rang=mysql_query($zap) or die("Wyst±pi³ b³±d!");
    $rang1 = mysql_fetch_assoc($rang);
    
    if($rang1['user_rang'] == 1) {
        echo 'Jestes zalogowany jako: '.$_SESSION['login'].'';
	echo '<h3><a href="logout.php">Wyloguj</a><br /></h3>';
?>

<br />
<a href="dodaj_zadanie.php">Dodaj zadanie</a>
<br />
<a href="wyswietl_zadania.php">Przejrzyj zadania</a>
<br />
<a href="dodaj_grupe.php">Dodaj grupe</a>
<br />
<a href="uzytkownicy.php">Uzytkownicy</a>
<br />
<a href="dodawanie_kont.php">Masowe tworzenie kont</a>
<br />
<a href="rozwiazane.php">Sprawdzanie rozwiazan</a>
<br />

<?php
    }
    else {
        echo 'Nie masz uprawnien do panelu administratora<br />';
        echo '<META HTTP-EQUIV="Refresh" CONTENT="2;index.php">';
    }
}
else {
    echo 'Zaloguj siê!!!<br />';
    echo '<META HTTP-EQUIV="Refresh" CONTENT="2;logowanie.php">';
}

include('./stopka.inc');
?>