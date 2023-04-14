@props(['erettsegiEredmenyek'])
@php
    $message_start = 'hiba, nem lehetséges a pontszámítás a(z)';
    $message_end = 'tárgyból elért 20% alatti eredmény miatt';
@endphp

@foreach ($erettsegiEredmenyek as $index => $erettsegi)
    @php
        $message = '';
    @endphp
    @foreach ($erettsegi as $elnevezes => $vizsgaltadat)
        @if ($elnevezes == 'nev')
            @php
                $message = $message_start . ' ' . $vizsgaltadat . ' ' . $message_end;
            @endphp
        @endif
        @if ($elnevezes == 'eredmeny' and intval($vizsgaltadat) < 20)
            <x-alert :message="$message" class="danger" />
            {{ session(['error' => true]) }}
        @endif
    @endforeach
@endforeach
