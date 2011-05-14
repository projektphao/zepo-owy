<?php

$page_title = 'Zadania';
include('./naglowek.inc');

session_start();

if(isset($_SESSION['login'])) {
   $zamk=($_POST['data_zamkniecia']);
if ($godz < strtotime($zamk)) {
    require('conn.php');
    $konto=($_SESSION['login']);
    $rozw=($_POST['rozwiazanie']);
$id_zad=($_POST['id_zad']);
$zap="SELECT * FROM rozwiazania WHERE ID_zad='$id_zad' AND login='$konto';";
$wynik=mysql_query($zap) or die("Wystapi³ b³±d!" );
 
 $ile = mysql_num_rows($wynik);
$wynik = mysql_fetch_assoc($wynik);
if($ile==0){
    $zap="INSERT INTO rozwiazania(ID_zad,login,rozw) VALUES ('$id_zad' ,'$konto','$rozw')";
            $wynik=mysql_query($zap) or die("Wystapi³ b³±d!" );
echo 'Rozwiazanie zadania dodane do bazy';
echo '<META HTTP-EQUIV="Refresh" CONTENT="1;moje_zadania.php">';
}
else
{

 $zap="UPDATE rozwiazania SET ID_zad='$id_zad',login='$konto',rozw='$rozw' WHERE ID = $wynik[ID];";
 $wynik=mysql_query($zap) or die("Wystapi³ b³±d!" );
echo 'Zaaktualizowano rozwiazanie zadania';
echo '<META HTTP-EQUIV="Refresh" CONTENT="1;moje_zadania.php">';
}
}
else echo 'zadanie zostalo zamkniete!';
}

include('./stopka.inc');
?>
