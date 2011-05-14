<?php
require('conn.php');

include('./naglowek.inc');

if ($_GET['source'] == 'uzytkownicy.php') {

$delete=($_POST['delete']);
$grupa=($_POST['grupa']);

if(!empty($delete)) {
    $checkbox=($_POST['checkbox']);

    foreach ($checkbox as &$del_id) {
        $a="DELETE FROM users WHERE login = '$del_id';";
	$ai = mysql_query($a) or die("Wystapi³ b³±d!");
    }
    unset($del_id);
    echo "<h3>Usunieto uzytkownika!</h3>";
    echo '<META HTTP-EQUIV="Refresh" CONTENT="1;uzytkownicy.php">';
}

if(!empty($grupa)) {
    $zap="SELECT ID FROM grupy WHERE nr = '$grupa';";
    $wynik = mysql_query($zap) or die("wystapil blad!" );
    $wynik = mysql_fetch_array($wynik);
    if(!empty($wynik)) {
        $checkbox=($_POST['checkbox']);
        
        foreach ($checkbox as &$up_id) {
         // $up_id = ($_POST['checkbox']);
            $a="UPDATE users SET grupa='$grupa' WHERE login = '$up_id';";
            $ai = mysql_query($a) or die("Wystapi³ b³±d!" );
	}
        unset($up_id);
	echo "Dodano studenta do grupy!<br />";
	echo '<META HTTP-EQUIV="Refresh" CONTENT="1;uzytkownicy.php">';
    }
    else {
        echo ("Nie ma takiej grupy");
        echo '<META HTTP-EQUIV="Refresh" CONTENT="1;uzytkownicy.php">';
    }
}
} else { // Strona ¼ród³owa nieokre¶lona
    echo 'Dostêp w nieprawid³owy sposób!<br />';
    echo '<META HTTP-EQUIV="Refresh" CONTENT="2;uzytkownicy.php">';
}

include('./stopka.inc');
?>