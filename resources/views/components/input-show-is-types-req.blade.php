@props(['erettsegiEredmenyek'])
@php
    $message = 'hiba, nem teljesített kötelező tárgyat a szakhoz';
    
    $kotelezo_targy = '';
    $aktnev = '';
    $db_kotelezo = 0;
@endphp

@foreach ($erettsegiEredmenyek as $index => $erettsegi)
    @foreach ($erettsegi as $elnevezes => $vizsgaltadat)
        @php
            if ($elnevezes == 'nev') {
                $aktnev = $vizsgaltadat;
                if (in_array($vizsgaltadat, $_SESSION['kotelezo_szaktargyak'])) {
                    $kotelezo_targy = $vizsgaltadat;
                    $db_kotelezo++;
                }
            }
            if ($elnevezes == 'eredmeny') {
                if ($aktnev == $kotelezo_targy) {
                    $_SESSION['kotelezo_eredmeny'] = intval($vizsgaltadat);
                }
            }
            if ($elnevezes == 'tipus') {
                if ($aktnev == $kotelezo_targy) {
                    if ($vizsgaltadat == 'emelt') {
                        $_SESSION['emelt_szintu_erettsegi_pontszam'] += 50;
                    }
                }
            }
        @endphp
    @endforeach
@endforeach

@if ($db_kotelezo < 1)
    <x-alert :message="$message" class="danger" />
    {{ session(['error' => true]) }}
@endif
