function sprawdz_formularz()
{
    // zmienna przechowuj�ca komunikaty b��d�w
    var bledy = '';
    // przypisanie obiektu formularza do zmiennej
    var f = document.forms['masowo'];
    // sprawdzenie nazw
    if (f.nazwy.value == '')
    {
       bledy += 'Musisz wpisa� nazwy!\n';
    }
    // sprawdzanie d�ugo�ci has�a
    if (f.pass.value.length < 6)
    {
        bledy += 'Has�o musi mie� wi�cej ni� 5 znak�w\n';
    }
    // sprawdzenie has�a
    if (f.pass.value == '')
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