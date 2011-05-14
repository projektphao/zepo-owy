<?php

$page_title = 'Logowanie';
include('./naglowek.inc');

session_start();

if (isset($_POST['konto']) and isset($_POST['password'])) {
    require('conn.php');
    $konto=mysql_real_escape_string(trim($_POST['konto']));
    $password=mysql_real_escape_string(trim($_POST['password']));
    
    if ($konto!="" and $password!="") {
        $password = sha1($password);
        $zapytanie="SELECT ID  FROM users WHERE login='$konto' and pass ='$password'";
        $zap="SELECT user_rang  FROM users WHERE login='$konto' and pass ='$password'";
        $temp=mysql_query($zapytanie) or die("Wyst±pi³ b³±d!");
        $t=mysql_query($zap) or die("Wyst±pi³ b³±d!");
        $ile=mysql_num_rows($temp);
        $temp=mysql_fetch_array($temp);
        $row = mysql_fetch_assoc($t);
        $id=$temp['id'];
        
        if ($ile==1) {
          //$_SESSION['user_id']=$id;
            $_SESSION['login']=$konto;
        }
        else {
?>

        <script type="text/javascript" src="java/zledane.js"></script>

<?php
        }
    }
}

if($row['user_rang'] == 1) {
    echo '<META HTTP-EQUIV="Refresh" CONTENT="0;panel.php">';
}
else {
    if(isset($_SESSION['login'])) {
        echo 'Jeste¶ zalogowany jako: '.$_SESSION['login'].'<h3>';
        echo '<a href="logout.php">Wyloguj</a></h3><br />';
        echo '<a href="zmiana.php">Zmiana has³a</a><br />';
        echo '<a href="moje_zadania.php">Moje zadania</a><br />';
    }
    else {
        if(isset($konto)) {
            echo 'Zalogowanie nie uda³o siê.';
        }
        else {
            echo 'U¿ytkownik niezalogowany.';
        }
?>

<script type="text/javascript" src="java/logowanie.js"></script>

<form id="log" action="logowanie.php" method="post" onsubmit="return sprawdz_formularz()">
<table>
<td><strong>Nazwa konta:</strong></td><td><input name="konto" type="text" value="" /></td><tr>
<td><strong>Has³o:</strong></td><td><input name="password" type="password" value="" /></td><tr>
</table>
<input type="submit" value="Zaloguj" />
</form>

<?php
    }
}
include('./stopka.inc');
?>