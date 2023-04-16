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
            if ($elnevezes == 'tipus') {
                if ($aktnev == $kotelezoen_valaszthato_targy) {
                    if ($vizsgaltadat == 'emelt') {
                        $_SESSION['emelt_szintu_erettsegi_pontszam'] += 50;
                    }
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
    }
@endphp

@if ($db_kotelezoen_valaszthato < 1)
    <x-alert :message="$message" class="danger" />
    {{ session(['error' => true]) }}
@endif
