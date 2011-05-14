function sprawdz_formularz()
{
    // zmienna przechowuj±ca komunikaty b³êdów
    var bledy = '';
    // przypisanie obiektu formularza do zmiennej
    var f = document.forms['showzad'];
    // sprawdzenie grupy
    if (f.grupa.value == '')
    {
       bledy += 'Musisz wpisaæ numer grupy!\n';
    }
    // formularz jest wypelniony poprawnie
    if(bledy == ''){
    return true;
    } else {
        alert(bledy);
        return false;
    }

}