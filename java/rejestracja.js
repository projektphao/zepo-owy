function sprawdz_formularz()
{
    // zmienna przechowuj±ca komunikaty b³êdów
    var bledy = '';
    // przypisanie obiektu formularza do zmiennej
    var f = document.forms['rejestracja'];
    // sprawdzenie nazwy
    if (f.konto.value == '')
    {
       bledy += 'Musisz wpisaæ nazwê!\n';
    }
    // sprawdzanie d³ugo¶ci has³a
    if (f.password.value.length < 6)
    {
        bledy += 'Has³o musi mieæ wiêcej ni¿ 5 znaków\n';
    }
    // sprawdzenie has³a
    if (f.password.value == '')
    {
        bledy += 'Musisz wpisaæ has³o!\n';
    }
    // haslo no 2
    if (f.password2.value == '')
    {
        bledy += 'Musisz wpisaæ has³o 2 raz!\n';
    }
    // czy has³a s± identyczne
    if (f.password.value != f.password2.value)
    {
        bledy += 'Has³a nie s± identyczne!\n';
    }
    // formularz jest wypelniony poprawnie
    if(bledy == ''){
    return true;
    } else {
        alert(bledy);
        return false;
    }

}