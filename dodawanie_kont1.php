<?php

$page_title = 'Masowe dodawanie kont';
include('./naglowek.inc');

if ($_GET['source'] == 'dodawanie_kont.php') {

session_start();

if(isset($_SESSION['login'])) {
    require('conn.php');
    $konto =  ($_SESSION['login']);
    $zap="SELECT user_rang FROM users WHERE login='$konto'";
    $rang=mysql_query($zap) or die("Wyst�pi� b��d!");
    $rang1=mysql_fetch_assoc($rang);

    if($rang1['user_rang'] == 1) {
        $konta=($_POST['nazwy']);
        $konto=explode(" ", $konta);
        $password = sha1(mysql_real_escape_string (trim($_POST['pass'])));

        foreach ($konto as &$up_id) {
            $zap="SELECT login FROM users WHERE login ='$up_id'";
            $wynik=mysql_query($zap) or die("Wyst�pi� b��d!");
            $wynik = mysql_num_rows($wynik);
        
            if ($up_id!='') {
                if ($wynik==0) {
                    $zapytanie = "INSERT INTO users(login,pass) VALUES ('$up_id' ,'$password')";
                    mysql_query($zapytanie) or die("Wyst�pi� b��d!" );
                    echo('U�ytkownik '.$up_id.' zosta� dodany.<br>');
                //  echo '<META HTTP-EQUIV="Refresh" CONTENT="1;dodawanie_kont.php">';
                }
                else {
                    echo ('Uzytkownik '.$up_id.' ju� istnieje!<br>');
                // echo '<META HTTP-EQUIV="Refresh" CONTENT="1;dodawanie_kont.php">';
                }
            }
        }
        echo '<a href="dodawanie_kont.php">Dalej<br /></a>';
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
    echo '<META HTTP-EQUIV="Refresh" CONTENT="2;dodawanie_kont.php">';
}

include('./stopka.inc');

?>
