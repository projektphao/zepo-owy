function sprawdz_formularz()
{
    // zmienna przechowuj�ca komunikaty b��d�w
    var bledy = '';
    var ole = /\d\d\d\d-\d\d-\d\d \d\d:\d\d/;
    // przypisanie obiektu formularza do zmiennej
    var f = document.forms['addzad'];
    // sprawdzenie tytu�
    if (f.tytul.value == '')
    {
       bledy += 'Musisz wpisa\u0107 tytu�!\n';
    }
    // sprawdzenie tre��
    if (f.tresc.value == '')
    {
        bledy += 'Musisz wpisa\u0107 tre��!\n';
    }
    // sprawdzenie daty otwarcia
    if (f.otwarcie.value == '' || f.otwarcie.value == 'RRRR-MM-DD GG:MM')
    {
        bledy += 'Musisz wpisa\u0107 poprawnie dat� otwarcia!\n';
    }
    // sprawdzenie daty zamkni�cia
    if (f.zamkniecie.value == '' || f.zamkniecie.value == 'RRRR-MM-DD GG:MM')
    {
        bledy += 'Musisz wpisa\u0107 poprawnie dat� zamkni�cia!\n';
    }
    // sprawdzenie wej�cia
    if (f.wejscia.value == '')
    {
        bledy += 'Musisz wpisa\u0107 wej�cia!\n';
    }
    // sprawdzenie wyj�cia
    if (f.wyjscia.value == '')
    {
        bledy += 'Musisz wpisa\u0107 wyj�cia!\n';
    }
    if (ole.test(f.otwarcie.value))
    {
        bledy += 'Musisz wpisa\u0107 poprawnie dat� otwarcia!\n';
    }
    if (ole.test(f.zamkniecie.value))
    {
        bledy += 'Musisz wpisa\u0107 poprawnie dat� zamkni�cia!\n';
    }
    // formularz jest wypelniony poprawnie
    if(bledy == ''){
    return true;
    alert('wszystko ok');
    } else {
        alert(bledy);
        return false;
    }

}