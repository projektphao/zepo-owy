<?php

$page_title = 'Dodaj grup�';
include('./naglowek.inc');

session_start();

if ($_GET['source'] == 'dodaj_grupe.php') {

if(isset($_SESSION['login'])) {
    require('conn.php');
    $konto =  ($_SESSION['login']);
    $zap="SELECT user_rang FROM users WHERE login='$konto'";
    $rang=mysql_query($zap) or die("Wyst�pi� b��d!");
    $rang1 = mysql_fetch_assoc($rang);

    if($rang1['user_rang'] == 1) {
        $nr=($_POST['numer']);
        $zap="SELECT ID FROM grupy WHERE nr ='$nr'";
        $wynik=mysql_query($zap) or die("Wyst�pi� b��d!");
        $wynik = mysql_num_rows($wynik);

        if ($wynik==0 && $nr != '') {
            $zapytanie = "INSERT INTO grupy(nr) VALUES ('$nr')";
            mysql_query($zapytanie) or die("Wyst�pi� b��d!" );
            echo('Grupa zosta�a dodana.<br />');
            echo '<META HTTP-EQUIV="Refresh" CONTENT="1;dodaj_grupe.php">';
        } else if($nr == ''){
            echo 'Nie mo�esz doda� pustej grupy<br />';
            echo '<META HTTP-EQUIV="Refresh" CONTENT="1;dodaj_grupe.php">';
        } else {
            echo 'Podana grupa ju� istnieje!<br />';
            echo '<META HTTP-EQUIV="Refresh" CONTENT="1;dodaj_grupe.php">';
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
    echo '<META HTTP-EQUIV="Refresh" CONTENT="2;dodaj_grupe.php">';
}
include('./stopka.inc')

?>