<?php

$page_title = 'Dodaj grupê';
include('./naglowek.inc');

session_start();

if ($_GET['source'] == 'dodaj_grupe.php') {

if(isset($_SESSION['login'])) {
    require('conn.php');
    $konto =  ($_SESSION['login']);
    $zap="SELECT user_rang FROM users WHERE login='$konto'";
    $rang=mysql_query($zap) or die("Wyst±pi³ b³±d!");
    $rang1 = mysql_fetch_assoc($rang);

    if($rang1['user_rang'] == 1) {
        $nr=($_POST['numer']);
        $zap="SELECT ID FROM grupy WHERE nr ='$nr'";
        $wynik=mysql_query($zap) or die("Wyst±pi³ b³±d!");
        $wynik = mysql_num_rows($wynik);

        if ($wynik==0 && $nr != '') {
            $zapytanie = "INSERT INTO grupy(nr) VALUES ('$nr')";
            mysql_query($zapytanie) or die("Wyst±pi³ b³±d!" );
            echo('Grupa zosta³a dodana.<br />');
            echo '<META HTTP-EQUIV="Refresh" CONTENT="1;dodaj_grupe.php">';
        } else if($nr == ''){
            echo 'Nie mo¿esz dodaæ pustej grupy<br />';
            echo '<META HTTP-EQUIV="Refresh" CONTENT="1;dodaj_grupe.php">';
        } else {
            echo 'Podana grupa ju¿ istnieje!<br />';
            echo '<META HTTP-EQUIV="Refresh" CONTENT="1;dodaj_grupe.php">';
        }


    }
    else {
        echo 'Nie masz uprawnieñ administratora!<br />';
    }
}
else {
    echo 'Zaloguj siê!<br />';
    echo '<META HTTP-EQUIV="Refresh" CONTENT="2;logowanie.php">';
}

} else { // Strona ¼ród³owa nieokre¶lona
    echo 'Dostêp w nieprawid³owy sposób!<br />';
    echo '<META HTTP-EQUIV="Refresh" CONTENT="2;dodaj_grupe.php">';
}
include('./stopka.inc')

?>