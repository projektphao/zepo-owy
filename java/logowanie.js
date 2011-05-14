function sprawdz_formularz()
{
    // zmienna przechowuj±ca komunikaty b³êdów
    var bledy = '';
    // przypisanie obiektu formularza do zmiennej
    var f = document.forms['log'];
    // sprawdzenie nazwy
    if (f.konto.value == '')
    {
       bledy += 'Musisz wpisaæ nazwê!\n';
    }
    // sprawdzenie has³a
    if (f.password.value == '')
    {
        bledy += 'Musisz wpisaæ has³o!\n';
    }
    // formularz jest wypelniony poprawnie
    if(bledy == ''){
    return true;
    } else {
        alert(bledy);
        return false;
    }

}