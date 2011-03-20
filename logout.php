<?

session_start();

 

session_unset();

session_destroy();

echo "<h3> Zostales wylogowany !</h3>";
echo '<META HTTP-EQUIV="Refresh" CONTENT="2;index.html">';
 

?>