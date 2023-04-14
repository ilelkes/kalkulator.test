@props(['inputArray'])
@php
    $message = 'hiba, nem lehetséges a pontszámítás a kötelező érettségi tárgyak hiánya miatt';
    $kotelezo_darab = 0;
@endphp

@foreach ($inputArray as $index => $erettsegi)
    @foreach ($erettsegi as $elnevezes => $vizsgaltadat)
        @if (
            $elnevezes == 'nev' and
                ($vizsgaltadat == 'magyar nyelv és irodalom' or $vizsgaltadat == 'történelem' or $vizsgaltadat == 'matematika'))
            @php
                $kotelezo_darab++;
            @endphp
        @endif
    @endforeach
@endforeach

@if ($kotelezo_darab < 3)
    <x-alert :message="$message" class="danger" />
@endif
