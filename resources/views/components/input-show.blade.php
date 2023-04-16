@props(['input'])
{{ session(['error' => false]) }}

<div class="col d-flex flex-column gap-2 data-item">
    <h4 class="fw-semibold mb-0">{{ $input['title'] }}</h4>

    @php
        $_SESSION = [];
        $_SESSION['emelt_szintu_erettsegi_pontszam'] = 0;
        $_SESSION['nyelvtudas_pontszam'] = 0;
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
            <x-input-show-is-language-points :tobbletpontok="$$actArray['tobbletpontok']" />
        @endif
        @if (session('error') === false)
            <x-input-show-basic-score />
        @endif
        @if (session('error') === false)
            <x-input-show-extra-points />
        @endif
        @if (session('error') === false)
            <x-input-show-total-score />
        @endif
    @endif

</div>
