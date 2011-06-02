<?php

$page_title = 'Zadania';
include('./naglowek.inc');

session_start();

if(isset($_SESSION['login'])) {
   $zamk=($_POST['data_zamkniecia']);
if ($godz < strtotime($zamk)) {
    require('conn.php');
    $konto=($_SESSION['login']);
    $rozw=($_POST['rozwiazanie']);
$id_zad=($_POST['id_zad']);
$zap="SELECT * FROM rozwiazania WHERE ID_zad='$id_zad' AND login='$konto';";
$wynik=mysql_query($zap) or die("Wystapi³ b³±d!" );
 
 $ile = mysql_num_rows($wynik);
$wynik = mysql_fetch_assoc($wynik);
if($ile==0){
    $zap="INSERT INTO rozwiazania(ID_zad,login,rozw) VALUES ('$id_zad' ,'$konto','$rozw')";
            $wynik=mysql_query($zap) or die("Wystapi³ b³±d!" );
echo 'Rozwiazanie zadania dodane do bazy';
echo '<META HTTP-EQUIV="Refresh" CONTENT="1;moje_zadania.php">';
}
else
{

 $zap="UPDATE rozwiazania SET ID_zad='$id_zad',login='$konto',rozw='$rozw' WHERE ID = $wynik[ID];";
 $wynik=mysql_query($zap) or die("Wystapi³ b³±d!" );
echo 'Zaaktualizowano rozwiazanie zadania<br>';
//echo '<META HTTP-EQUIV="Refresh" CONTENT="1;moje_zadania.php">';

$zap="SELECT ID from rozwiazania WHERE login='$konto' AND id_zad='$id_zad'";
$wynik=mysql_query($zap) or die("blad1");
$wynik=mysql_fetch_assoc($wynik);
$nazwa=$wynik[ID].'.c';

$zap="SELECT wejscia, wyjscia FROM zadania WHERE ID='$id_zad'";
$wynik1=mysql_query($zap) or die("blad1");
$wynik1=mysql_fetch_assoc($wynik1);

$wejscie=explode("#", $wynik1[wejscia]);
$wyjscie=explode("#", $wynik1[wyjscia]);
$calpkt=0;
$pkt=0;
$ktory=-1;
foreach ($wejscie as &$up_id) {

//foreach ($wyjscie as &$up_ida) {



$nazwa2=$wynik[ID].'wejscia';



$plik=fopen($nazwa,'w');
flock($plik,2);
fwrite($plik,$rozw);
flock($plik,3);
fclose($plik);
$nazwa1=$wynik[ID].'.out';
$nazwa3=$wynik[ID].'bledy';
$plik2=fopen($nazwa3,'w+');

exec('gcc '.$nazwa.' -o '.$nazwa1.' 2> '.$nazwa3);
$blad=fread($plik2, filesize($nazwa3));
fclose($plik2);
//$wyjscie1=explode(" ", $up_ida);
$wejscie1=explode(" ", $up_id);
$ktory=$ktory+1;
foreach ($wejscie1 as &$up_id1) {

$plik0=fopen($nazwa2,'a');
flock($plik0,2);
fwrite($plik0,$up_id1);
fwrite($plik0,"\n");
flock($plik0,3);
fclose($plik0);
}
$wyj=exec('./'.$nazwa1.' < '.$nazwa2);
//echo $wyj;
//echo $wyjscie1[$ktory];
//echo $up_id1a;
//echo $up_id1;
$ab=$wyjscie[$ktory];

//if(strcmp($ab, $wyj))
if($ab == $wyj)
{
$pkt=$pkt+1;
}
$calpkt=$calpkt+1;


//}
unlink($nazwa3);

unlink($nazwa2);


//}
}
if($blad == '')
{
$proc=$pkt/$calpkt;
echo "Twoja liczba punktów: $pkt/$calpkt ";
printf('(%.2f)',$proc);
unlink($nazwa1);
//echo $blad;
if($proc<0.5)
$ocena=2;
if($proc>=0.5 && $proc<0.65)
$ocena=3;
if($proc>=0.65 && $proc<0.75)
$ocena=3.5;
if($proc>=0.75 && $proc<0.80)
$ocena=4;
if($proc>=0.8 && $proc<0.89)
$ocena=4.5;
if($proc>=0.89)
$ocena=5;
echo "<br>Otrzymujesz ocene: $ocena";

$zap2="UPDATE rozwiazania SET ocena='$ocena' WHERE ID ='$wynik[ID]';";

 $wynik2=mysql_query($zap2) or die("Wystapi³ b³±d!" );



}
else{
echo "Wystapil blad podczas kompilacji.<br>";
echo $blad;}
echo '<a href="moje_zadania.php"><br>Dalej<br /></a>';
}
}
else echo 'nie';
}


include('./stopka.inc');
?>
