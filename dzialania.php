<?php
require('conn.php');


$delete=($_POST['delete']);
$grupa=($_POST['grupa']);
if(!empty($delete))
{
		$del_id=($_POST['checkbox']);
			$a="DELETE FROM zadania WHERE tytul = '$del_id';";
			$ai = mysql_query($a) or die("wystapil blad!" );

			echo "<h3>Usunieto zadanie!</h3>";
			echo '<META HTTP-EQUIV="Refresh" CONTENT="1;wyswietl_zadania.php">';
}

if(!empty($grupa))
{
		        $up_id = ($_POST['checkbox']);
			$a="UPDATE zadania SET grupa='$grupa' WHERE tytul = '$up_id';";
			$ai = mysql_query($a) or die("wystapil blad!" );
					
			echo "<h3>Dodano zadanie do grupy!</h3>";
			echo '<META HTTP-EQUIV="Refresh" CONTENT="1;wyswietl_zadania.php">';
}

?>

