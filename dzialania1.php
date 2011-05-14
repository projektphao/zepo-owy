<?php
require('conn.php');

include('./naglowek.inc');

if ($_GET['source'] == 'dodaj_grupe.php') {

$delete=($_POST['delete']);
if(!empty($delete)) {
    $checkbox=($_POST['checkbox']);

    foreach ($checkbox as &$del_id) {
        $zap="UPDATE zadania SET grupa='0' WHERE grupa = '$del_id';";
        $wynik = mysql_query($zap) or die("Wystapil b³±d!" );
        $zap="UPDATE users SET grupa='0' WHERE grupa = '$del_id';";
        $wynik = mysql_query($zap) or die("Wystapi³ b³±d!" );
        $a="DELETE FROM grupy WHERE nr = '$del_id';";
	$ai = mysql_query($a) or die("Wystapi³ b³±d!" );
    }
    unset($del_id);
    echo "Usuniêto grupê!<br />";
    echo '<META HTTP-EQUIV="Refresh" CONTENT="1;dodaj_grupe.php">';
}

} else { // Strona ¼ród³owa nieokre¶lona
    echo 'Dostêp w nieprawid³owy sposób!<br />';
    echo '<META HTTP-EQUIV="Refresh" CONTENT="2;dodaj_grupe.php">';
}

include('./stopka.inc');

?>