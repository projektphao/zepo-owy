<?
define('DB_HOST','mysql.cba.pl');
define('DB_USER','madtest1'); 
define('DB_PASS','12345');
define('DB_DB','madtest_cba_pl');

$connect = mysql_connect(DB_HOST, DB_USER, DB_PASS)
or die('Nie udaณo poณฑczyc si๊ z bazฑ danych. '.mysql_error());

mysql_select_db(DB_DB,$connect);


?>