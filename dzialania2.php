<?php
require('conn.php');


$delete=($_POST['delete']);
$grupa=($_POST['grupa']);
if(!empty($delete))
{
		$checkbox=($_POST['checkbox']);
foreach ($checkbox as &$del_id) {
			$a="DELETE FROM users WHERE login = '$del_id';";
			$ai = mysql_query($a) or die("wystapil blad!" );
}
unset($del_id);
			echo "<h3>Usunieto uzytkownika!</h3>";
			echo '<META HTTP-EQUIV="Refresh" CONTENT="1;uzytkownicy.php">';
}

if(!empty($grupa))
{
$zap="SELECT ID FROM grupy WHERE nr = '$grupa';";
$wynik = mysql_query($zap) or die("wystapil blad!" );
$wynik = mysql_fetch_array($wynik);
if(!empty($wynik))
{
$checkbox=($_POST['checkbox']);
                        foreach ($checkbox as &$up_id) {
		       // $up_id = ($_POST['checkbox']);
			$a="UPDATE users SET grupa='$grupa' WHERE login = '$up_id';";
			$ai = mysql_query($a) or die("wystapil blad!" );
			}
unset($up_id);		
			echo "<h3>Dodano studenta do grupy!</h3>";
			echo '<META HTTP-EQUIV="Refresh" CONTENT="1;uzytkownicy.php">';
}
else {
echo ("Nie ma takiej grupy");
echo '<META HTTP-EQUIV="Refresh" CONTENT="1;uzytkownicy.php">';
}
}

?>