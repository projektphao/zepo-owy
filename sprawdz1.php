<?php

$page_title = 'Zadania';
include('./naglowek.inc');

session_start();

if ($_GET['source'] == 'sprawdz.php') {

if(isset($_SESSION['login'])) {
   $IDrozw=($_POST['IDrozw']);
    require('conn.php');
  
$koment=($_POST['komentarz']);
$ocena=($_POST['ocena']);
 

 $zap="UPDATE rozwiazania SET koment='$koment',ocena='$ocena' WHERE ID ='$IDrozw';";
 $wynik=mysql_query($zap) or die("Wystapi� b��d!" );
echo 'Sprawdzono zadanie<br />';
echo '<META HTTP-EQUIV="Refresh" CONTENT="1;rozwiazane.php">';

}
} else { // Strona �r�d�owa nieokre�lona
    echo 'Dost�p w nieprawid�owy spos�b!<br />';
    echo '<META HTTP-EQUIV="Refresh" CONTENT="2;sprawdz.php?source=rozwiazane.php">';
}

include('./stopka.inc');
?>