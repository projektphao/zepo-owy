<?php

$page_title = 'Dodaj zadanie';
include('./naglowek.inc');

session_start();

if ($_GET['source'] == 'dodaj_zadanie.php') {

if(isset($_SESSION['login'])) {
    require('conn.php');
    $konto=($_SESSION['login']);
    $zap="SELECT user_rang FROM users WHERE login='$konto'";
    $rang=mysql_query($zap) or die("Wyst�pi� b��d!");
    $rang1 = mysql_fetch_assoc($rang);
    
    if($rang1['user_rang'] == 1) {
        $tytul=($_POST['tytul']);
        $zap="SELECT ID FROM zadania WHERE tytul ='$tytul'";
        $wynik=mysql_query($zap) or die("Wyst�pi� b��d!");
        $wynik = mysql_num_rows($wynik);

        if ($wynik==0) {
            $opis=($_POST['tresc']);
            $otwarcie=($_POST['otwarcie']);
            $zamkniecie=($_POST['zamkniecie']);
            $wejscia=($_POST['wejscia']);
            $wyjscia=($_POST['wyjscia']);
            if($opis != '' && $otwarcie != '' && $zamkniecie != '' && $tytul != '' && $wejscia != '' && $wyjscia != ''){
            $zapytanie="INSERT INTO zadania(tytul,opis,data_otwarcia,data_zamkniecia,wejscia,wyjscia) VALUES ('$tytul' ,'$opis','$otwarcie','$zamkniecie','$wejscia','$wyjscia')";
            mysql_query($zapytanie) or die("Wyst�pi� b��d!" );
            echo('Zadanie zosta�o dodane.<br />');
            echo '<META HTTP-EQUIV="Refresh" CONTENT="1;dodaj_zadanie.php">';
            } else if ($opis == '' || $otwarcie == '' || $zamkniecie == '' || $tytul == '' || $wejscia == '' || $wyjscia == ''){
                echo 'Nie mo�esz doda� pustego zadania!<br />';
            echo '<META HTTP-EQUIV="Refresh" CONTENT="1;dodaj_zadanie.php">';
            }
        }
        else {
            echo 'Zadanie o podanym tytule ju� istnieje!<br />';
            echo '<META HTTP-EQUIV="Refresh" CONTENT="1;dodaj_zadanie.php">';
        }
    }
    else {
        echo 'Nie masz uprawnie� administratora!<br />';
    }
}
else {
    echo 'Zaloguj si�!<br />';
    echo '<META HTTP-EQUIV="Refresh" CONTENT="2;logowanie.php">';
}

} else { // Strona �r�d�owa nieokre�lona
    echo 'Dost�p w nieprawid�owy spos�b!<br />';
    echo '<META HTTP-EQUIV="Refresh" CONTENT="2;dodaj_zadanie.php">';
}

include('./stopka.inc');

?>