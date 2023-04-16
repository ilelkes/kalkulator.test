@props(['input'])
{{ session(['error' => false]) }}

<div class="col d-flex flex-column gap-2 data-item">
    <h4 class="fw-semibold mb-0">{{ $input['title'] }}</h4>

    @php
        $_SESSION = [];
        //A kapott php adatokkal, tömbökkel - A második $exampleData tömböt átneveztem $exampleData1-re, más módosítás nem történt
        require public_path('homework_input.php');
        
        $actArray = $input['title'];
    @endphp

    @if (isset($actArray))
        @if (session('error') === false)
            <x-input-show-min :erettsegiEredmenyek="$$actArray['erettsegi-eredmenyek']" />
        @endif
        @if (session('error') === false)
            <x-input-show-req :erettsegiEredmenyek="$$actArray['erettsegi-eredmenyek']" />
        @endif
        @if (session('error') === false)
            <x-input-show-types-req :valasztottSzak="$$actArray['valasztott-szak']" />
        @endif
        @if (session('error') === false)
            <x-input-show-is-types-req :erettsegiEredmenyek="$$actArray['erettsegi-eredmenyek']" />
        @endif
        @if (session('error') === false)
            <x-input-show-is-types-req-level :erettsegiEredmenyek="$$actArray['erettsegi-eredmenyek']" />
        @endif
        @if (session('error') === false)
            <x-input-show-is-types-req-optional :erettsegiEredmenyek="$$actArray['erettsegi-eredmenyek']" />
        @endif
        @if (session('error') === false)
            {{ 'Megállapított alappontszám: (' . $_SESSION['kotelezo_eredmeny'] . '+' . $_SESSION['kotelezoen_valaszthato_eredmeny'] . ')*2' }}
        @endif
    @endif

</div>
