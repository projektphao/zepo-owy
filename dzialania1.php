<?php
require('conn.php');

include('./naglowek.inc');

if ($_GET['source'] == 'dodaj_grupe.php') {

$delete=($_POST['delete']);
if(!empty($delete)) {
    $checkbox=($_POST['checkbox']);

    foreach ($checkbox as &$del_id) {
        $zap="UPDATE zadania SET grupa='0' WHERE grupa = '$del_id';";
        $wynik = mysql_query($zap) or die("Wystapil b��d!" );
        $zap="UPDATE users SET grupa='0' WHERE grupa = '$del_id';";
        $wynik = mysql_query($zap) or die("Wystapi� b��d!" );
        $a="DELETE FROM grupy WHERE nr = '$del_id';";
	$ai = mysql_query($a) or die("Wystapi� b��d!" );
    }
    unset($del_id);
    echo "Usuni�to grup�!<br />";
    echo '<META HTTP-EQUIV="Refresh" CONTENT="1;dodaj_grupe.php">';
}

} else { // Strona �r�d�owa nieokre�lona
    echo 'Dost�p w nieprawid�owy spos�b!<br />';
    echo '<META HTTP-EQUIV="Refresh" CONTENT="2;dodaj_grupe.php">';
}

include('./stopka.inc');

?>