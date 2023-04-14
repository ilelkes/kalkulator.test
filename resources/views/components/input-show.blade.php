@props(['input'])
{{ session(['error' => false]) }}

<div class="col d-flex flex-column gap-2 data-item">
    <h4 class="fw-semibold mb-0">{{ $input['title'] }}</h4>
    <p class="text-body-secondary">{{-- $input['description'] --}}</p>

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
            <x-input-show-typesreq :valasztottSzak="$$actArray['valasztott-szak']" />
        @endif
        @if (session('error') === false)
            <x-input-show-istypesreq :erettsegiEredmenyek="$$actArray['erettsegi-eredmenyek']" />
        @endif
        @php
            if (isset($_SESSION) and count($_SESSION) > 0) {
                print '<strong>Segédadatok</strong>';
                print '<hr>';
                print_r($_SESSION['kotelezo_szaktargyak']);
                print '<hr>';
                print_r($_SESSION['kotelezo_szaktargyak_szint']);
                print '<hr>';
                print_r($_SESSION['kotelezoen_valaszthato_szaktargyak']);
            }
        @endphp
    @endif

</div>
