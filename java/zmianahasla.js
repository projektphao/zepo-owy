function sprawdz_formularz()
{
    // zmienna przechowuj±ca komunikaty b³êdów
    var bledy = '';
    // przypisanie obiektu formularza do zmiennej
    var f = document.forms['zmiana'];
    // sprawdzenie starego hasla
    if (f.pass0.value == '')
    {
       bledy += 'Nie wpisa³e¶ starego has³a!\n';
    }
    // sprawdzenie has³a
    if (f.pass1.value == '')
    {
        bledy += 'Nie wpisa³e¶ has³a!\n';
    }
    //sprawdanie 2 hasla
    if (f.pass2.value == '')
    {
        bledy += 'Nie wpisa³e¶ drugi raz has³a!\n';
    }
    if (f.pass1.value != f.pass2.value)
    {
        bledy += 'Has³a ró¿ni± siê';
    }
    // formularz jest wypelniony poprawnie
    if(bledy == ''){
    return true;
    } else {
        alert(bledy);
        return false;
    }

}