function zad()
{
    // zmienna przechowuj±ca komunikaty b³êdów
    var bledy = '';
    // przypisanie obiektu formularza do zmiennej
    var d = document.forms['zad'];
    // sprawdzanie zaznaczenia
    for (var i=0; i<d.elements['checkbox'].length; i++)
        if (d.elements['checkbox'][i].checked){
            // formularz jest wypelniony poprawnie
            return true;
        }
        else {
            bledy = 'Nie zaznaczy\u0142e¶ ¿adnego zadania\n';
        }

        alert(bledy);
        return false;
}