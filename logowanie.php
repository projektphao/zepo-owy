<?php
session_start();

if (isset($_POST['konto']) and isset($_POST['password']) )

{

require('conn.php');

$konto=mysql_real_escape_string(trim($_POST['konto']));

$password=mysql_real_escape_string(trim($_POST['password']));

if ($konto!="" and $password!="")

{

   $password = sha1($password);

   $zapytanie="SELECT ID  FROM users WHERE login='$konto' and pass ='$password'";
   
   $zap="SELECT user_rang  FROM users WHERE login='$konto' and pass ='$password'";

   $temp=mysql_query($zapytanie) or die("Wyst±pi³ b³±d");
   
   $t=mysql_query($zap) or die("Wyst±pi³ b³±d");

   $ile=mysql_num_rows($temp);

   $temp=mysql_fetch_array($temp);
   
   $row = mysql_fetch_assoc($t);

   $id=$temp['id'];

   if ($ile==1)

   {

     //$_SESSION['user_id']=$id;

     $_SESSION['login']=$konto;


   }

   else echo ('Podales zle dane. Kliknij wstecz aby sprobowac ponownie.');

}

}
   
	if($row['user_rang'] == 1)
	{
	echo '<META HTTP-EQUIV="Refresh" CONTENT="0;panel.php">';
	}
	else
	{
?>


<html>
<head>
<title> logowanie</title>
</head>
<body>


<?php
				if(isset($_SESSION['login']))
				{
				echo 'Jestes zalogowany jako: '.$_SESSION['login'].'<h3 />';

				echo '<a href="logout.php">Wyloguj</a><br />';
echo '<a href="zmiana.php">Zmiana hasla</a><br />';
echo '<a href="moje_zadania.php">Moje zadania</a><br />';
				}
				else
				{
				  if(isset($konto))
				  {
				  echo 'Zalogowanie nie udalo sie';
				  }
				  else
				  {
				  echo 'U¿ytkownik niezalogowany';
				  }
				  ?>

<form  action="logowanie.php" method="post">
<table>

<td><strong>Nazwa konta:</strong></td><td><input name="konto" type="text" value="" /></td><tr>

<td><strong>Haslo:</strong></td><td><input name="password" type="password" value="" /></td></tr>

</table>

<input type="submit" value="Zaloguj" />

</form>

</body>
</html>
<?php
}
}?>