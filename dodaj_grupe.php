<?php

$page_title = 'Dodaj grupê';
include('./naglowek.inc');

session_start();

if(isset($_SESSION['login'])) {
    require('conn.php');
    $konto =  ($_SESSION['login']);
    $zap="SELECT user_rang FROM users WHERE login='$konto'";
    $rang=mysql_query($zap) or die("Wyst±pi³ b³±d!");
    $rang1 = mysql_fetch_assoc($rang);
    
    if($rang1['user_rang'] == 1){
        $zap="SELECT * FROM grupy";
        $wynik=mysql_query($zap) or die("Wyst±pi³ b³±d!" );
        $ile=mysql_num_rows($wynik);
        echo 'Jeste¶ zalogowany jako: '.$_SESSION['login'].'';
        echo '<h3><a href="logout.php">Wyloguj</a><br /><br /></h3>';
?>

<script type="text/javascript" src="java/dodajgrupe.js"></script>
<a href="panel.php">Panel admina</a>

<table width="800" border="0" cellspacing="1" cellpadding="0">
<tr>
<td><form id="usun" action="dzialania1.php?source=dodaj_grupe.php" method="post" onsubmit="return usun()">
<table width="800" border="0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<td colspan="8" bgcolor="#FFFFFF" align="center"><strong>DANE</strong> </td>
</tr>
<tr>
<td align="center" bgcolor="#FFFFFF">Zaznacz</td>
<td align="center" bgcolor="#FFFFFF"><strong>Numer grupy:</strong></td>
</tr>		

<?php
while ($rows = mysql_fetch_assoc($wynik)) {
?>
    <tr>
    <td align="center" bgcolor="#FFFFFF"><input name="checkbox[]" type="checkbox" id="checkbox" value="<?php echo $rows['nr']; ?>"></td>
    <td bgcolor="#FFFFFF" align="center"><?php echo $rows['nr']; ?></td>
    </tr>
<?php
}
?>

<tr>
<td colspan="8" align="left" bgcolor="#FFFFFF">
<input name="delete" type="submit" id="delete" value="Usuñ grupê" /></td>
</tr>
</table>
</form>
</table>

<form id="addgrup" action="dodaj_grupe1.php?source=dodaj_grupe.php" method="post" onsubmit="return dodaj()">
<table>
<td><strong>Podaj numer grupy:</strong></td><td><input name="numer" type="text" value="" /></td>
<td><input type="submit" value="Dodaj" /></td>
</table>
</form>

<?php
    }
    else {
        echo 'Nie masz uprawnieñ administratora!<br />';
    }
}
else {
    echo 'Zaloguj siê!<br />';
    echo '<META HTTP-EQUIV="Refresh" CONTENT="2;logowanie.php">';
}

include('./stopka.inc');

?>