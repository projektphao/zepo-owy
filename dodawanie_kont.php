<?php

$page_title = 'Masowe dodawanie kont';
include('./naglowek.inc');

session_start();

if(isset($_SESSION['login'])) {
    require('conn.php');
    $konto =  ($_SESSION['login']);
    $zap="SELECT user_rang FROM users WHERE login='$konto'";
    $rang=mysql_query($zap) or die("Wyst±pi³ b³±d!");
    $rang1 = mysql_fetch_assoc($rang);

    if($rang1['user_rang'] == 1) {
?>

<html>
<head>
<title></title>
</head>
<body>

<?php
        echo 'Jeste¶ zalogowany jako: '.$_SESSION['login'].'';
        echo '<h3><a href="logout.php">Wyloguj</a><br /><br /></h3>';
?>
<a href="panel.php">Panel admina</a>

<script type="text/javascript" src="java/masowo.js"></script>

<form id="masowo" action="dodawanie_kont1.php?source=dodawanie_kont.php" method="post" onsubmit="return sprawdz_formularz()">
<table>
<td><strong>Nazwy kont:</strong></td><td><textarea name="nazwy" cols="50" rows="10"></textarea></td><tr>

<td><strong>Haslo:</strong></td><td><input name="pass" type="password" value="" /></td><tr>
</table>
<input type="submit" value="Dodaj" />
</form>

<?php
    }
    else {
        echo 'Nie masz uprawnieñadministratora!<br />!';
    }
}
else{
    echo 'Zaloguj siê!<br />';
    echo '<META HTTP-EQUIV="Refresh" CONTENT="2;logowanie.php">';
}

include('./stopka.inc');

?>
</body>
</html>