@props(['erettsegiEredmenyek'])
@php
    $message_kotelezo_hiany = 'hiba, nem teljesített kötelező tárgyat a szakhoz';
    $message_kotelezo_szint_hiany = 'hiba, nem teljesített megfelelő érettségi szintet a szakhoz';
    $message_kotelezoen_valaszthato_hiany = 'hiba, nem teljesített kötelezően választható tárgyat a szakhoz';
    
    $kotelezo_targy = '';
    $kotelezoen_valaszthato_targy = 0;
    $aktnev = '';
    $db_kotelezo = 0;
    $db_kotelezo_szint = 0;
    $db_kotelezoen_valaszthato = 0;
@endphp

@foreach ($erettsegiEredmenyek as $index => $erettsegi)
    @foreach ($erettsegi as $elnevezes => $vizsgaltadat)
        @php
            if ($elnevezes == 'nev') {
                $aktnev = $vizsgaltadat;
            }
        @endphp
        @if ($elnevezes == 'nev' and in_array($vizsgaltadat, $_SESSION['kotelezo_szaktargyak']))
            @php
                $kotelezo_targy = $vizsgaltadat;
                $db_kotelezo++;
            @endphp
        @endif
        @if ($elnevezes == 'tipus' and $kotelezo_targy == $aktnev)
            @php
                if (in_array($vizsgaltadat, $_SESSION['kotelezo_szaktargyak_szint'])) {
                    $db_kotelezo_szint++;
                }
            @endphp
        @endif
        @if ($elnevezes == 'nev' and in_array($vizsgaltadat, $_SESSION['kotelezoen_valaszthato_szaktargyak']))
            @php
                $kotelezoen_valaszthato_targy = $vizsgaltadat;
                $db_kotelezoen_valaszthato++;
            @endphp
        @endif
    @endforeach
@endforeach

@if ($db_kotelezo < 1)
    <x-alert :message="$message_kotelezo_hiany" class="danger" />
    {{ session(['error' => true]) }}
@endif

@if ($db_kotelezo_szint < 1)
    <x-alert :message="$message_kotelezo_szint_hiany" class="danger" />
    {{ session(['error' => true]) }}
@endif

@if ($db_kotelezoen_valaszthato < 1)
    <x-alert :message="$message_kotelezoen_valaszthato_hiany" class="danger" />
    {{ session(['error' => true]) }}
@endif
