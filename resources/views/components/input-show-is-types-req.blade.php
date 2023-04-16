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
        @endphp
    @endforeach
@endforeach

@if ($db_kotelezo < 1)
    <x-alert :message="$message" class="danger" />
    {{ session(['error' => true]) }}
@endif
