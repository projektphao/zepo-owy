<?php
require('conn.php');


$delete=($_POST['delete']);
if(!empty($delete))
{
		$checkbox=($_POST['checkbox']);
foreach ($checkbox as &$del_id) {
			$a="DELETE FROM grupy WHERE nr = '$del_id';";
			$ai = mysql_query($a) or die("wystapil blad!" );
}
unset($del_id);
			echo "<h3>Usunieto grupe!</h3>";
			echo '<META HTTP-EQUIV="Refresh" CONTENT="1;dodaj_grupe.php">';
}

?>