<?php

require('conn.php');

if (isset($_POST['konto']) and isset($_POST['password']) and isset($_POST['password2']))

{

if ($_POST['password']==$_POST['password2'])

  {

   $konto =  mysql_real_escape_string (trim($_POST['konto']));      

   $password = sha1(mysql_real_escape_string (trim($_POST['password']))); 

   $ile =mysql_query("SELECT * FROM `users` WHERE login = '$konto'");

   $ile = mysql_num_rows($ile);

   if ($ile==0)   {

   $zapytanie="INSERT INTO users (login,pass) VALUES('$konto','$password')";

   mysql_query($zapytanie) or die("Wyst±pi³ b³±d" );

      echo('Konto '.$konto.' zostalo utworzone');
   }

   else

   {

   echo("Taki uzytkownik juz istnieje. Kliknij wstecz aby zarejestrowac sie ponownie");

   }

  }

  else echo ("Podane hasla nie zgadzaja sie");

}

else{

?>

<html>
<head>
<title>rejestracja</title>
</head>
<body>
<h1>Dodaj nowego uzytkownika</h1>

<form action="rejestracja.php" method="post">
<table>
<td><strong>Nazwa konta:</strong></td><td><input name="konto" type="text" value="" /></td>
<tr>
<td><strong>Has³o:</strong></td><td><input name="password" type="password" value="" /></td>
</tr><tr>
<td><strong>Powtórz has³o:</strong></td><td><input name="password2" type="password" value="" /></td></tr>
</table>
<input type="submit" value="Zarejestruj" />

</form>
</body>
</html>
<?php

}

 

?>