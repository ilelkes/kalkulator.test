@props(['erettsegiEredmenyek'])
@php
    $message = 'hiba, nem teljesített kötelezően választható tárgyat a szakhoz';
    
    $kotelezoen_valaszthato_targy = 0;
    $aktnev = '';
    $db_kotelezoen_valaszthato = 0;
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
        @endphp
    @endforeach
@endforeach

@if ($db_kotelezoen_valaszthato < 1)
    <x-alert :message="$message" class="danger" />
    {{ session(['error' => true]) }}
@endif
