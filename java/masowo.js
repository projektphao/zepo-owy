function sprawdz_formularz()
{
    // zmienna przechowuj±ca komunikaty b³êdów
    var bledy = '';
    // przypisanie obiektu formularza do zmiennej
    var f = document.forms['masowo'];
    // sprawdzenie nazw
    if (f.nazwy.value == '')
    {
       bledy += 'Musisz wpisaæ nazwy!\n';
    }
    // sprawdzanie d³ugo¶ci has³a
    if (f.pass.value.length < 6)
    {
        bledy += 'Has³o musi mieæ wiêcej ni¿ 5 znaków\n';
    }
    // sprawdzenie has³a
    if (f.pass.value == '')
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