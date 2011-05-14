<?php

require('conn.php');

$page_title = 'Rejestracja';
include('./naglowek.inc');

if (isset($_POST['konto']) and isset($_POST['password']) and isset($_POST['password2'])) {
    if ($_POST['password']==$_POST['password2']) {
        $konto=mysql_real_escape_string(trim($_POST['konto']));
        $password = sha1(mysql_real_escape_string(trim($_POST['password'])));
        $ile =mysql_query("SELECT * FROM `users` WHERE login = '$konto'");
        $ile = mysql_num_rows($ile);
        if ($ile==0) {
            $zapytanie="INSERT INTO users (login,pass) VALUES('$konto','$password')";
            mysql_query($zapytanie) or die("Wyst±pi³ b³±d!");
            echo 'Konto '.$konto.' zostalo utworzone, teraz mo¿esz siê zalogowaæ<br />';
            echo '<META HTTP-EQUIV="Refresh" CONTENT="2;logowanie.php">';
        }
        else {
          //echo("Taki uzytkownik juz istnieje. Kliknij wstecz aby zarejestrowac sie ponownie");
?>
       <script type="text/javascript">
       alert('Taki uzytkownik juz istnieje.');
       </script>
<?php
            echo '<META HTTP-EQUIV="Refresh" CONTENT="0;rejestracja.php">';
        }

    }
  //else echo "Podane hasla nie zgadzaja sie";
}
else {
?>

Dodaj nowego u¿ytkownika

<script type="text/javascript" src="java/rejestracja.js"></script>

<form id="rejestracja" action="rejestracja.php" method="post" onsubmit="return sprawdz_formularz(this)">
<table>
<td><strong>Nazwa konta:</strong></td><td><input name="konto" type="text" value="" /></td>
<tr>
<td><strong>Has³o:</strong></td><td><input name="password" type="password" value="" /></td>
</tr><tr>
<td><strong>Powtórz has³o:</strong></td><td><input name="password2" type="password" value="" /></td></tr>
</table>
<input type="submit" value="Zarejestruj" />
</form>

<?php

}
include('./stopka.inc');
?>