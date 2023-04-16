@props(['erettsegiEredmenyek'])
@php
    $message = 'hiba, nem teljesített megfelelő érettségi szintet a szakhoz';

    $kotelezo_targy = '';
    $aktnev = '';
    $db_kotelezo = 0;
    $db_kotelezo_szint = 0;
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
            if ($elnevezes == 'tipus' and $kotelezo_targy == $aktnev) {
                if (in_array($vizsgaltadat, $_SESSION['kotelezo_szaktargyak_szint'])) {
                    $db_kotelezo_szint++;
                }
            }
        @endphp
    @endforeach
@endforeach

@if ($db_kotelezo_szint < 1)
    <x-alert :message="$message" class="danger" />
    {{ session(['error' => true]) }}
@endif
