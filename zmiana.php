<?php
session_start();
	if(isset($_SESSION['login']))
		{
if (isset($_POST['pass0']) and isset($_POST['pass1']) and isset($_POST['pass2']))

{
require('conn.php');

$konto =  ($_SESSION['login']); 

$passw0 = sha1(mysql_real_escape_string (trim($_POST['pass0'])));

$password0="SELECT pass from users WHERE login = '$konto'"; 

$wynik = mysql_query($password0) or die("Wyst±pi³ b³±d" );
$wynik1 = mysql_fetch_array($wynik);

if ($passw0==$wynik1['pass'])
{
if ($_POST['pass1']==$_POST['pass2'])

  {      

   $password = sha1(mysql_real_escape_string (trim($_POST['pass1']))); 


   $zapytanie="UPDATE users SET pass = '$password' WHERE login = '$konto'";
   mysql_query($zapytanie) or die("Wyst±pi³ b³±d" );

      echo('Haslo do konta '.$login.' zostalo zmienione');
	  echo '<META HTTP-EQUIV="Refresh" CONTENT="1;logowanie.php">';


  }

  else echo ("Podane hasla nie zgadzaja sie");

}
else echo ("podales zle haslo2");
}
else{



?>



<html>
<head>
<title>zmiana hasla</title>
</head>
<body>
<?php
				if(isset($_SESSION['login']))
				{
				echo 'Jestes zalogowany jako: '.$_SESSION['login'].'<h3 />';

				echo '<a href="logout.php">Wyloguj</a><br />';
echo '<a href="moje_zadania.php">Moje Zadania</a><br />';
				}
?>
<form action="zmiana.php" method="post">
<table>
<td><strong>stare haslo:</strong></td><td><input name="pass0" type="password" value="" /></td>
<tr>
<td><strong>Has³o:</strong></td><td><input name="pass1" type="password" value="" /></td>
</tr><tr>
<td><strong>Powtórz has³o:</strong></td><td><input name="pass2" type="password" value="" /></td></tr>
</table>
<input type="submit" value="Zmien haslo" />

</form>


</body>
</html>

<?php
}
}?>