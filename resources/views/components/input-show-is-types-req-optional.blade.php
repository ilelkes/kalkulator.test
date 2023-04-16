@props(['erettsegiEredmenyek'])
@php
    $message = 'hiba, nem teljesített kötelezően választható tárgyat a szakhoz';
    
    $kotelezoen_valaszthato_targy = 0;
    $aktnev = '';
    $db_kotelezoen_valaszthato = 0;
    $index_kotelezoen_valaszthato = 0;
@endphp

@foreach ($erettsegiEredmenyek as $index => $erettsegi)
    @foreach ($erettsegi as $elnevezes => $vizsgaltadat)
        @php
            if ($elnevezes == 'nev') {
                $aktnev = $vizsgaltadat;
                if (in_array($vizsgaltadat, $_SESSION['kotelezoen_valaszthato_szaktargyak'])) {
                    $kotelezoen_valaszthato_targy = $vizsgaltadat;
                    $db_kotelezoen_valaszthato++;
                }
            }
            if ($elnevezes == 'eredmeny') {
                if ($aktnev == $kotelezoen_valaszthato_targy) {
                    $_SESSION['kotelezoen_valaszthato_eredmenyek'][$index_kotelezoen_valaszthato++] = intval($vizsgaltadat);
                }
            }
        @endphp
    @endforeach
@endforeach

@php
    if (isset($_SESSION['kotelezoen_valaszthato_eredmenyek'])) {
        $_SESSION['kotelezoen_valaszthato_eredmeny'] = max($_SESSION['kotelezoen_valaszthato_eredmenyek']);
    
        if ($_SESSION['kotelezoen_valaszthato_eredmeny'] < 0) {
            $_SESSION['kotelezoen_valaszthato_eredmeny'] = 0;
        }
        if ($_SESSION['kotelezoen_valaszthato_eredmeny'] > 100) {
            $_SESSION['kotelezoen_valaszthato_eredmeny'] = 100;
        }
    }
@endphp

@if ($db_kotelezoen_valaszthato < 1)
    <x-alert :message="$message" class="danger" />
    {{ session(['error' => true]) }}
@endif
