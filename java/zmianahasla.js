function sprawdz_formularz()
{
    // zmienna przechowuj�ca komunikaty b��d�w
    var bledy = '';
    // przypisanie obiektu formularza do zmiennej
    var f = document.forms['zmiana'];
    // sprawdzenie starego hasla
    if (f.pass0.value == '')
    {
       bledy += 'Nie wpisa�e� starego has�a!\n';
    }
    // sprawdzenie has�a
    if (f.pass1.value == '')
    {
        bledy += 'Nie wpisa�e� has�a!\n';
    }
    //sprawdanie 2 hasla
    if (f.pass2.value == '')
    {
        bledy += 'Nie wpisa�e� drugi raz has�a!\n';
    }
    if (f.pass1.value != f.pass2.value)
    {
        bledy += 'Has�a r�ni� si�';
    }
    // formularz jest wypelniony poprawnie
    if(bledy == ''){
    return true;
    } else {
        alert(bledy);
        return false;
    }

}