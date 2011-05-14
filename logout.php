<?
$page_title = 'Logout';
include('./naglowek.inc');

session_start();

session_unset();

session_destroy();

echo "Zosta³e¶ wylogowany!<br />";
echo '<META HTTP-EQUIV="Refresh" CONTENT="2;index.php">';
 
include('./stopka.inc');
?>