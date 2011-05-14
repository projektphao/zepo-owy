function dodaj()
{
    // zmienna przechowuj±ca komunikaty b³êdów
    var bledy = '';
    // przypisanie obiektu formularza do zmiennej
    var f = document.forms['addgrup'];
    // wzorzec do porownania czy numer jest liczba
    var ole = /[^0-9]{1,}/;
    // sprawdzenie numeru grupy
    if (f.numer.value == '')
    {
       bledy += 'Musisz wpisa\u0107 numer grupy!\n';
    }
    // numer nie moze byc zerem
    if (f.numer.value == 0)
    {
       bledy += 'Numer grupy musi by\u0107 rózny od zera!\n';
    }
    // porownanie numeru ze wzorcem
    if (ole.test(f.numer.value))
    {
       bledy += 'Tylko liczby!\n';
    }
    // formularz jest wypelniony poprawnie
    if(bledy == ''){
    return true;
    } else {
        alert(bledy);
        return false;
    }
}

function usun()
{
    // zmienna przechowuj±ca komunikaty b³êdów
    var bledy = '';
    // przypisanie obiektu formularza do zmiennej
    var d = document.forms['usun'];
    // sprawdzanie zaznaczenia
    for (var i=0; i<d.elements['checkbox[]'].length; i++)
        if (d.elements['checkbox[]'][i].checked){
            // formularz jest wypelniony poprawnie
            return true;
        }
        else {
            bledy = 'Nie zaznaczy\u0142e¶ ¿adnej grupy\n';
        }

        alert(bledy);
        return false;
}