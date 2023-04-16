@props(['input'])
{{ session(['error' => false]) }}

<div class="col d-flex flex-column gap-2 data-item">
    <h4 class="fw-semibold mb-0">{{ $input['title'] }}</h4>

    @php
        $_SESSION = [];
        $_SESSION['emelt_szintu_erettsegi_pontszam'] = 0;
        $_SESSION['nyelvtudas_pontszam'] = 0;
        
        //A fix esetek mellett módosítható teszt adatok
        require public_path('homework_input_datas.php');
    @endphp

    @if (isset($input))
        @if (session('error') === false)
            <x-input-show-min :erettsegiEredmenyek="$input['erettsegi-eredmenyek']" />
        @endif
        @if (session('error') === false)
            <x-input-show-req :erettsegiEredmenyek="$input['erettsegi-eredmenyek']" />
        @endif
        @if (session('error') === false)
            <x-input-show-types-req :valasztottSzak="$input['valasztott-szak']" />
        @endif
        @if (session('error') === false)
            <x-input-show-is-types-req :erettsegiEredmenyek="$input['erettsegi-eredmenyek']" />
        @endif
        @if (session('error') === false)
            <x-input-show-is-types-req-level :erettsegiEredmenyek="$input['erettsegi-eredmenyek']" />
        @endif
        @if (session('error') === false)
            <x-input-show-is-types-req-optional :erettsegiEredmenyek="$input['erettsegi-eredmenyek']" />
        @endif
        @if (session('error') === false)
            <x-input-show-is-language-points :tobbletpontok="$input['tobbletpontok']" />
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
