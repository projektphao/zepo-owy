function sprawdz_formularz()
{
    // zmienna przechowuj�ca komunikaty b��d�w
    var bledy = '';
    // przypisanie obiektu formularza do zmiennej
    var f = document.forms['rejestracja'];
    // sprawdzenie nazwy
    if (f.konto.value == '')
    {
       bledy += 'Musisz wpisa� nazw�!\n';
    }
    // sprawdzanie d�ugo�ci has�a
    if (f.password.value.length < 6)
    {
        bledy += 'Has�o musi mie� wi�cej ni� 5 znak�w\n';
    }
    // sprawdzenie has�a
    if (f.password.value == '')
    {
        bledy += 'Musisz wpisa� has�o!\n';
    }
    // haslo no 2
    if (f.password2.value == '')
    {
        bledy += 'Musisz wpisa� has�o 2 raz!\n';
    }
    // czy has�a s� identyczne
    if (f.password.value != f.password2.value)
    {
        bledy += 'Has�a nie s� identyczne!\n';
    }
    // formularz jest wypelniony poprawnie
    if(bledy == ''){
    return true;
    } else {
        alert(bledy);
        return false;
    }

}