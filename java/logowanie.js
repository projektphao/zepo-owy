function sprawdz_formularz()
{
    // zmienna przechowuj�ca komunikaty b��d�w
    var bledy = '';
    // przypisanie obiektu formularza do zmiennej
    var f = document.forms['log'];
    // sprawdzenie nazwy
    if (f.konto.value == '')
    {
       bledy += 'Musisz wpisa� nazw�!\n';
    }
    // sprawdzenie has�a
    if (f.password.value == '')
    {
        bledy += 'Musisz wpisa� has�o!\n';
    }
    // formularz jest wypelniony poprawnie
    if(bledy == ''){
    return true;
    } else {
        alert(bledy);
        return false;
    }

}