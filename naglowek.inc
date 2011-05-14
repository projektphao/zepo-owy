<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta name="Author" content="Maarek Gerwel" />
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-2" />
	<meta name="Description" content=" " />
	<meta name="Keywords" content=" " />

        <title><?php echo $page_title; ?></title>

        <!-- Skrypt odpowiedzialny za wygląd linków na stronie -->
        <style type="text/css">
        /* <![CDATA[ */
        a { text-decoration: none }
        a:hover { text-decoration: underline; color: red; background-color: yellow }
        /* ]]> */
        </style>

        <!-- Skrypt odpowiedzialny za zegar LIVE -->
        <script type="text/javascript">
        /* <![CDATA[ */
        var roz = new Date().getTime()-(<?php echo date(U); ?>*1000);

        function zegar(){
        miesiace= new Array ('Stycznia', 'Lutego', 'Marca', 'Kwietnia', 'Maja', 'Czerwca', 'Lipca', 'Sierpnia', 'Września', 'Października', 'Listopada', 'Grudnia')
        D = new Date();
        D.setTime(D.getTime()-roz);
        G = D.getHours();
        M = D.getMinutes(); M=M<10?'0'+M:M;
        S = D.getSeconds(); S=S<10?'0'+S:S;
        r = D.getFullYear();
        m = miesiace[D.getMonth()];
        d = D.getDate();

        document.getElementById('czas').innerHTML=' '+ G + ':' + M + ':' + S;
        document.getElementById('data').innerHTML=' '+ d + ' ' + m + ' ' + r + ' ' + 'roku'
        setTimeout('zegar()', 1000);
        }
        /* ]]> */
        </script>

</head>

<body bgcolor="#FFFFFF">
    <table width="100%" border="0" cellspacing="0" cellpadding="4">
        <tr>
            <td width="100%" bgcolor="#666666"><font color="#CCCCCC"><big><b>
                            Projekt phao!</b></big></font></td>
        </tr>
        <tr>
            <td bgcolor="#CCCCCC"> <table width="100%" border="0" cellspacing="1"
                                          cellpadding="2">
                    <tr>
                        <td align="center"><a href="index.php">Strona domowa</a></td>
                        <td align="center"><a href="logowanie.php">Panel użytkownika</a></td>
                        <td align="center"><a href="panel.php">Panel admina</a></td>
                        <td align="center"><a href="logowanie.php">Zaloguj się</a></td>
                        <td align="center"><a href="rejestracja.php">Rejestracja</a></td>
                    </tr>
                </table></td>
        </tr>
    </table>
    <p align="center">
    Dziś jest <span id="data"></span> <br />
    Godzina <span id="czas"></span>
    <script type="text/javascript">zegar()</script>
    </p>
    <br />
    <!-- W TYM MIEJSCU ZACZYNA SIĘ KOD SPECYFICZNY DLA DANEJ STRONY. -->