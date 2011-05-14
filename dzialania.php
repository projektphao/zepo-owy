<?php
require('conn.php');

include('./naglowek.inc');

if ($_GET['source'] == 'wyswietl_zadania.php') {

$delete=($_POST['delete']);
$grupa=($_POST['grupa']);
if(!empty($delete)) {
    $checkbox=($_POST['checkbox']);
    
    foreach ($checkbox as &$del_id) {
        $a="DELETE FROM zadania WHERE tytul = '$del_id';";
	$ai=mysql_query($a) or die("Wyst±pi³ b³±d!" );
    }
    unset($del_id);
    echo "Usuniêto zadanie!<br />";
    echo '<META HTTP-EQUIV="Refresh" CONTENT="1;wyswietl_zadania.php">';
}

if(!empty($grupa)) {
    $zap="SELECT ID FROM grupy WHERE nr = '$grupa';";
    $wynik=mysql_query($zap) or die("Wystapi³ b³±d!" );
    $wynik=mysql_fetch_array($wynik);
    
    if(!empty($wynik)) {
        $checkbox=($_POST['checkbox']);

        foreach ($checkbox as &$up_id) {
         // $up_id = ($_POST['checkbox']);
            $a="UPDATE zadania SET grupa='$grupa' WHERE tytul = '$up_id';";
            $ai=mysql_query($a) or die("Wystapi³ b³±d!" );
	}
        unset($up_id);
        echo "Dodano zadanie do grupy!<br />";
	echo '<META HTTP-EQUIV="Refresh" CONTENT="1;wyswietl_zadania.php">';
    }
    else {
        echo "Nie ma takiej grupy!<br />";
        echo '<META HTTP-EQUIV="Refresh" CONTENT="1;wyswietl_zadania.php">';
    }
}

} else { // Strona ¼ród³owa nieokre¶lona
    echo 'Dostêp w nieprawid³owy sposób!<br />';
    echo '<META HTTP-EQUIV="Refresh" CONTENT="2;wyswietl_zadania.php">';
}

include('./stopka.inc');

?>