<?
define('DB_HOST','localhost');
define('DB_USER','projekt2'); 
define('DB_PASS','phao123');
define('DB_DB','projekt2');

$connect = mysql_connect(DB_HOST, DB_USER, DB_PASS)
or die('Nie uda³o po³±czyc siê z baz± danych. '.mysql_error());

mysql_select_db(DB_DB,$connect);


?>
