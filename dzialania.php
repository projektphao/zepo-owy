<?php
require('conn.php');


$delete=($_POST['delete']);
$grupa=($_POST['grupa']);
if(!empty($delete))
{
		$checkbox=($_POST['checkbox']);
foreach ($checkbox as &$del_id) {
			$a="DELETE FROM zadania WHERE tytul = '$del_id';";
			$ai = mysql_query($a) or die("wystapil blad!" );
}
unset($del_id);
			echo "<h3>Usunieto zadanie!</h3>";
			echo '<META HTTP-EQUIV="Refresh" CONTENT="1;wyswietl_zadania.php">';
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
			$a="UPDATE zadania SET grupa='$grupa' WHERE tytul = '$up_id';";
			$ai = mysql_query($a) or die("wystapil blad!" );
			}
unset($up_id);		
			echo "<h3>Dodano zadanie do grupy!</h3>";
			echo '<META HTTP-EQUIV="Refresh" CONTENT="1;wyswietl_zadania.php">';
}
else {
echo ("Nie ma takiej grupy");
echo '<META HTTP-EQUIV="Refresh" CONTENT="1;wyswietl_zadania.php">';
}
}

?>

