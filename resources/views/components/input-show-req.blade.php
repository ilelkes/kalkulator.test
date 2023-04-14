@props(['erettsegiEredmenyek'])
@php
    $message = 'hiba, nem lehetséges a pontszámítás a kötelező érettségi tárgyak hiánya miatt';
    $kotelezo_targyak = ['magyar nyelv és irodalom', 'történelem', 'matematika'];
    $kotelezo_darab = 0;
@endphp

@foreach ($erettsegiEredmenyek as $index => $erettsegi)
    @foreach ($erettsegi as $elnevezes => $vizsgaltadat)
        @if ($elnevezes == 'nev' and in_array($vizsgaltadat, $kotelezo_targyak))
            @php
                $kotelezo_darab++;
            @endphp
        @endif
    @endforeach
@endforeach

@if ($kotelezo_darab < 3)
    <x-alert :message="$message" class="danger" />
@endif
